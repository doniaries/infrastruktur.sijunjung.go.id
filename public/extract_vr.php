<?php

/**
 * Ultra ZIP Extractor (Tours & VR)
 * Use this script to extract ZIP files on your server.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Check if ZipArchive is available
if (!class_exists('ZipArchive')) {
    die("<html><body style='font-family:sans-serif; padding:40px; background:#fff5f5;'>
            <div style='max-width:600px; margin:auto; padding:20px; border:1px solid #feb2b2; background:#fff; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.05);'>
                <h2 style='color:#c53030; margin-top:0;'>❌ Error: ZipArchive Not Found</h2>
                <p>Ekstensi <code>ZipArchive</code> tidak aktif di server PHP Anda.</p>
                <p><b>Solusi:</b> Aktifkan melalui cPanel (PHP Selector > Extensions) atau hubungi dukungan hosting Anda.</p>
            </div>
         </body></html>");
}

// Configuration
$targetDir = 'tours';

// Scanner: Find all ZIP files in root and target dir
$allZips = [];
$dirsToScan = ['.', $targetDir];

foreach ($dirsToScan as $dir) {
    if (is_dir($dir)) {
        $files = glob("$dir/*.{zip,ZIP}", GLOB_BRACE);
        if ($files) {
            foreach ($files as $file) {
                // Remove redundant ./ prefix for cleaner display
                $cleanPath = ltrim($file, './');
                $allZips[] = $cleanPath;
            }
        }
    }
}

// Auto-detect VR.zip (case insensitive)
$zipFile = null;
if (isset($_GET['file'])) {
    $requestedFile = $_GET['file'];
    if (file_exists($requestedFile)) {
        $zipFile = $requestedFile;
    }
}

if (!$zipFile) {
    foreach ($allZips as $z) {
        $filename = strtolower(basename($z));
        if ($filename === 'vr.zip') {
            $zipFile = $z;
            break;
        }
    }
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>Ultra ZIP Extractor</title>
<style>
    body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f0f2f5; padding:40px; color:#1c1e21;}
    .container{max-width:750px; margin:0 auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);}
    h1{color:#1877f2; margin-top:0; display:flex; align-items:center; gap:12px;}
    .card{border:1px solid #dddfe2; border-radius:8px; padding:20px; margin-bottom:20px; background:#f9fafb;}
    .btn{display:inline-block; background:#1877f2; color:#fff; padding:12px 24px; text-decoration:none; border-radius:6px; font-weight:bold; border:none; cursor:pointer;}
    .btn-secondary{background:#e4e6eb; color:#050505; text-decoration:none; padding:8px 16px; border-radius:6px; font-size:14px;}
    .status{padding:15px; background:#f0f2f5; border-left:4px solid #1877f2; border-radius:4px; margin-top:20px; font-family:monospace; white-space:pre-wrap;}
    .file-list{margin:10px 0; padding:0; list-style:none;}
    .file-item{padding:12px; border-bottom:1px solid #eee; display:flex; justify-content:space-between; align-items:center;}
    .badge{background:#1877f2; color:#fff; padding:4px 10px; border-radius:20px; font-size:13px; font-weight:bold;}
    code{background:#e4e6eb; padding:2px 6px; border-radius:4px; font-family:monospace;}
</style></head><body>";

echo "<div class='container'>
    <h1>📦 Ultra ZIP Extractor</h1>
    <p>Gunakan alat ini untuk mengekstrak file ZIP besar di hosting Anda.</p>";

if (!$zipFile) {
    echo "<div class='card'>
        <h3 style='color:#dc3545;'>🔍 Mencari File ZIP...</h3>";

    if (empty($allZips)) {
        echo "<p>Tidak ada file <code>.zip</code> atau <code>.ZIP</code> ditemukan di <code>public/</code> atau <code>public/$targetDir/</code>.</p>
              <p><b>Solusi:</b> Pastikan file Anda benar-benar sudah ada di salah satu folder tersebut melalui File Manager hosting.</p>";
    } else {
        echo "<p>Beberapa file ditemukan. Pilih yang ingin Anda ekstrak:</p>
              <ul class='file-list'>";
        foreach ($allZips as $z) {
            echo "<li class='file-item'>
                    <div><code>$z</code></div>
                    <a href='?file=" . urlencode($z) . "' class='btn-secondary'>Pilih File Ini</a>
                  </li>";
        }
        echo "</ul>";
    }
    echo "</div>";
} else {
    echo "<div class='card'>
        <h3>📄 File Terpilih Siap Ekstrak</h3>
        <p>File: <span class='badge'>$zipFile</span></p>
        <p>Tujuan Ekstraksi: <code>public/$targetDir/</code></p>
        
        <form method='GET'>
            <input type='hidden' name='run' value='1'>
            <input type='hidden' name='file' value='$zipFile'>
            <button type='submit' class='btn'>🚀 Mulai Ekstrak Sekarang</button>
            <a href='extract_vr.php' class='btn-secondary' style='margin-left:10px;'>Batal / Cari Lagi</a>
        </form>
    </div>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Sedang mengekstrak $zipFile...<br>";

        $zip = new ZipArchive;
        $res = $zip->open($zipFile);
        if ($res === TRUE) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if ($zip->extractTo($targetDir)) {
                $zip->close();
                echo "<br><b style='color:#28a745;'>✅ BERHASIL!</b> File telah diekstrak ke folder <code>$targetDir/</code>.";
                echo "<p>Isi file VR Anda sekarang sudah bisa diakses di folder tersebut.</p>";
            } else {
                echo "<br><b style='color:#dc3545;'>❌ GAGAL:</b> Server tidak dapat menulis ke folder tujuan. Periksa izin folder (CHMOD).</p>";
            }
        } else {
            echo "<br><b style='color:#dc3545;'>❌ GAGAL:</b> File ZIP tidak bisa dibuka. Error code: $res";
        }
        echo "</div>";
    }
}

echo "<p style='font-size:12px; color:#999; margin-top:40px; border-top:1px solid #eee; pt:10px;'>Lokasi skrip ini: <code>" . __FILE__ . "</code></p>";
echo "<p style='color:#dc3545; font-size:13px; font-weight:bold;'>⚠️ Jangan lupa hapus file ini setelah selesai!</p>";
echo "</div></body></html>";

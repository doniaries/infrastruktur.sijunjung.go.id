<?php

/**
 * Advanced ZIP Extractor (Tours & VR)
 * Use this script to extract large ZIP files onto the server.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Configuration
$defaultDir = 'tours';

// Determine which directory to look into
$targetDir = isset($_GET['dir']) ? $_GET['dir'] : $defaultDir;

// Ensure target directory exists if we are going to look into it
if (!is_dir($targetDir) && $targetDir !== '.') {
    // We don't create it here yet, just note it
}

// Try to find ZIP files
$zips = glob("$targetDir/*.zip");
$rootZips = glob("*.zip");

$zipFile = null;
if (isset($_GET['file'])) {
    $zipFile = $targetDir . '/' . basename($_GET['file']);
} elseif (count($zips) > 0) {
    $zipFile = $zips[0];
} elseif (count($rootZips) > 0) {
    $zipFile = $rootZips[0];
    $targetDir = '.'; // Switch to root if zip found there
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>ZIP Extractor Utility</title>
<style>
    body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f0f2f5; padding:40px; color:#1c1e21;}
    .container{max-width:700px; margin:0 auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);}
    h1{color:#1877f2; margin-top:0; display:flex; align-items:center; gap:10px;}
    .card{border:1px solid #dddfe2; border-radius:8px; padding:20px; margin-bottom:20px; background:#f9fafb;}
    .btn{display:inline-block; background:#1877f2; color:#fff; padding:12px 24px; text-decoration:none; border-radius:6px; font-weight:bold; transition:background 0.2s;}
    .btn:hover{background:#166fe5;}
    .status{padding:15px; background:#f0f2f5; border-left:4px solid #1877f2; border-radius:4px; margin-top:20px; font-family:monospace; white-space:pre-wrap; word-break:break-all;}
    code{background:#e4e6eb; padding:2px 6px; border-radius:4px; font-family:monospace;}
    .success{color:#28a745; font-weight:bold;}
    .error{color:#dc3545; font-weight:bold;}
</style></head><body>";

echo "<div class='container'>
    <h1>📦 ZIP Extractor Utility</h1>
    <p>Gunakan alat ini untuk mengekstrak file ZIP besar di hosting Anda.</p>";

if (!$zipFile || !file_exists($zipFile)) {
    echo "<div class='card'>
        <h3>❌ File ZIP Tidak Ditemukan</h3>
        <p>Tidak ada file ZIP di folder <code>public/$targetDir/</code>.</p>
        <p>Pastikan file ZIP Anda sudah diupload ke folder tersebut.</p>";

    if (count($rootZips) > 0) {
        echo "<p>File ZIP ditemukan di <code>public/</code> root: </p><ul>";
        foreach ($rootZips as $z) echo "<li><a href='?file=$z&dir=.'>$z</a></li>";
        echo "</ul>";
    }
    echo "</div>";
} else {
    echo "<div class='card'>
        <h3>📄 File Terdeteksi</h3>
        <p>File: <strong>$zipFile</strong></p>
        <p>Tujuan Ekstraksi: <code>public/$targetDir/</code></p>
        
        <form method='GET'>
            <input type='hidden' name='run' value='1'>
            <input type='hidden' name='file' value='" . basename($zipFile) . "'>
            <input type='hidden' name='dir' value='$targetDir'>
            <button type='submit' class='btn'>Ekstrak Sekarang</button>
        </form>
    </div>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Memulai proses ekstraksi...<br>";

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if ($zip->extractTo($targetDir)) {
                $zip->close();
                echo "<span class='success'>✅ Selesai! Ekstraksi berhasil.</span><br>";
                echo "Data sekarang tersedia di folder <code>$targetDir/</code>.</div>";
                echo "<p style='color:#f02849;'><strong>⚠️ PERINGATAN KEAMANAN:</strong> Hapus file <code>extract_vr.php</code> ini setelah selesai digunakan!</p>";
            } else {
                echo "<span class='error'>❌ Gagal mengekstrak file. Pastikan izin folder (permissions) benar.</span></div>";
            }
        } else {
            echo "<span class='error'>❌ Gagal membuka file ZIP. File mungkin rusak atau tidak valid.</span></div>";
        }
    }
}

echo "</div></body></html>";

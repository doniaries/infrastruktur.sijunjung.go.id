<?php

/**
 * Advanced ZIP Extractor (VR Version)
 * Use this script to extract large ZIP files onto the server.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Configuration
$targetDir = 'tours';

// Try to find ZIP files in the target directory
$zips = glob("$targetDir/*.zip");
$rootZips = glob("*.zip");

$zipFile = null;
if (isset($_GET['file'])) {
    $zipFile = $targetDir . '/' . basename($_GET['file']);
} elseif (count($zips) > 0) {
    // Priority for VR.zip
    foreach ($zips as $z) {
        if (basename($z) === 'VR.zip') {
            $zipFile = $z;
            break;
        }
    }
    if (!$zipFile) $zipFile = $zips[0];
} elseif (count($rootZips) > 0) {
    // Priority for VR.zip in root
    foreach ($rootZips as $z) {
        if (basename($z) === 'VR.zip') {
            $zipFile = $z;
            $targetDir = '.';
            break;
        }
    }
    if (!$zipFile) {
        $zipFile = $rootZips[0];
        $targetDir = '.';
    }
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>VR Extractor Utility</title>
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
    <h1>📦 VR Extractor Utility</h1>
    <p>Alat ini siap mengekstrak data VR Anda ke folder tujuan.</p>";

if (!$zipFile || !file_exists($zipFile)) {
    echo "<div class='card'>
        <h3>❌ File Tidak Ditemukan</h3>
        <p>File <code>VR.zip</code> tidak terdeteksi di <code>public/tours/</code> atau <code>public/</code>.</p>
        <p>Silakan upload file Anda dan refresh halaman ini.</p>
    </div>";
} else {
    echo "<div class='card'>
        <h3>📄 File Siap Ekstrak</h3>
        <p>File Ditemukan: <strong>$zipFile</strong></p>
        <p>Lokasi Ekstraksi: <code>public/$targetDir/</code></p>
        
        <form method='GET'>
            <input type='hidden' name='run' value='1'>
            <input type='hidden' name='file' value='" . basename($zipFile) . "'>
            <input type='hidden' name='dir' value='$targetDir'>
            <button type='submit' class='btn'>Ekstrak VR Sekarang</button>
        </form>
    </div>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Sedang mengekstrak $zipFile...<br>";

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if ($zip->extractTo($targetDir)) {
                $zip->close();
                echo "<span class='success'>✅ BERHASIL! File VR telah diekstrak.</span><br>";
                echo "Data sekarang tersedia di folder <code>$targetDir/</code>.</div>";
                echo "<p style='color:#dc3545; font-weight:bold;'>⚠️ PENTING: Segera hapus file <code>extract_vr.php</code> ini dari server Anda demi keamanan.</p>";
            } else {
                echo "<span class='error'>❌ GAGAL: Tidak dapat menulis ke folder tujuan. Periksa izin folder (CHMOD).</span></div>";
            }
        } else {
            echo "<span class='error'>❌ GAGAL: File ZIP tidak dapat dibuka. Mungkin file rusak saat upload.</span></div>";
        }
    }
}

echo "</div></body></html>";

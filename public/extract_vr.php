<?php

/**
 * VR.zip Extractor (Strict to Tours Folder)
 * Use this script to extract VR.zip file inside 'tours' directory.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Configuration
$targetDir = 'tours';

// Look for VR.zip specifically in 'tours' or root
$zipFile = null;
if (file_exists("$targetDir/VR.zip")) {
    $zipFile = "$targetDir/VR.zip";
} elseif (file_exists("VR.zip")) {
    $zipFile = "VR.zip";
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>VR.zip Extractor</title>
<style>
    body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f0f2f5; padding:40px; color:#1c1e21;}
    .container{max-width:700px; margin:0 auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);}
    h1{color:#1877f2; margin-top:0;}
    .card{border:1px solid #dddfe2; border-radius:8px; padding:20px; margin-bottom:20px; background:#f9fafb;}
    .btn{display:inline-block; background:#1877f2; color:#fff; padding:12px 24px; text-decoration:none; border-radius:6px; font-weight:bold;}
    .status{padding:15px; background:#f0f2f5; border-left:4px solid #1877f2; border-radius:4px; margin-top:20px; font-family:monospace;}
</style></head><body>";

echo "<div class='container'>
    <h1>📦 VR.zip Extractor</h1>";

if (!$zipFile) {
    echo "<div class='card'>
        <h3 style='color:#dc3545;'>❌ File VR.zip Tidak Ditemukan</h3>
        <p>Pastikan file <code>VR.zip</code> sudah diupload ke folder <code>public/tours/</code> atau <code>public/</code>.</p>
    </div>";
} else {
    echo "<div class='card'>
        <h3>📄 File Terdeteksi</h3>
        <p>File: <strong>$zipFile</strong></p>
        <p>Tujuan Ekstraksi: <strong>public/$targetDir/</strong></p>
        
        <form method='GET'>
            <input type='hidden' name='run' value='1'>
            <button type='submit' class='btn'>Ekstrak Sekarang</button>
        </form>
    </div>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Mengekstrak $zipFile ke $targetDir...<br>";

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if ($zip->extractTo($targetDir)) {
                $zip->close();
                echo "<br><b style='color:#28a745;'>✅ BERHASIL!</b> Data telah diekstrak ke folder <code>tours/</code>.</div>";
                echo "<p style='color:#dc3545;'><strong>PENTING:</strong> Segera hapus file <code>extract_vr.php</code> ini!</p>";
            } else {
                echo "<br><b style='color:#dc3545;'>❌ GAGAL:</b> Cek izin folder <code>tours/</code>.</div>";
            }
        } else {
            echo "<br><b style='color:#dc3545;'>❌ GAGAL:</b> ZIP tidak dapat dibuka.</div>";
        }
    }
}

echo "</div></body></html>";

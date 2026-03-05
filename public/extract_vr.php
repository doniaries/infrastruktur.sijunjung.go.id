<?php

/**
 * VR Extraction Tool
 * Use this script to extract large ZIP files onto the server.
 * Place this file in the 'public' directory along with your ZIP file.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Configuration
$extractTo = 'vr-content'; // Destination folder

// Try to find the ZIP file automatically
$zipFile = null;
$zips = glob("*.zip");

if (isset($_GET['file'])) {
    $zipFile = $_GET['file'];
} elseif (count($zips) > 0) {
    // Exclude build zips if possible, or just pick the first one
    foreach ($zips as $z) {
        if (strpos(strtolower($z), 'vr') !== false) {
            $zipFile = $z;
            break;
        }
    }
    if (!$zipFile) $zipFile = $zips[0];
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>VR Extractor</title><style>body{font-family:sans-serif;background:#f4f4f9;padding:40px;line-height:1.6} .container{max-width:600px;background:#fff;padding:20px;border-radius:10px;shadow:0 2px 10px rgba(0,0,0,0.1)} h1{color:#2563eb} .btn{display:inline-block;background:#2563eb;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;margin-top:20px} .status{padding:15px;background:#e2e8f0;border-radius:5px;margin-top:20px;font-family:monospace}</style></head><body>";
echo "<div class='container'><h1>📦 VR Extractor</h1>";

if (!$zipFile || !file_exists($zipFile)) {
    echo "<p>No ZIP file found. Please upload your VR zip file to the <code>public/</code> folder.</p>";
    echo "<p>Currently available ZIPs: </p><ul>";
    foreach ($zips as $z) echo "<li>$z</li>";
    echo "</ul>";
} else {
    echo "<p>Ready to extract: <strong>$zipFile</strong></p>";
    echo "<p>Target directory: <code>public/$extractTo/</code></p>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Starting extraction...<br>";

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            if (!is_dir($extractTo)) {
                mkdir($extractTo, 0755, true);
            }

            $zip->extractTo($extractTo);
            $zip->close();
            echo "✅ Done! Extraction complete.<br>";
            echo "You can now access your VR content in the <code>$extractTo</code> folder.</div>";
            echo "<p><strong>Security Hint:</strong> Please DELETE this <code>extract_vr.php</code> file after you are done!</p>";
        } else {
            echo "❌ Error: Failed to open ZIP file.</div>";
        }
    } else {
        echo "<a href='?run=1' class='btn'>Extract Now</a>";
    }
}

echo "</div></body></html>";

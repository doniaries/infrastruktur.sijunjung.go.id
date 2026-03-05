<?php

/**
 * VR Extraction Tool (Tours)
 * Use this script to extract large ZIP files onto the server.
 * This version is configured to extract ZIP files inside the 'tours' folder.
 */

set_time_limit(0);
ini_set('memory_limit', '1024M');

// Configuration
$targetDir = 'tours'; // The directory where ZIP is located and where it will be extracted

// Try to find the ZIP file inside 'tours' automatically
$zipFile = null;
$zips = glob("$targetDir/*.zip");

if (isset($_GET['file'])) {
    $zipFile = "$targetDir/" . basename($_GET['file']);
} elseif (count($zips) > 0) {
    $zipFile = $zips[0]; // Take the first zip found in tours/
}

header('Content-Type: text/html; charset=utf-8');
echo "<html><head><title>VR Extractor (Tours)</title><style>body{font-family:sans-serif;background:#f4f4f9;padding:40px;line-height:1.6} .container{max-width:600px;background:#fff;padding:20px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,0.1)} h1{color:#2563eb} .btn{display:inline-block;background:#2563eb;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;margin-top:20px} .status{padding:15px;background:#e2e8f0;border-radius:5px;margin-top:20px;font-family:monospace}</style></head><body>";
echo "<div class='container'><h1>📦 VR Extractor (Tours)</h1>";

if (!$zipFile || !file_exists($zipFile)) {
    echo "<p>No ZIP file found inside the <code>public/$targetDir/</code> folder. Please ensure your ZIP file is uploaded there.</p>";
    if (count($zips) == 0) {
        // Search in public root as fallback
        $rootZips = glob("*.zip");
        if (count($rootZips) > 0) {
            echo "<p>ZIPs found in <code>public/</code> root instead: </p><ul>";
            foreach ($rootZips as $z) echo "<li>$z</li>";
            echo "</ul>";
        }
    }
} else {
    echo "<p>Ready to extract: <strong>$zipFile</strong></p>";
    echo "<p>Target directory: <code>public/$targetDir/</code></p>";

    if (isset($_GET['run'])) {
        echo "<div class='status'>Starting extraction...<br>";

        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            // Check if directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            // Extract into the target folder
            $zip->extractTo($targetDir);
            $zip->close();
            echo "✅ Done! Extraction complete.<br>";
            echo "You can now access your VR content in the <code>$targetDir</code> folder.</div>";
            echo "<p><strong>Security Hint:</strong> Please DELETE this <code>extract_vr.php</code> file after you are done!</p>";
        } else {
            echo "❌ Error: Failed to open ZIP file. Check permissions or if the file is valid.</div>";
        }
    } else {
        echo "<a href='?run=1' class='btn'>Extract Now</a>";
    }
}

echo "</div></body></html>";

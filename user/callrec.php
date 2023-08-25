<?php
// Define the file path
$file_path = '/archive2/Queuemetrics/2023/08/10/1691653415.5934892.mp3';

// Check if the file exists
if (file_exists($file_path)) {
    // Set the appropriate headers for streaming the file
    header('Content-Type: audio/mpeg');
    header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
    header('Content-Length: ' . filesize($file_path));

    // Read and output the file
    readfile($file_path);
} else {
    // File not found, you can handle this case as needed
    header('HTTP/1.1 404 Not Found');
    echo 'File not found.';
}
?>

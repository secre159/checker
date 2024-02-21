<?php
// Get the alive UIDs from the POST request
$alive_uids = $_POST['alive_uids'];

// File path to store the alive UIDs
$file_path = 'alive_uids.txt';

// Check if the file exists, if not, create it
if (!file_exists($file_path)) {
    // Create the file with write permissions
    fopen($file_path, 'w');
}

// Append the alive UIDs to the text file
file_put_contents($file_path, $alive_uids, FILE_APPEND);

// Optionally, you can also send the alive UIDs to a certain recipient via email or any other method here

// Return a response to the JavaScript function
echo 'Alive UIDs have been stored successfully.';
?>

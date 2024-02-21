<?php
// Check if alive_uids data is sent via POST request
if(isset($_POST['alive_uids'])) {
    // Get the alive UIDs from the POST request
    $alive_uids = $_POST['alive_uids'];

    // File path to store the alive UIDs (in the same directory as the PHP file)
    $file_path = 'alive_uids.txt';

    // Append the alive UIDs to the text file
    $result = file_put_contents($file_path, $alive_uids . PHP_EOL, FILE_APPEND);

    // Check if writing to file was successful
    if($result !== false) {
        // Optionally, you can also send the alive UIDs to a certain recipient via email or any other method here

        // Return a success response to the JavaScript function
        echo 'Alive UIDs have been stored successfully.';
    } else {
        // Return an error response if writing to file failed
        echo 'Error: Unable to store alive UIDs.';
    }
} else {
    // Return an error response if alive_uids data is not received
    echo 'Error: No alive UIDs data received.';
}
?>

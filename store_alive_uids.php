<?php
// Check if alive_uids data is sent via POST request
if(isset($_POST['alive_uids'])) {
    // Get the alive UIDs from the POST request
    $alive_uids = $_POST['alive_uids'];

    // Optionally, you can process the alive UIDs data here

    // Example: Store the alive UIDs in a text file
    $file = 'alive_uids.txt';
    file_put_contents($file, $alive_uids);

    // Return a success response
    echo 'Alive UIDs stored successfully.';
} else {
    // Return an error response if alive_uids data is not received
    echo 'Error: No alive UIDs data received.';
}
?>

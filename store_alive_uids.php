<?php

// Function to store live UIDs in a JSON file
function storeAliveUIDs($aliveUIDs) {
    // Read the existing JSON file, if it exists
    $file = 'live_uids.json';
    $data = [];
    if (file_exists($file)) {
        $jsonData = file_get_contents($file);
        $data = json_decode($jsonData, true);
    }

    // Append the new live UIDs to the existing data
    $data['live_uids'][] = $aliveUIDs;

    // Convert the updated data to a JSON string
    $jsonString = json_encode($data);

    // Write the JSON string back to the file
    file_put_contents($file, $jsonString);
}

// Check if alive_uids data is sent via POST request
if(isset($_POST['alive_uids'])) {
    // Get the alive UIDs from the POST request
    $aliveUIDs = $_POST['alive_uids'];

    // Store the live UIDs in the JSON file
    storeAliveUIDs($aliveUIDs);

    // Return a success response
    echo 'Live UIDs stored successfully.';
} else {
    // Return an error response if alive_uids data is not received
    echo 'Error: No alive UIDs data received.';
}
?>

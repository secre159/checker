<?php
// Function to create a new paste on Pastebin
function createPasteOnPastebin($content, $api_key) {
    $api_dev_key = urlencode($api_key);
    $api_paste_code = urlencode($content);
    $api_paste_private = 0; // 0=public, 1=unlisted, 2=private
    $api_paste_name = 'Alive UIDs'; // Name of the paste
    $api_paste_format = 'text'; // Format of the paste (text, php, etc.)
    $api_paste_expire_date = 'N'; // Expiration date of the paste (N=never)
    $api_paste_code = urlencode($content);

    $url = 'https://pastebin.com/api/api_post.php';

    $post_fields = 'api_option=paste&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Check if alive_uids data is sent via POST request
if(isset($_POST['alive_uids'])) {
    // Get the alive UIDs from the POST request
    $alive_uids = $_POST['alive_uids'];

    // Paste content (alive UIDs)
    $paste_content = 'Alive UIDs:' . PHP_EOL . $alive_uids;

    // Your Pastebin API key
    $api_key = '2YNOMAehI4fvZTN5NOH3eonEo53bw2vL
';

    // Create a new paste on Pastebin
    $paste_url = createPasteOnPastebin($paste_content, $api_key);

    // Check if creating paste was successful
    if(!empty($paste_url)) {
        // Return the URL of the created paste to the JavaScript function
        echo 'Paste created successfully: ' . $paste_url;
    } else {
        // Return an error response if creating paste failed
        echo 'Error: Unable to create paste on Pastebin.';
    }
} else {
    // Return an error response if alive_uids data is not received
    echo 'Error: No alive UIDs data received.';
}
?>

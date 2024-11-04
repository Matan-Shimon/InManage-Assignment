<?php
    // URL of the image
    $imageUrl = 'https://cdn.vectorstock.com/i/1000v/23/81/default-avatar-profile-icon-vector-18942381.jpg';

    // Path where to save the image on the server
    $savePath = 'images/default-avatar.jpg';

    // Get the image content
    $imageContent = file_get_contents($imageUrl);

    // Check if the content was successfully retrieved
    if ($imageContent === false) {
        echo 'Failed to download content';
    } else {
        // Save the image to the specified path
        file_put_contents($savePath, $imageContent);
        echo 'Image downloaded and saved successfully!';
    }
?>
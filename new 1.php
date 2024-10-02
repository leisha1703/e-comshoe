<?php
// Check if a file was uploaded
if(isset($_FILES['image'])){
    $file = $_FILES['image'];

    // Generate a unique name for the image
    $uniqueName = uniqid('', true);
    $fileName = $uniqueName . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // Destination folder path
    $uploadDir = 'uploads/';

    // Create the "uploads" folder if it doesn't exist
    if(!is_dir($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    // Set full permissions (read, write, execute) for the "uploads" folder
    chmod($uploadDir, 0777);

    // Move the uploaded file to the destination folder with the unique name
    $uploadPath = $uploadDir . $fileName;
    move_uploaded_file($file['tmp_name'], $uploadPath);

    echo "Image uploaded successfully as: " . $fileName;
}
?>

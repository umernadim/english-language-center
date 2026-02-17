<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

// Check if form submitted
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $profession = mysqli_real_escape_string($connect, $_POST['profession']);
    $feedback = mysqli_real_escape_string($connect, $_POST['feedback']);
    
    
    $image_url = '';
    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

        $upload_dir = '../assets/images/feedback/';


        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($file_ext, $allowed)) {
            $new_filename = 'feedback_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
            $image_url = $upload_dir . $new_filename;
            
            // Upload file
            if (move_uploaded_file($file_tmp, $image_url)) {
                echo "Image uploaded successfully!<br>";
            } else {
                die("Image upload failed!");
            }
        } else {
            die("Only JPG, PNG, GIF allowed!");
        }
    }
    
    // **INSERT INTO DATABASE**
    $sql = "INSERT INTO feedback(name, profession, feedback, photo_url) 
            VALUES('{$name}', '{$profession}', '{$feedback}', '{$image_url}')";
    
    if (mysqli_query($connect, $sql)) {
        echo "feedback added successfully!";
        header("Location: feedback.php"); // Correct page name
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

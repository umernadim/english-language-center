<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: index.php');
    exit;
}

// Check if form submitted
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $designation = mysqli_real_escape_string($connect, $_POST['designation']);
    $bio = mysqli_real_escape_string($connect, $_POST['bio']);
    
    $image_url = '';
    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

        $upload_dir = 'assets/images/teachers/';


        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($file_ext, $allowed)) {
            $new_filename = 'teacher_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
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
    $sql = "INSERT INTO teachers(name, designation, bio, image_url) 
            VALUES('{$name}', '{$designation}', '{$bio}', '{$image_url}')";
    
    if (mysqli_query($connect, $sql)) {
        echo "Teacher added successfully!";
        header("Location: teachers.php"); 
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

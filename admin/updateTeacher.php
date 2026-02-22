<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

// Check if form submitted
if ($_POST) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $designation = mysqli_real_escape_string($connect, $_POST['designation']);
    $bio = mysqli_real_escape_string($connect, $_POST['bio']);

    $image_url = ''; // default empty

    // Check if new photo uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'assets/images/teachers/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_ext, $allowed)) {
            $new_filename = 'teacher_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
            $image_url = $upload_dir . $new_filename;

            if (!move_uploaded_file($file_tmp, $image_url)) {
                die("Image upload failed!");
            }
        } else {
            die("Only JPG, PNG, GIF allowed!");
        }
    }

    // Build SQL query
    if ($image_url != '') {
        // Update with new photo
        $sql = "UPDATE teachers 
                SET name='{$name}', designation='{$designation}', bio='{$bio}', image_url='{$image_url}' 
                WHERE id={$id}";
    } else {
        // Update without changing photo
        $sql = "UPDATE teachers 
                SET name='{$name}', designation='{$designation}', bio='{$bio}' 
                WHERE id={$id}";
    }

    if (mysqli_query($connect, $sql)) {
        echo "Teacher updated successfully!";
        header("Location: teachers.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher | Hope English Language Center</title>
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/updateForms.css" />
</head>

<body>
    <!-- UPDATE MODAL -->
    <div class="update-page">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="updateModalTitle">Update Teacher</h2>
            </div>

            <?php
            include '../config.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM teachers WHERE id = {$id}";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <form id="updateTeacherForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="teacher_id" id="teacherId" value="<?php echo $row['id'] ?>" />

                            <div class="form-group">
                                <label class="form-label">Teacher Photo</label>
                                <div class="file-input-container">
                                    <input type="file" id="updatePhoto" accept="image/*" class="form-control" name="photo" />
                                    <div class="file-input-label">
                                        <i class="ri-upload-cloud-line"></i>
                                        <span>Click to upload photo</span>
                                    </div>
                                </div>
                                <div class="file-preview" id="updatePhotoPreview">
                                    <?php if (!empty($row['image_url'])) { ?>
                                        <img src="<?php echo $row['image_url']; ?>" alt="Teacher Photo" />
                                    <?php } ?>
                                </div>
                                <div class="form-help">Recommended size: 300x300px, max 2MB</div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" id="updateTeacherName" class="form-control" name="name" required value="<?php echo $row['name'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Designation</label>
                                    <input type="text" id="updateTeacherDesignation" class="form-control" name="designation" required value="<?php echo $row['designation'] ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Bio/Description</label>
                                <textarea id="updateTeacherBio" class="form-control" name="bio" rows="4"><?php echo $row['bio'] ?></textarea>
                                <div class="form-help">Maximum 100 characters</div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                id="updateCancelBtn"
                                onclick="">Cancel</button>
                            <button type="submit" class="btn btn-success" id="updateSaveBtn">Update Teacher</button>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="../assets/js/admin.js"></script>
    <script>
        document.getElementById('updateCancelBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel? Changes will not be saved.')) {
                window.location.href = 'teachers.php';
            }
        });
    </script>
</body>

</html>
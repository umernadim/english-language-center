<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: index.php');
  exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teachers Panel | Hope English Language Center</title>
  <meta name="robots" content="noindex, nofollow" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
  <!-- Sidebar -->
  <?php
  include 'assets/components/sidebar.php'
  ?>

  <main class="main-content">
    <!-- Top Bar -->
    <?php
    include 'assets/components/navbar.php'
    ?>

    <!-- Content Grid -->
    <div class="content-grid">
      <!-- Left Column -->
      <div class="left-column">
        <!-- Recent Students -->
        <div class="content-card">
          <div class="card-header">
            <h3>Teachers</h3>
            <div class="card-actions">
              <button class="btn" id="add">
                <i class="ri-add-line"></i>
                <span>Add Teacher</span>
              </button>
            </div>
          </div>

          <div class="table-container" style="overflow-x: scroll">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM teachers";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result)) {
            ?>
              <table>
                <thead>
                  <tr>
                    <th>Teachers</th>
                    <th>Bio</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody> <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                      <td>
                        <div
                          style="display: flex; align-items: center; gap: 0.5rem">
                          <div
                            style="
                            width: 35px;
                            height: 35px;
                            border-radius: 50%;
                            overflow: hidden;
                          ">
                            <img
                              src=" <?= $row['image_url'] ?>"
                              alt="Student"
                              style="width: 100%; height: 100%; object-fit: cover" />
                          </div>
                          <div>
                            <div style="font-weight: 600"> <?= $row['name'] ?> </div>
                            <div style="font-size: 0.8rem">
                              <?= $row['designation'] ?>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?= $row['bio'] ?>
                      </td>

                      <td>
                        <div class="action-buttons">
                          <a href="updateTeacher.php?id=<?php echo $row['id']; ?>" class="action-btn edit" id="update-btn">
                            <i class="ri-edit-line"></i>
                          </a>
                          <a
                            href="deleteTeacher.php?id=<?php echo $row['id'] ?>"
                            class="action-btn delete"
                            onclick="return confirm('Do you want to remove this teacher?')">
                            <i class="ri-delete-bin-line"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php
                        }
                  ?>
                </tbody>
              </table>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--  code for add modal functionality -->
<div class="modal-overlay" id="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 id="addModalTitle">Add New Teacher</h2>
      <button class="close-modal" id="closeModal">&times;</button>
    </div>

    <form id="addForm" action="addTeacher.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Teacher Photo</label>
          <div class="file-input-container">
            <input type="file" id="addPhoto" accept="image/*" class="form-control" name="photo" />
            <div class="file-input-label">
              <i class="ri-upload-cloud-line"></i>
              <span>Click to upload photo</span>
            </div>
          </div>
          <div class="file-preview" id="addPhotoPreview"></div>
          <div class="form-help">Recommended size: 300x300px, max 2MB</div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Full Name</label>
            <input type="text" id="addTeacherName" class="form-control" name="name" placeholder="Enter full name" required />
          </div>
          <div class="form-group">
            <label class="form-label">Designation</label>
            <input type="text" id="addTeacherDesignation" class="form-control" name="designation" placeholder="e.g., Spoken English Mentor" required />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Bio/Description</label>
          <textarea id="addTeacherBio" class="form-control" name="bio" rows="4" placeholder="Write a brief bio about the teacher..."></textarea>
          <div class="form-help">Maximum 100 characters</div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cancelBtn">Cancel</button>
        <button type="submit" class="btn btn-success" id="saveBtn">Save Teacher</button>
      </div>
    </form>
  </div>
</div>


<script src="../assets/js/admin.js"></script>
</html>
</body>

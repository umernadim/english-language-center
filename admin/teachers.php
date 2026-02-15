<?php
session_start();
include '../config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teachers-Data | Hope English Language Center</title>
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
              <button class="btn">
                <i class="ri-add-line"></i>
                <span>Add Teacher</span>
              </button>
            </div>
          </div>

          <div class="table-container" style="overflow-x: scroll">
            <?php
            include '../config.php';
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
  <div class="modal-overlay" id="add-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalTitle">Add New Teacher</h2>
        <button class="close-modal" id="closeModal">&times;</button>
      </div>

      <form id="teacherForm" action="addTeacher.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">Teacher Photo</label>
            <div class="file-input-container">
              <input
                type="file"
                id="photo"
                accept="image/*"
                class="form-control"
                name="photo" />
              <div class="file-input-label">
                <i class="ri-upload-cloud-line"></i>
                <span>Click to upload photo</span>
              </div>
            </div>
            <div class="file-preview" id="photoPreview"></div>
            <div class="form-help">Recommended size: 300x300px, max 2MB</div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Full Name</label>
              <input
                type="text"
                id="teacherName"
                class="form-control"
                placeholder="Enter full name"
                name="name"
                required />
            </div>

            <div class="form-group">
              <label class="form-label">Designation</label>
              <input
                type="text"
                id="teacherDesignation"
                class="form-control"
                placeholder="e.g., Spoken English Mentor"
                name="designation"
                required />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Bio/Description</label>
            <textarea
              id="teacherBio"
              class="form-control"
              placeholder="Write a brief bio about the teacher..."
              rows="4"
              name="bio"></textarea>
            <div class="form-help">Maximum 100 characters</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="cancelBtn">
            Cancel
          </button>
          <button type="submit" class="btn btn-success" id="saveBtn">
            Save Teacher
          </button>
        </div>
      </form>
    </div>
  </div>

  <!--  code for update modal functionality -->
  <div class="modal-overlay" id="update-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalTitle">Update Teacher</h2>
        <button class="close-modal" id="closeModal">&times;</button>
      </div>
      <?php
      include '../config.php';
      $id = $_GET['id'];
      $sql = "SELECT * FROM teachers WHERE id = {$id}";
      $result = mysqli_query($connect, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>

          <form id="teacherForm" action="updateTeacher.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-row">
                <input type="hidden" name="teacher_id" id="teacherId"
                  value="<?php echo $row['id'] ?>" />
              </div>
              <div class="form-group">
                <label class="form-label">Teacher Photo</label>
                <div class="file-input-container">
                  <input
                    type="file"
                    id="photo"
                    accept="image/*"
                    class="form-control"
                    name="photo" />
                  <div class="file-input-label">
                    <i class="ri-upload-cloud-line"></i>
                    <span>Click to upload photo</span>
                  </div>
                </div>
                <div class="file-preview" id="photoPreview">
                  <?php if (!empty($row['image_url'])) { ?>
                    <img src="<?php echo $row['image_url']; ?>" alt="Teacher Photo" />
                  <?php } ?>


                </div>
                <div class="form-help">Recommended size: 300x300px, max 2MB</div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Full Name</label>
                  <input
                    type="text"
                    id="teacherName"
                    class="form-control"
                    placeholder="Enter full name"
                    name="name"
                    required
                    value="<?php echo $row['name'] ?>" />
                </div>

                <div class="form-group">
                  <label class="form-label">Designation</label>
                  <input
                    type="text"
                    id="teacherDesignation"
                    class="form-control"
                    placeholder="e.g., Spoken English Mentor"
                    name="designation"
                    required
                    value="<?php echo $row['designation'] ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Bio/Description</label>
                <textarea
                  name="bio"
                  id="teacherBio"
                  rows="4"><?php echo $row['bio'] ?></textarea>
                <div class="form-help">Maximum 100 characters</div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="cancelBtn">
                Cancel
              </button>
              <button type="submit" class="btn btn-success" id="saveBtn">
                Update Teacher
              </button>
            </div>
          </form>
      <?php
        }
      }
      ?>
    </div>
  </div>

</body>
<script src="../assets/js/admin.js"></script>

</html>
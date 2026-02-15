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
  <title>Feedback-Data | Hope English Language Center</title>
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
            <h3>Feedback</h3>
            <div class="card-actions">
              <button class="btn">
                <i class="ri-add-line"></i>
                Add Feedback
              </button>
            </div>
          </div>

          <div class="table-container">
            <?php
            include '../config.php';
            $sql = "SELECT * FROM feedback";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result)) {
            ?>
              <table>
                <thead>
                  <tr>
                    <th>Author</th>
                    <th>Feedback</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
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
                              src=" <?= $row['photo_url'] ?> "
                              alt="author"
                              style="width: 100%; height: 100%; object-fit: cover" />
                          </div>
                          <div>
                            <div style="font-weight: 600"> <?= $row['name'] ?> </div>
                            <div style="font-size: 0.8rem"> <?= $row['profession'] ?> </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?= $row['feedback'] ?>
                      </td>

                      <td>
                        <div class="action-buttons">
                          <div class="action-btn edit" id="update-btn">
                            <i class="ri-edit-line"></i>
                          </div>
                          <div class="action-btn delete">
                            <i class="ri-delete-bin-line"></i>
                          </div>
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

  <!--  code for modal functionality -->
  <div class="modal-overlay" id="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalTitle">Add Feedback</h2>
        <button class="close-modal" id="closeModal">&times;</button>
      </div>

      <form id="teacherForm">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">Student Photo</label>
            <div class="file-input-container">
              <input type="file" accept="image/*" class="form-control" />
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
                class="form-control"
                placeholder="Enter full name"
                required />
            </div>

            <div class="form-group">
              <label class="form-label">Profession</label>
              <input
                type="text"
                class="form-control"
                placeholder="e.g., Student's profession"
                required />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Feedback</label>
            <textarea
              class="form-control"
              placeholder="Write a feedback of a Student..."
              rows="4"></textarea>
            <div class="form-help">Maximum 200 characters</div>
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

  <script src="../assets/js/admin.js"></script>
</body>

</html>
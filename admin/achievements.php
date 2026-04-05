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
  <title>Achievements Panel| Hope English Language Center</title>
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
      <div class="left-column">
        <div class="content-card">
          <div class="card-header">
            <h3>Achievements</h3>
            <div class="card-actions">
              <button class="btn">
                <i class="ri-add-line"></i>
                <span>Add Achievement</span>
              </button>
            </div>
          </div>

          <div class="table-container">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM achievements";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result)) {
            ?>
              <table>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
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
                              src="<?= $row['image_url'] ?> "
                              alt="author"
                              style="width: 100%; height: 100%; object-fit: cover" />
                          </div>
                          <div>
                            <div style="font-weight: 600"> <?= $row['title'] ?> </div>
                          </div>
                        </div>
                      </td>
                      <td>
                         <?= $row['description'] ?> 
                      </td>
                      <td>
                        <div class="action-buttons">
                          <a href="updateAchievement.php?id=<?php echo $row['id'] ?>" class="action-btn edit" id="update-btn">
                            <i class="ri-edit-line"></i>
                          </a>
                          <a href="deleteAchievement.php?id=<?php echo $row['id'] ?>" 
                          class="action-btn delete"
                          onclick="return confirm('Are you sure to remove this achievement?')">
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

  <!--  code for modal functionality -->
  <div class="modal-overlay" id="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalTitle">Add Achievement</h2>
        <button class="close-modal" id="closeModal">&times;</button>
      </div>

      <form id="teacherForm" method="post" action="addAchievement.php" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">Achievement Photo</label>
            <div class="file-input-container">
              <input type="file" accept="image/*" id="addPhoto" class="form-control" name="photo"/>
              <div class="file-input-label">
                <i class="ri-upload-cloud-line"></i>
                <span>Click to upload photo</span>
              </div>
            </div>
            <div class="file-preview" id="addPhotoPreview"></div>
            <div class="form-help">Recommended size: 300x300px, max 2MB</div>
          </div>

          <div class="form-group">
            <label class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              placeholder="Enter achievement title"
              required 
              name="title"/>
          </div>

          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea
              class="form-control"
              placeholder="Write a short description about it..."
              rows="4"
              name="description"></textarea>
            <div class="form-help">Maximum 150 characters</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="cancelBtn">
            Cancel
          </button>
          <button type="submit" class="btn btn-success" id="saveBtn">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="../assets/js/admin.js"></script>
</body>

</html>
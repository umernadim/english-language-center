<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM subscribers ORDER BY subscribed_at DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $sql);

$countSql = "SELECT COUNT(*) AS total FROM subscribers";
$countResult = mysqli_query($connect, $countSql);
$totalRow = mysqli_fetch_assoc($countResult);
$totalSubscribers = $totalRow['total'];
$totalPages = ceil($totalSubscribers / $limit);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../assets/images/logo.jpeg" />
  <title>Subscribers Panel | Hope English Language Center</title>
  <meta name="robots" content="noindex, nofollow" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
  <?php include 'assets/components/sidebar.php'; ?>
  <main class="main-content">
    <?php include 'assets/components/navbar.php'; ?>

    <div class="content-grid">
      <div class="left-column">
        <div class="content-card">
          <div class="card-header">
            <h3>Subscribers</h3>
            <div class="card-actions">
              <a href="replySubscribers.php" class="btn" style="text-decoration: none;">
                <i class="ri-send-plane-fill"></i>
                <span>Send Email</span>
              </a>
            </div>
          </div>

          <div class="table-container">
            <?php if (mysqli_num_rows($result)) { ?>
              <table>
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Subscribed_at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td><?= $row['email'] ?></td>
                      <td><?= $row['subscribed_at'] ?></td>
                      <td>
                        <div class="action-buttons">
                          <a href="deleteSubscriber.php?id=<?= $row['id'] ?>" class="action-btn delete"
                            onclick="return confirm('Are you sure to remove this email?')">
                            <i class="ri-delete-bin-line"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            <?php } else { ?>
              <p>No email found.</p>
            <?php } ?>
          </div>
        </div>
        <!-- Pagination -->
        <div class="pagination">
          <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="prev">Previous</a>
          <?php endif; ?>

          <span>Page <?= $page ?> of <?= $totalPages ?></span>

          <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>" class="next">Next</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>

</body>

</html>
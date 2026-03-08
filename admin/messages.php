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

// ✅ SINGLE FILTER QUERY - Always use this
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

$whereClause = "";
$params = [];
switch ($filter) {
    case 'new':
        $whereClause = "WHERE is_read = 0 AND replied = 0";
        break;
    case 'read':
        $whereClause = "WHERE is_read = 1 AND replied = 0";
        break;
    case 'replied':
        $whereClause = "WHERE replied = 1";
        break;
    default:
        $whereClause = ""; 
}

// Main query with filter + pagination
$sql = "SELECT * FROM messages $whereClause ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $sql);

// ✅ Total count with SAME filter
$countSql = "SELECT COUNT(*) AS total FROM messages $whereClause";
$countResult = mysqli_query($connect, $countSql);
$totalRow = mysqli_fetch_assoc($countResult);
$totalMessages = $totalRow['total'];
$totalPages = ceil($totalMessages / $limit);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../assets/images/logo.jpeg" />
  <title>Messages Panel | Hope English Language Center</title>
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
            <h3>Messages</h3>
            <div class="filters">
              <a href="?filter=all" class="<?= ($filter == 'all') ? 'active' : '' ?>">All</a>
              <a href="?filter=new" class="<?= ($filter == 'new') ? 'active' : '' ?>">New</a>
              <a href="?filter=read" class="<?= ($filter == 'read') ? 'active' : '' ?>">Read</a>
              <a href="?filter=replied" class="<?= ($filter == 'replied') ? 'active' : '' ?>">Replied</a>
            </div>
          </div>

          <div class="table-container">
            <?php if (mysqli_num_rows($result)) { ?>
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td>
                        <div style="font-weight: 600"><?= $row['name'] ?></div>
                        <div style="font-size: 0.8rem"><?= $row['email'] ?></div>
                      </td>
                      <td><?= $row['message'] ?></td>
                      <td>
                        <?php
                        echo $row['replied'] ? "Replied" : ($row['is_read'] ? "Read" : "New");
                        ?>
                      </td>
                      <td>
                        <div class="action-buttons">
                          <a href="replyMsgForm.php?id=<?= $row['id'] ?>" class="action-btn edit replyBtn">
                            <i class="ri-send-plane-fill"></i>
                          </a>
                          <a href="deleteMessage.php?id=<?= $row['id'] ?>" class="action-btn delete"
                            onclick="return confirm('Are you sure to delete this message?')">
                            <i class="ri-delete-bin-line"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            <?php } else { ?>
              <p>No messages found.</p>
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
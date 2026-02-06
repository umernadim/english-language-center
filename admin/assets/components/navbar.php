<!-- Top Bar -->
<nav class="top-bar">
  <div class="page-title">
    <h1>Dashboard</h1>
    <p>Welcome back, <?php echo $_SESSION['admin_name']; ?>! Here's what's happening today.</p>
  </div>
  <div class="top-bar-actions">
    <div class="user-menu">
      <div class="user-profile">
        <div class="user-info">
          <h4><?php echo $_SESSION['admin_name']; ?></h4>  <!-- ✅ Dynamic name -->
          <p>Administrator</p>
        </div>
      </div>
    </div>
  </div>
  <button class="menu-toggle"><i class="ri-menu-3-line"></i></button>
</nav>

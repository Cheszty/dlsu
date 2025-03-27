<style>
    /* Floating Sidebar */
    .main-sidebar {
      position: fixed;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      width: 240px; /* Adjusted for better fit */
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.15);
      padding: 10px; /* Reduced padding */
      transition: all 0.3s ease-in-out;
    }

    /* Sidebar Hover Effect */
    .main-sidebar:hover {
      width: 250px;
    }

    /* Sidebar Logo */
    .sidebar-logo {
      text-align: center;
      padding: 10px 0; /* Reduced padding */
    }

    .sidebar-logo img {
      width: 80%;
      max-width: 120px; /* Adjusted for better fit */
    }

    /* Title */
    .title {
      font-size: 16px; /* Adjusted size */
      font-weight: 600;
      text-align: center;
      color: #222;
      margin-bottom: 15px; /* Adjusted spacing */
    }

    /* Sidebar Menu */
    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-menu li {
      display: block;
      margin-bottom: 8px; /* Reduced spacing */
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      padding: 8px 12px; /* Reduced padding */
      font-size: 13px; /* Adjusted text size */
      border-radius: 6px;
      transition: all 0.3s ease;
      color: #222;
      font-weight: 500;
      text-decoration: none;
      white-space: nowrap; /* Prevents text wrapping */
    }

    .sidebar-menu i {
      font-size: 14px; /* Reduced icon size */
      margin-right: 8px;
      color: #222;
      transition: color 0.3s ease;
    }

    /* Hover Effect */
    .sidebar-menu a:hover {
      background: #333;
      color: white;
    }

    .sidebar-menu a:hover i {
      color: white;
    }

    /* Active / Clicked State */
    .sidebar-menu a.active {
      background: #333;
      color: white;
    }

    .sidebar-menu a.active i {
      color: white;
    }

    /* Profile Section */
    .sidebar-profile {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      background: #f5f5f5;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      transition: 0.3s ease;
      color: black;
      white-space: nowrap;
      overflow: hidden;
      text-decoration: none;
    }

    .sidebar-profile:hover {
      background: #e0e0e0;
    }

    /* Profile Image */
    .sidebar-profile img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
      border: 1.5px solid #222;
    }

    /* Profile Info */
    .sidebar-profile .profile-info {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .sidebar-profile .profile-info .name {
      font-weight: 600;
      font-size: 14px;
      color: black;
    }

    .sidebar-profile .profile-info .role {
      font-size: 11px;
      color: black;
    }

    /* Mobile Optimization */
    @media (max-width: 768px) {
      .main-sidebar {
        left: 10px;
        width: 200px;
        border-radius: 10px;
      }

      .sidebar-menu a {
        font-size: 12px;
        padding: 6px 10px;
      }

      .sidebar-profile {
        flex-direction: column;
        text-align: center;
      }

      .sidebar-profile img {
        width: 50px;
        height: 50px;
      }
    }
</style>

<!-- Sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
      <img src="../images/thesishub_logo2.png" alt="Thesis Hub Logo">
    </div>

    <p class="title">THESIS TRACKER</p>
    <hr class="my-4">
    <!-- Navigation Menu -->
    <ul class="sidebar-menu">
    <li><a href="dashboard.php" style="color: black;"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>

      <?php if($_SESSION['type'] == 0): ?>
        <li><a href="users.php" style="color: black;"><i class="fas fa-users"></i> <span>USERS</span></a></li>
      <?php endif; ?>

      <li><a href="about.php" style="color: black;"><i class="fas fa-info-circle"></i> <span>ABOUT</span></a></li>

      <?php if($_SESSION['type'] != 0): ?>
        <li><a href="notifications.php" style="color: black;"><i class="fas fa-bell"></i> <span>NOTIFICATIONS</span></a></li>
      <?php endif; ?>

      <li><a href="templates.php" style="color: black;"><i class="fas fa-book"></i> <span>TEMPLATES</span></a></li>

      <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2): ?>
        <li><a href="tasklist.php" style="color: black;"><i class="fas fa-tasks"></i> <span>TASK LIST</span></a></li>
      <?php endif; ?>

      <li><a href="teams.php" style="color: black;"><i class="fas fa-users"></i> <span>TEAMS</span></a></li>

      <?php if($_SESSION['type'] == 0): ?>
        <li><a href="assignation.php" style="color: black;"><i class="fas fa-user-check"></i> <span>ASSIGNATION</span></a></li>
      <?php endif; ?>

      <li><a style="color: black;" href="../logout.php" onclick="return confirm('Are you sure you want to logout?');"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a></li>
    </ul>

    <!-- Profile Section -->
    <ul class="sidebar-menu">
      <li>
        <?php
          $sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
          $stmt = $this->conn()->query($sql);
          $row = $stmt->fetch();
        ?>
        <a href="#profile" data-toggle="modal" id="updateprofile" class="sidebar-profile"
          data-firstname="<?= $row['firstname'] ?>" 
          data-users_id="<?= $row['id'] ?>"
          data-lastname="<?= $row['lastname'] ?>"
          data-email="<?= $row['email'] ?>"
          data-img="<?= $row['img'] ?>"
        >
          <img src="../images/<?php echo $row['img'] ?>" alt="User Profile">
          <div class="profile-info">
            <span class="name"><?php echo $row['firstname'] . " " . $row['lastname']; ?></span>
            <span class="role"><?php echo ($_SESSION['type'] == 1) ? "Faculty" : ($_SESSION['type'] == 2 ? "Student" : "Admin"); ?></span>
          </div>
        </a>
      </li>
    </ul>
  </section>
</aside>

    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>INSTASHOP MANAGEMENT SYSTEM</h3>

      </div>

      <ul class="list-unstyled components">
        <p>Admin's Dashboard</p>
        <li class="active">
          <a href="../admin/adminpanel.php">Admin's Home</a>
        </li>
        <li>
          <a href="../admin/changepassword.php">Change Password</a>
          <a href="../admin/viewuseraccount.php">View User Account</a>
          <a href="../admin/viewtrustedinstashop.php">View Trusted Instashop</a>
          <a href="../admin/viewapplication.php">View Instashop Application</a>
          <a href="../admin/adminviewinstashop.php">List of All Instashop</a>
          <a href="../admin/viewcomplaint.php">View Complaint</a>
        </li>
      </ul>
      <ul class="list-unstyled CTAs">
        <li><a href="../index.php" class="download">Back to Website</a></li>
        <li><a href="../lib/act_logout.php" class="btn btn-danger">Logout</a></li>
      </ul>
    </nav>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
     $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
         $(this).toggleClass('active');
       });
     });
   </script>
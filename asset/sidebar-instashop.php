    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>INSTASHOP MANAGEMENT SYSTEM</h3>
      </div>

      <ul class="list-unstyled components">
        <p>Instashop's Panel</p>
        <li>
          <a href="index.php">Instashop's Home</a>
        </li>
        <li>
          <a href="accountsetting.php">Account Setting</a>
          <a href="companyprofile.php">Submit Company Profile</a>
          <a href="submitstatus.php">Submit Trusted Status</a>
          <a href="viewfeedback.php">View Feedback</a>
        </li>
      </ul>
      <ul class="list-unstyled CTAs">
                        <p><li>Current Status:  <?php 
                $id = $_SESSION['id_user'];
                $sql = $con->prepare('SELECT * FROM instashop where id_user = :id');
                $sql->bindParam(':id', $id, PDO::PARAM_INT);
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                  $status = $row['status'];
                  if ($status == '1') {
                    echo '<b> <font color="yellow">Application Pending</font></b>';
                  }
                  elseif ($status == '2') {
                    echo '<b> <font color="green">Trusted</font></b>';
                  }
                  elseif ($status == '3') {
                    echo '<b> <font color="orange">Not Trusted (Application Rejected)</font></b>';
                  }
                  else{
                    echo '<b><font color="red">Not Trusted</font></b>';
                  }
                }

                ?></li></p>
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
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?=t('Search') . ($query ? ': ' . htmlspecialchars($query) : '') ?></title>
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?=$link_rss ?>">
    <link rel="icon" href="/images/envri_logo_final.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Custom fonts for this template-->
  <link href="UI/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="UI/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/app.css" type="text/css"/>

        <style>
         .centerSearchBox {
           padding-top:9%;
             top: 12%;
             width:100%;

             background-color:white;


         }
      </style>


</head>
<body id="page-top" class="sidebar-toggled" style="background-color:white;">
  <!-- Page Wrapper -->
  <div id="wrapper" style="padding-bottom:70px;">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color:white;">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>
            <div style="background-color:white; width:100%;padding:5px; border-radius:10px;"><img src="images/envri_logo_final.png" style="width:55px; height:40px;" /></div>
        </a>

          <ul class="navbar-nav ml-auto">
            <?php include 'templates/MenuBar.php'; ?>
          </ul>
        </nav>
        <!-- ------------------------------------------------------------------------------------------ End of Topbar -->
        <!-- ------------------------------------------------------------------------------------- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">

               <div class="col-lg-12 mb-4">
                  <div class="card shadow mb-12">
                     <div class="card-header py-12">
                        <h6 class="m-0 font-weight-bold text-primary">Search log</h6>
                     </div>
                     <div class="card-body" style="min-height:740px">

                        <?php
                        $db_password="fachmann573";
                        $errors = array();

                        // connect to database
                        $db = mysqli_connect('localhost', 'root', $db_password, 'SearchHistory');

                        if (!$db) {
                            echo "Error: Unable to connect to MySQL." . PHP_EOL ."<br/>";
                            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL."<br/>";
                            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL."<br/>";

                            if(mysqli_connect_errno()=="1049"){
                                $db = mysqli_connect('localhost', 'root', $db_password);
                                $sql = "CREATE DATABASE SearchHistory";
                                if ($db->query($sql) === TRUE) {
                                    //echo "Database created successfully"."<br/>";
                                    $db = mysqli_connect('localhost', 'root', $db_password, 'SearchHistory');
                                    $sql = "CREATE TABLE SearchLog (
                                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                UID VARCHAR(50) NOT NULL,
                                                SearchQuery VARCHAR(250) NOT NULL,
                                                Frequency BIGINT,
                                                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                            )";

                                    if ($db->query($sql) === TRUE) {
                                        //echo "The table created successfully"."<br/>";
                                    }
                                    else {
                                      echo "Error creating table: " . $db->error."<br/>";
                                    }
                                }
                                else {
                                  echo "Error creating database: " . $db->error."<br/>";
                                }
                            }
                            exit;
                        }
                        else
                        {
                            if($_SESSION['role']=="admin"){
                                $sql = "
                                SELECT
                                    search.Frequency as Frequency,
                                    search.SearchQuery as SearchQuery,
                                    user.email as email,
                                    user.username as username,
                                    user.role as role
                                FROM
                                    SearchHistory.SearchLog as search,
                                    registration.users as user
                                WHERE
                                    search.UID = user.id";

                                $result = $db->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row

                                   $cnt=0;
                                   echo '<div class="table-responsive">';
                                   echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                   echo '<thead> <th> # </th> <th> Search query <th> Frequency </th> </th> <th> username </th> <th> role </th> </thead>';
                                   echo '<tfoot> <th> # </th> <th> Search query <th> Frequency </th> </th> <th> username </th> <th> role </th> </tfoot>';
                                   echo "<tbody>";

                                   while($row = $result->fetch_assoc()) {
                                        $cnt++;
                                        echo '<tr> <td>' . $cnt .'</td> <td>' . $row["SearchQuery"] .'</td> <td>' . $row["Frequency"] . '</td>  <td> ' . $row["username"] . '</td>  <td>' . $row["role"] . '</td> </tr> ';
                                        //echo "UID: " . $row["UID"]. " Search Query:" . $row["SearchQuery"]."<br>";
                                   }

                                   echo '</tbody>';
                                   echo '</table>';
                                   echo '</div>';
                                }
                                 else {
                                     echo "0 results";
                                }
                            }
                            else{
                                $UID=$_SESSION['userid'];
                                $sql = "SELECT * FROM SearchLog WHERE UID='$UID'";

                                $result = $db->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row

                                   $cnt=0;
                                   echo '<div class="table-responsive">';
                                   echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                   echo '<thead> <th> # </th> <th> Search query </th> <th> Frequency </th> </thead>';
                                   echo '<tfoot> <th> # </th> <th> Search query </th> <th> Frequency </th></tfoot>';
                                   echo "<tbody>";

                                   while($row = $result->fetch_assoc()) {
                                        $cnt++;
                                        echo '<tr> <td>' . $cnt .'</td> <td>' . $row["SearchQuery"] .'</td> <td>' . $row["Frequency"] . '</td> </tr> ';
                                        //echo "UID: " . $row["UID"]. " Search Query:" . $row["SearchQuery"]."<br>";
                                   }

                                   echo '</tbody>';
                                   echo '</table>';
                                   echo '</div>';
                                }
                                else {
                                     echo "0 results";
                                }
                            }
                        }
                        $db->close();
                        ?>

                     </div>
                  </div>
               </div>

          </div>
        </div>
        <div id="wait">
          <img src="images/ajax-loader.gif">
          <p><?=t('wait'); ?></p>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white" style="  position: fixed; bottom: 0;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; OSS Engine 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="RegistrationSystem/login.php?logout='1'">
                <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span></a>

            </div>
          </div>
        </div>
      </div>
  <!-- Bootstrap core JavaScript-->
  <script src="UI/vendor/jquery/jquery.min.js"></script>
  <script src="UI/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="UI/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="UI/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="UI/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="UI/js/demo/chart-area-demo.js"></script>
  <script src="UI/js/demo/chart-pie-demo.js"></script>
</body>
</html>

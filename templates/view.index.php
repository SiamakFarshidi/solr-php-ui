<?php session_start(); ?>

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
    .items{
        border: 1px solid lightgray;
        padding: 1px;
        padding-left:5px;
        padding-right:5px;
        margin: 1px;
        margin-right: 3px;
        background-color:#F2F3F4;
    }
    .textualItem{
        color: black;
        font-size:9pt;
    }
    .filterItems{
        text-align:center;
        width:49.7%;
        display:inline-block;
        margin:0px;
        padding:5px;
        min-width:370px;
    }


  </style>




</head>
<body id="page-top" class="sidebar-toggled">



<?php // New Search
//----------------------------------------------------------------------------------------------------------------------

if (empty($_GET)) {
    include 'templates/FirstPage.php';
}
else {
    if ($view == 'LoginPage') {
        header('location: /RegistrationSystem/login.php');
    } elseif ($view == 'ImportTuples') {
        include 'templates/ImportTuples.php';
        exit();
    } elseif ($view == 'SearchLog') {
        include 'templates/SearchLog.php';
        exit();
    }

if ($_POST['txtAuthors']!="" OR $_POST['txtStation']!="" OR $_POST['txtDomain']!="" OR
    $_POST['txtDistributor']!="" OR $_POST['txtLong']!="" OR $_POST['txtLat']!="" OR
    $_POST['txtFrom']!="" OR $_POST['txtTo']!="") {
        $isSwitched=true;
    }
    //----------------------------------------------------------------------------------------------------------------------
    if($_SESSION['CurrentCategory'] != $view) {$isSwitched=true;}

    $_SESSION['CurrentCategory'] = "Webpages";
    if ($view == 'Webpages') {
        $_SESSION['CurrentCategory'] = "Webpages";
    } elseif ($view == 'ResearchInfrastructures') {
        $_SESSION['CurrentCategory'] = "ResearchInfrastructures";
    } elseif ($view == 'Services') {
        $_SESSION['CurrentCategory'] = "Services";
    } elseif ($view == 'Datasets') {
        $_SESSION['CurrentCategory'] = "Datasets";
    } elseif ($view == 'APIs') {
        $_SESSION['CurrentCategory'] = "APIs";
    } elseif ($view == 'ShowImageResults') {
             $_SESSION['CurrentCategory'] = "ShowImageResults";
    } elseif ($view == 'Notebooks') {
        $_SESSION['CurrentCategory'] = "Notebooks";
    }
    //----------------------------------------------------------------------------------------------------------------------

    if($isSwitched==true){
        $start= 1;
        $end=$limit;
        if($end> $total){$end=$total;}
        $page = ceil($start / $limit);
        $pages = ceil($total / $limit);

        if ($total > $start + $limit - 1) {
            $is_next_page = true;
            $link_next = buildurl($params, 's', $start + $limit);
        } else {
            $is_next_page = false;
        }
        // if isprevpage build link
        if ($start > 1) {
            $is_prev_page = true;
            $link_prev = buildurl($params, 's', $start - $limit);
        } else {
            $is_prev_page = false;
        }

        if($total==0){ print t('No results'); exit(0);}



        $isSwitched=false;
    }

?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- ---------------------------------------------------------------------------------------------------- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">


      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div style="background-color:white; width:100%;padding:5px; border-radius:10px;"><img src="images/envri_logo_final.png" style="width:55px; height:40px;" /></div>
      </a>

      <!-- Divider -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuerString" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-question-circle"></i>
          <span>Query</span>
        </a>
        <div id="collapseQuerString" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Query string</h6>
            <a class="collapse-item" href="./"> <i class="fas fa-glasses"></i> &nbsp; <?php echo t("New search"); ?></a>
            <a class="collapse-item" data-toggle="searchoptions" onclick="AdvancedSearch()"> <i class="fas fa-sliders-h"></i> &nbsp; <?php echo t("advanced_search"); ?></a>
            <a class="collapse-item" target="_blank"
             title="Search with a list if there are results for each list entry"
             href="/search-apps/search-list/"> <i class="fas fa-clipboard-list"></i> &nbsp; <?php echo t("search_by_list"); ?></a>
          </div>
        </div>
<hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading" style="font-size:xx-small; color:#99e6ff;">
        Unstructured Sources
      </div>

        <a class="nav-link"
          style="<?php echo ($_SESSION['CurrentCategory'] == 'Webpages' ? 'color:yellow;font-weight: bold;' : ''); ?>"
          href="<?php echo buildurl($params, 'view', 'Webpages', 'q', $query); ?>">
          <i class="fas fa-globe"  style="<?php echo ($_SESSION['CurrentCategory'] == 'Webpages' ? 'color:yellow;font-weight: bold;' : ''); ?>"></i>
          <span>Webpages</span>
        </a>

        <a class="nav-link"
          style="<?php echo ($_SESSION['CurrentCategory'] == 'ShowImageResults' ? 'color:yellow;font-weight: bold;' : ''); ?>"
          href="<?php echo buildurl($params, 'view', 'ShowImageResults', 'q', $query); ?>">
          <i class="fas fa-images"  style="<?php echo ($_SESSION['CurrentCategory'] == 'ShowImageResults' ? 'color:yellow;font-weight: bold;' : ''); ?>"></i>
          <span>Images</span>
        </a>
      <hr class="sidebar-divider">

      <div class="sidebar-heading"  style="font-size:xx-small; color:#99e6ff;">
        Structured Sources
      </div>
        <a class="nav-link"
            style="<?php echo ($_SESSION['CurrentCategory'] == 'ResearchInfrastructures' ? 'color:yellow;font-weight: bold;' : ''); ?>"
            href="<?php echo buildurl($params, 'view', 'ResearchInfrastructures', q, $query); ?>">
             <i class="fas fa-cubes" style="<?php echo ($_SESSION['CurrentCategory'] == 'ResearchInfrastructures' ? 'color:yellow;font-weight: bold;' : ''); ?>" ></i>
              <span>Research Infrastructures</span>
        </a>

        <a class="nav-link"
          style="<?php echo ($_SESSION['CurrentCategory'] == 'Services' ? 'color:yellow;font-weight: bold;' : ''); ?>"
          href="<?php echo buildurl($params, 'view', 'Services', null, null); ?>">
          <i class="fab fa-uikit" style="<?php echo ($_SESSION['CurrentCategory'] == 'Services' ? 'color:yellow;font-weight: bold;' : ''); ?>" ></i>
          <span>Service Catalogs</span>
        </a>

        <a class="nav-link"
            style="<?php echo ($_SESSION['CurrentCategory'] == 'Datasets' ? 'color:yellow;font-weight: bold;' : ''); ?>"
            href="<?php echo buildurl($params, 'view', 'Datasets', null, null);?>">
              <i class="fas fa-coins" style="<?php echo ($_SESSION['CurrentCategory'] == 'Datasets' ? 'color:yellow;font-weight: bold;' : ''); ?>" ></i>
              <span>Datasets</span>
        </a>
        <a class="nav-link"
            style="<?php echo ($_SESSION['CurrentCategory'] == 'APIs' ? 'color:yellow;font-weight: bold;' : ''); ?>"
            href="<?php echo buildurl($params, 'view', 'APIs', null, null); ?>" >
              <i class="fas fa-code" style="<?php echo ($_SESSION['CurrentCategory'] == 'APIs' ? 'color:yellow;font-weight: bold;' : ''); ?>" ></i>
              <span>APIs</span>
        </a>
        <a class="nav-link"
            style="<?php echo ($_SESSION['CurrentCategory'] == 'Notebooks' ? 'color:yellow;font-weight: bold;' : ''); ?>"
            href="<?php echo buildurl($params, 'view', 'Notebooks', null, null); ?>" >
              <i class="fas fa-book-open" style="<?php echo ($_SESSION['CurrentCategory'] == 'Notebooks' ? 'color:yellow;font-weight: bold;' : ''); ?>" ></i>
              <span>Notebooks</span>
        </a>
       <!-- Visualization Button --------------------------------------------- -->
        <?php
    // Setup parameters for graph visualization by Open Semantic Visual Linked Data Graph Explorer
    $link_graph = '/search-apps/graph/?q=' . $query;
    $link_graph.= '&fl=' . implode(',', $graph_fields);
    foreach ($cfg['facets'] as $facet => $facet_config) {
        if (in_array($facet, $graph_fields)) {
            // todo: read from coming facet config graph_limit
            $facetlimit = 50;
            if (isset($facets_limit[$facet])) {
                $facetlimit = $facets_limit[$facet];
            }
            $link_graph.= "&f." . $facet . ".facet.limit=" . $facetlimit;
        }
    }
?>
        </li>
       <hr class="sidebar-divider">
          <!-- Heading -->
          <div class="sidebar-heading"  style="font-size:xx-small; color:#99e6ff;">
            Visualization
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
        <!--
            <a class="nav-link" href="<?=$link_graph
?>" target="_blank">
                  <i class="fab fa-hubspot"></i>
                  <span>Graph Visualization</span>
            </a>
        -->


        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVisualization" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-sitemap"></i>
          <span>Results</span>
        </a>
        <div id="collapseVisualization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Search Results</h6>
            <a class="collapse-item"  href="<?php echo buildurl($params, 'view', 'VisualizeWebpages', 'q', $query,); ?>"  target="_blank" > <i class="fas fa-list-ul"></i> &nbsp; Webpages</a>
            <a class="collapse-item"  href="<?php echo buildurl($params, 'view', 'VisualizeWebsites', 'q', $query,); ?>"  target="_blank" > <i class="far fa-list-alt"></i> &nbsp; Websites</a>
          </div>
        </div>
         </li>
      <li class="nav-item">
        <a class="nav-link" href="SPARQLendpointVisualization/EndpointVisulization.php" target="_blank"> <i class="fas fa-project-diagram"></i> <span> SPARQL endpoints </span></a>
      </li>

       <!-- ------------------------------------------------------------------ -->
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo buildurl($params, 'view', 'OSSTeam', null, null); ?>" target="_blank">
          <i class="fas fa-users-cog"></i>
          <span>KBSE Team</span></a>

          <a class="nav-link" href="<?php echo buildurl($params, 'view', 'SendFeedback', null, null); ?>" target="_blank">
          <i class="fas fa-comments"></i>
          <span>Send feedback</span></a>

      </li>
      <hr class="sidebar-divider">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="font-size:15pt;"></button>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- --------------------------------------------------------------------------------------------- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <?php include 'templates/SearchBox.php'; ?>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <?php include 'templates/MenuBar.php'; ?>
          </ul>
        </nav>
        <!-- ------------------------------------------------------------------------------------------ End of Topbar -->

        <!-- ------------------------------------------------------------------------------------- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">

            <?php
    if ($total == 0 && $view!="Datasets") { ?>
              <div id="noresults" class="panel"><?php
        if ($error) {
            print '<p>' . t('Error:') . '</p><p>' . $error . '</p>';
        } else {
            // Todo: Use t() elsewhere as well.
            print t('No results');
        } ?>
              </div>
              <?php
    } // total == 0
    else { // there are results documents
        if ($error) {
            print '<p>' . t('Error:') . '</p><p>' . $error . '</p>';
        }
        // print the results with selected view template
        if ($view == 'list') {
            include 'templates/pagination.php';
            include 'templates/view.list.php';
            include 'templates/pagination.php';
        }
         elseif ($view == 'Datasets') {
            include 'templates/datasetSearch.php';
        }
         elseif ($view == 'Notebooks') {
            include 'templates/Notebooks.php';
        }
        elseif ($view == 'VisualizeWebsites') {
            include 'templates/pagination.php';
            include 'templates/SearchResultVisualizationGraph.php';
        }
        elseif ($view == 'VisualizeWebpages') {
            include 'templates/pagination.php';
            include 'templates/SearchResultVisualizationGraph.php';
        }
        elseif ($view == 'preview') {
            include 'templates/pagination.php';
            include 'templates/view.preview.php';
            include 'templates/pagination.php';
        }
        elseif ($view == 'images') {
            include 'templates/pagination.php';
            include 'templates/view.images.php';
            include 'templates/pagination.php';
        }
        elseif ($view == 'videos') {
            include 'templates/pagination.php';
            include 'templates/view.videos.php';
            include 'templates/pagination.php';
        }
        elseif ($view == 'audios') {
            include 'templates/pagination.php';
            include 'templates/view.audios.php';
            include 'templates/pagination.php';
        }
        elseif ($view == 'table') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Table</h6>
                        </div>
                        <div class="card-body" style="min-height:750px">
                        <?php
            include 'templates/pagination.php';
            include 'templates/view.table.php';
            include 'templates/pagination.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'words') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Words (count of docs)</h6>
                        </div>
                        <div class="card-body" style="min-height:750px">
                        <?php
            include 'templates/view.words.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'graph') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Connection (Graph)</h6>
                        </div>
                        <div class="card-body" style="min-height:750px">
                        <?php
            include 'templates/view.graph.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'entities') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Named entities</h6>
                        </div>
                        <div class="card-body" style="min-height:750px">
                        <?php
            include 'templates/view.entities.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'trend') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Trend</h6>
                        </div>
                        <div class="card-body" style="min-height:750px">
                        <?php
            include 'templates/view.trend.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'map') {
?>
                <div class="container-fluid">
                  <!-- Content Row -->
                  <div class="row">
                    <div class="col-lg-12 mb-4">
                      <div class="card shadow mb-12">
                        <div class="card-header py-12">
                          <h6 class="m-0 font-weight-bold text-primary">Map</h6>
                        </div>
                        <div class="card-body" style="min-height:740px">
                        <?php
            include 'templates/view.map.php';
?>
                        </div>
                      </div>
                  </div>
                </div>
            <?php
        } elseif ($view == 'ShowImageResults') {
            include 'templates/ShowImageResults.php';
        } elseif ($view == 'OSSTeam') {
            include 'templates/OSSTeam.php';
        } elseif ($view == 'SendFeedback') {
            include 'templates/SendFeedback.php';
        } else {
            include 'templates/pagination.php';
            include 'templates/view.list.php';
            include 'templates/pagination.php';
        }
    } // if total <> 0: there were documents

?>
          </div>
        </div>
        <div id="wait">
          <img src="images/ajax-loader.gif">
          <p><?=t('wait'); ?></p>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; KBSE 2021</span>
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

<script>

function AdvancedSearch() {
            $(document).ready(function () {
                $('#AdvancedSearch').modal('show');
            });
        }

//if (sessionStorage.getItem("sidebarToggle") == "Slide"){
//    document.getElementById("sidebarToggle").click();
//    sessionStorage.setItem("sidebarToggle", "Slide");
//}


</script>


<?php // New Search

}
?>

</body>
</html>

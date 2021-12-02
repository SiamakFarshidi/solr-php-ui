<?php
session_start();

if((!isset($_SESSION['role']) || $_SESSION['role']!="admin")) {
    header('location: /RegistrationSystem/login.php');
    exit;
}
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
  	<script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="124719712444-ahjch8ggq6sgu1m8m78e4qug4qcn863o.apps.googleusercontent.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">



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
                        <h6 class="m-0 font-weight-bold text-primary">Knowledge base operations</h6>
                     </div>
                     <div class="card-body" style="min-height:740px">

                        <div style="width:100%; padding-left:5px; padding-top:0px;">
                              <button style="border:1px lightgray solid; margin-left:-2px; border-radius:0px; width:70px; padding:0px; height:35px;" class="btn btn-primary" type="button" id="btnPlnUpload" > Upload </button>
                              <button style="border:1px lightgray solid; margin-left:-2px; border-radius:0px; width:70px; padding:0px; height:35px; background-color:silver;" class="btn btn-primary" type="button" id="btnPlnDelete" > Delete </button>
                              <button style="border:1px lightgray solid; margin-left:-2px; border-radius:0px; width:70px; padding:0px; height:35px; background-color:silver;" class="btn btn-primary" type="button" id="btnPlnAdd" > Add </button>
                              <button style="border:1px lightgray solid; margin-left:-2px; border-radius:0px; width:70px; height:35px; padding:0px; background-color:silver;" class="btn btn-primary" type="button" id="btnPlnEdit" > Edit </button>
                              <button style="border:1px lightgray solid; margin-left:-2px; border-radius:0px; width:70px; height:35px; padding:0px; background-color:silver;" class="btn btn-primary" type="button" id="btnWebsiteUpdate" > Website </button>
                        </div>

                        <form id="frm-upload" action="" method="post" enctype="multipart/form-data">

                           <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px;" id="plnUploadDatasets">
                             <label for="cars">Select the structured datasource:</label><br />
                             <select name="structuredDatasource" id="structuredDatasource">
                                  <option value="-">-</option>
                                  <option value="ResearchInfrastructures">Research Infrastructures</option>
                                  <option value="ServiceCatalogs">Service Catalogs</option>
                                  <option value="Datasets">Datasets</option>
                                  <option value="APIs">APIs</option>
                              </select>
                              <br />
                              <br />
                              <label for="file"> Choose file: &nbsp;</label> <br />
                              <input type="file" class="file-input" name="file-input" id="file">
                              <br /><br />
                              <input type="submit" id="btn-submit" name="upload" class="btn btn-primary"
                                 value="Upload" style="width:100px;">
                           </div>

                           <div style="display:none;" id="plnDeleteAll">
                              <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px;">
                                   <label for="txtdeleteByURL">URL/REST API:</label> <br>
                                  <input type="text" id="txtdeleteByURL" name="txtdeleteByURL">
                                  <input type="submit" id="btn-submit" name="deleteByURL" class="btn btn-primary" value="Delete" style="width:70px; margin-left:20px; height:30px; padding:0px;"/>
                                    <br>
                                    <br>
                                   <label for="txtdeleteByTitle">Title:</label> <br>
                                  <input type="text" id="txtdeleteByTitle" name="txtdeleteByTitle">
                                  <input type="submit" id="btn-submit" name="deleteByTitle" class="btn btn-primary" value="Delete" style="width:70px; margin-left:20px; height:30px; padding:0px;"/>
                                    <br>
                                    <br>
                                   <label for="txtdeleteByQuery">Query:</label> <br>
                                  <input type="text" id="txtdeleteByQuery" name="txtdeleteByQuery">
                                  <input type="submit" id="btn-submit" name="btndeleteByQuery" class="btn btn-primary" value="Delete" style="width:70px; margin-left:20px; height:30px; padding:0px;"/>
                                    <br>
                                    <br>
                              </div>

                              <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px; display:none;">
                                  <label> Delete all indexed documents: &nbsp;</label><br />
                                  <input type="submit" id="btn-submit" name="deleteAll" class="btn btn-primary" value="Reset the KBSE" style="width:200px;"/>
                              </div>

                           </div>

                           <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px;  display:none;" id="plnAddNewDoc">
                              <label> Add a new document: &nbsp;</label><br />

                              <div style="width:100%; padding:20px;">

                                 <label for="cars">Type:</label><br />
                                 <select name="drpType" id="drpType">
                                      <option value="-">-</option>
                                      <option value="ResearchInfrastructure">Research Infrastructures</option>
                                      <option value="ServiceCatalog">Service Catalogs</option>
                                      <option value="Dataset">Datasets</option>
                                      <option value="API">APIs</option>
                                  </select>
                                  <br>
                                  <label for="txtNewDocTitle">Title:</label> <br>
                                  <input type="text" id="txtNewDocTitle" name="txtNewDocTitle"><br>

                                  <label for="txtDocRI">Doc RI:</label> <br>
                                  <input type="text" id="txtDocRI" name="txtDocRI"><br>

                                  <label for="txtDocContetnt">Content:</label> <br>
                                  <textarea name="txtDocContetnt" id="txtDocContetnt" cols="25" rows="5"></textarea><br>

                                  <label for="txtURL">URL/REST API:</label> <br>
                                  <input type="text" id="txtURL" name="txtURL"><br><br>
                                  <input type="submit" id="btn-submit" name="AddNewDoc" class="btn btn-primary" value="Add a new document" style="width:200px;"/>
                              </div>
                           </div>

                          <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px;  display:none;" id="plnEditDoc">
                              <label for="txtEditDocURL">URL/REST API:</label> <br>
                              <input type="text" id="txtEditDocURL" name="txtEditDocURL" value="<?php echo $_SESSION['DocID']; ?>">
                              <input type="submit" id="btn-submit" name="btnEditDocURL" class="btn btn-primary" value="Search"
                              style="width:70px; margin-left:20px; height:30px; padding:0px;"/> <br>

                             <label for="cars">Type:</label><br />
                             <select name="EditDocType" id="EditDocType">
                                  <option value="-">-</option>
                                  <option value="ResearchInfrastructures">Research Infrastructures</option>
                                  <option value="ServiceCatalogs">Service Catalogs</option>
                                  <option value="Datasets">Datasets</option>
                                  <option value="APIs">APIs</option>
                              </select>
                                  <br>
                                  <label for="txtEditDocTitle">Title:</label> <br>
                                  <input type="text" id="txtEditDocTitle" name="txtDocTitle" value="<?php echo $_SESSION['DocTitle']; ?>" ><br>

                                  <label for="txtEditDocContetnt">Content:</label> <br>
                                  <textarea name="txtEditDocContetnt" id="txtEditDocContetnt" cols="25" rows="5"> <?php echo $_SESSION['DocContent']; ?> </textarea><br>

                                  <label for="txtEditDocKeywords">Keywords:</label> <br>
                                  <input type="text" id="txtEditDocKeywords" name="txtEditDocKeywords" value="<?php echo $_SESSION['DocKeywords']; ?>"><br><br>

                                  <label for="txtEditDocDomain">Domain:</label> <br>
                                  <input type="text" id="txtEditDocDomain" name="txtEditDocDomain" value="<?php echo $_SESSION['DocDomain']; ?>"><br><br>

                                  <input type="submit" id="btn-submit" name="btnUploadDoc" class="btn btn-primary" value="Update" style="width:100px;"/>
                          </div>

                          <div style="padding:20px; border:1px solid lightgray;  margin-bottom:10px;  display:none;" id="plnWebsiteUpdate">

                              <label for="WebsiteURL">Website URL:</label> <br>
                              <input type="text" id="WebsiteURL" name="WebsiteURL"><br><br>

                             <label for="WebsiteType">Type:</label><br />
                             <select name="WebsiteType" id="WebsiteType">
                                  <option value="-">-</option>
                                  <option value="Websites">Websites</option>
                                  <option value="ResearchInfrastructures">Research Infrastructures</option>
                                  <option value="ServiceCatalogs">Service Catalogs</option>
                                  <option value="Datasets">Datasets</option>
                                  <option value="APIs">APIs</option>
                              </select><br><br>

                              <label for="WebsiteRI">Website RI:</label> <br>
                              <input type="text" id="WebsiteRI" name="WebsiteRI"><br><br>

                              <label for="WebsiteDomain">Website Domain:</label> <br>
                              <input type="text" id="WebsiteDomain" name="WebsiteDomain"><br><br>

                              <input type="submit" id="btn-submit" name="btnWebsiteUpdate" class="btn btn-primary" value="Update" style="width:100px;"/>

                          </div>


                        </form>
                     </div>
                  </div>
               </div>

                <script>
                    if(sessionStorage.getItem("CurrentTab")==="btnPlnUpload"){
                        CurrentTab("btnPlnUpload");
                    }
                    else if(sessionStorage.getItem("CurrentTab")==="btnPlnDelete"){
                        CurrentTab("btnPlnDelete");
                    }
                    else if(sessionStorage.getItem("CurrentTab")==="btnPlnAdd"){
                        CurrentTab("btnPlnAdd");
                    }
                    else if(sessionStorage.getItem("CurrentTab")==="btnPlnEdit"){
                        CurrentTab("btnPlnEdit");
                    }
                    else if(sessionStorage.getItem("CurrentTab")==="btnWebsiteUpdate"){
                        CurrentTab("btnWebsiteUpdate");
                    }
                    else{
                        CurrentTab("btnPlnUpload");
                    }

                   function CurrentTab(tab)
                   {
                        if(tab==="btnPlnUpload"){
                             document.getElementById("plnUploadDatasets").style.display = "block";
                             document.getElementById("plnDeleteAll").style.display = "none";
                             document.getElementById("plnAddNewDoc").style.display = "none";
                             document.getElementById("plnEditDoc").style.display = "none";
                             document.getElementById("plnWebsiteUpdate").style.display = "none";
                             document.getElementById('btnPlnUpload').style.backgroundColor ="#4e73df";
                             document.getElementById('btnPlnDelete').style.backgroundColor="silver";
                             document.getElementById('btnPlnAdd').style.backgroundColor ="silver";
                             document.getElementById('btnPlnEdit').style.backgroundColor="silver";
                             document.getElementById('btnWebsiteUpdate').style.backgroundColor="silver";

                             sessionStorage.setItem("CurrentTab", "btnPlnUpload");
                        }
                        else if(tab==="btnPlnDelete"){
                             document.getElementById("plnUploadDatasets").style.display = "none";
                             document.getElementById("plnDeleteAll").style.display = "block";
                             document.getElementById("plnAddNewDoc").style.display = "none";
                             document.getElementById("plnEditDoc").style.display = "none";
                             document.getElementById("plnWebsiteUpdate").style.display = "none";
                             document.getElementById('btnPlnUpload').style.backgroundColor ="silver";
                             document.getElementById('btnPlnDelete').style.backgroundColor="#4e73df";
                             document.getElementById('btnPlnAdd').style.backgroundColor ="silver";
                             document.getElementById('btnPlnEdit').style.backgroundColor="silver";
                             document.getElementById('btnWebsiteUpdate').style.backgroundColor="silver";

                             sessionStorage.setItem("CurrentTab", "btnPlnDelete");
                        }
                        else if(tab==="btnPlnAdd"){
                             document.getElementById("plnUploadDatasets").style.display = "none";
                             document.getElementById("plnDeleteAll").style.display = "none";
                             document.getElementById("plnAddNewDoc").style.display = "block";
                             document.getElementById("plnEditDoc").style.display = "none";
                             document.getElementById("plnWebsiteUpdate").style.display = "none";
                             document.getElementById('btnPlnUpload').style.backgroundColor ="silver";
                             document.getElementById('btnPlnDelete').style.backgroundColor="silver";
                             document.getElementById('btnPlnAdd').style.backgroundColor ="#4e73df";
                             document.getElementById('btnPlnEdit').style.backgroundColor="silver";
                             document.getElementById('btnWebsiteUpdate').style.backgroundColor="silver";

                             sessionStorage.setItem("CurrentTab", "btnPlnAdd");
                        }
                        else if(tab==="btnPlnEdit"){
                             document.getElementById("plnUploadDatasets").style.display = "none";
                             document.getElementById("plnDeleteAll").style.display = "none";
                             document.getElementById("plnAddNewDoc").style.display = "none";
                             document.getElementById("plnEditDoc").style.display = "block";
                             document.getElementById("plnWebsiteUpdate").style.display = "none";
                             document.getElementById('btnPlnUpload').style.backgroundColor ="silver";
                             document.getElementById('btnPlnDelete').style.backgroundColor="silver";
                             document.getElementById('btnPlnAdd').style.backgroundColor ="silver";
                             document.getElementById('btnPlnEdit').style.backgroundColor="#4e73df";
                             document.getElementById('btnWebsiteUpdate').style.backgroundColor="silver";
                             sessionStorage.setItem("CurrentTab", "btnPlnEdit");
                        }

                       else if(tab==="btnWebsiteUpdate"){
                             document.getElementById("plnUploadDatasets").style.display = "none";
                             document.getElementById("plnDeleteAll").style.display = "none";
                             document.getElementById("plnAddNewDoc").style.display = "none";
                             document.getElementById("plnEditDoc").style.display = "none";
                             document.getElementById("plnWebsiteUpdate").style.display = "block";
                             document.getElementById('btnPlnUpload').style.backgroundColor ="silver";
                             document.getElementById('btnPlnDelete').style.backgroundColor="silver";
                             document.getElementById('btnPlnAdd').style.backgroundColor ="silver";
                            document.getElementById('btnPlnEdit').style.backgroundColor="silver";
                             document.getElementById('btnWebsiteUpdate').style.backgroundColor="#4e73df";
                             sessionStorage.setItem("CurrentTab", "btnWebsiteUpdate");
                        }




                   }
                    $("#btnPlnUpload").click(function() {
                        CurrentTab("btnPlnUpload");
                    });

                    $("#btnPlnDelete").click(function() {
                        CurrentTab("btnPlnDelete");
                    });

                    $("#btnPlnEdit").click(function() {
                        CurrentTab("btnPlnEdit");
                    });

                    $("#btnPlnAdd").click(function() {
                        CurrentTab("btnPlnAdd");
                    });

                    $("#btnWebsiteUpdate").click(function() {
                        CurrentTab("btnWebsiteUpdate");
                    });

                </script>

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

    <script type="text/javascript">
        $("#structuredDatasource").change(function(){
            val = $(this).val();
            $.ajax({
                      type: 'post',
                      data: {ajax: 1,Type: val},
                      success: function(response){}
                 });
        });
   </script>

    <?php
    if (!empty($response))
    { ?>
    <div class="response <?php echo $response["type"]; ?>
        ">
        <?php echo $response["message"]; ?>
    </div>
    <?php
    } ?>

    <?php

    if (!empty(isset($_POST["AddNewDoc"])))
    {
        if($_POST['drpType']=="ResearchInfrastructure"){
            $Wikilink = "[* STANDARD DOC RI *]";
        }
        else if($_POST['drpType']=="ServiceCatalog"){
            $Wikilink = "[* STANDARD DOC SERVICECATALOGS *]";
        }
        else if($_POST['drpType']=="Dataset"){
            $Wikilink = "[* STANDARD DOC DATASETS *]";
        }
        else if($_POST['drpType']=="API"){
            $Wikilink = "[* STANDARD DOC APIs *]";
        }
        //--------------------------------------
         $document = new Apache_Solr_Document();
         $document->wikilink_ss=$Wikilink;
         $document->organization_ss=$_POST['txtDocRI'];
         $document->path0_s = getHost($_POST['txtURL']);
         $document->filename_extension_s ="html";
         $document->language_s = "en";
         $document->content_type_group_ss = ["Text document"];
         $document->content_type_ss = ["text/html; charset=UTF-8"];
         $document->id = $_POST['txtURL'];
         $document->dc_title_ss = $_POST['txtNewDocTitle'];
         $document->title_txt =  $_POST['txtNewDocTitle'];
         $document->content_txt = $_POST['txtDocContetnt'];
         $document->_text_ = $_POST['txtDocContetnt'];
         $document->text_txt_en = $_POST['txtDocContetnt'];
         $document->date_ss = ["today"];
         //$document->location_ss= explode(",", $Domain);
        //--------------------------------------
          $solr->addDocument($document);
    }

    //-------------------------------------------------------------------------------
    if (!empty(isset($_POST["deleteByURL"])))
    {
       $Delquery=$_POST["txtdeleteByURL"];
       DeletingDocById($solr,$Delquery);
    }
    else if (!empty(isset($_POST["deleteByTitle"])))
    {
       $Delquery=$_POST["txtdeleteByTitle"];
       DeletingDocByTitle($solr,$Delquery);
    }
    else if (!empty(isset($_POST["btndeleteByQuery"])))
    {
       $Delquery=$_POST["txtdeleteByQuery"];
       DeletingDocByQuery($solr,$Delquery);
    }
    else if (!empty(isset($_POST["deleteAll"])))
    {
        echo "deleting...";
        //DeletingAllDocuments($solr);
    }
    else if (!empty(isset($_POST["btnEditDocURL"])))
    {
        $SearchQuery=$_POST["txtEditDocURL"];
        $doc= SearchByURL($solr, $SearchQuery);

        //----------------------------------
        $_SESSION['DocID'] = $doc->id;
        //----------------------------------
        $txtText="";
        foreach($doc->title_txt as $mainText){
            if($txtText==""){
                $txtText=$mainText;
            }
            else
            {
                $txtText=$txtText . "," . $mainText;
            }
        }
        $_SESSION['DocTitle'] = $txtText;
        //----------------------------------
        $txtText="";
        foreach($doc->_text_ as $mainText){
            if($txtText==""){
                $txtText=$mainText;
            }
            else
            {
                $txtText=$txtText . "," . $mainText;
            }
        }
        $_SESSION['DocContent'] = $txtText;
        //----------------------------------
        $txtText="";
        foreach($doc->organization_ss as $mainText){
            if($txtText==""){
                $txtText=$mainText;
            }
            else
            {
                $txtText=$txtText . "," . $mainText;
            }
        }
        $_SESSION['DocKeywords'] = $txtText;
        //----------------------------------
        $txtText="";
        foreach($doc->location_ss as $mainText){
            if($txtText==""){
                $txtText=$mainText;
            }
            else
            {
                $txtText=$txtText . "," . $mainText;
            }
        }
        $_SESSION['DocDomain'] = $txtText;
        //----------------------------------
        echo '<meta http-equiv="refresh" content="0" />';
    }
    else if (!empty(isset($_POST["btnUploadDoc"]))){

        echo "okay";
        echo explode (",", $_SESSION['DocDomain']);

        //----------------------------------
        $_SESSION['DocID'] = "";
        $_SESSION['DocTitle'] = "";
        $_SESSION['DocContent'] = "";
        $_SESSION['DocKeywords'] = "";
        $_SESSION['DocDomain'] = "";
        header("Refresh:0");
    }
    else if (!empty(isset($_POST["btnWebsiteUpdate"]))){

        $BaseURL = getHost($_POST["WebsiteURL"]);
        $RelatedToRI = $_POST["WebsiteRI"];
        $Domain = $_POST["WebsiteDomain"];
        $Type = $_POST["WebsiteType"];

        if( $Type=="ResearchInfrastructures"){
            $Type = "[* STANDARD DOC RI *]";
        }
        else if( $Type=="ServiceCatalogs"){
            $Type = "[* STANDARD DOC SERVICECATALOGS *]";
        }
        else if( $Type=="Datasets"){
            $Type = "[* STANDARD DOC DATASETS *]";
        }
        else if( $Type=="APIs"){
            $Type = "[* STANDARD DOC APIs *]";
        }
        else if( $Type=="Websites"){
            $Type = "[* STANDARD DOC Websites *]";
        }



        UpdateByBaseURL($solr, $BaseURL, $RelatedToRI, $Domain, $Type);
    }

    //-------------------------------------------------------------------------------
    // Handle AJAX request (start)

    if( isset($_POST['ajax']) && isset($_POST['Type']) ){

        $_SESSION['Type'] =$_POST['Type'];

     exit;
    }
    //-------------------------------------------------------------------------------
    if (!empty(isset($_POST["upload"])))
    {
        echo '
           <div class="col-lg-12 mb-4">
              <div class="card shadow mb-12">
                 <div class="card-header py-12">
                    <h6 class="m-0 font-weight-bold text-primary">Ingested Data</h6>
                 </div>
                 <div class="card-body" style="min-height:740px">';
        if (($fp = fopen($_FILES["file-input"]["tmp_name"], "r")) !== false)
        {

            if ($_SESSION['Type']=='ServiceCatalogs'){
                showCSVContent($_FILES["file-input"]["tmp_name"]);
                uploadCSVfileToSolr_ServiceCatalogs($_FILES["file-input"]["tmp_name"], $solr);

            }
            elseif($_SESSION['Type']=='Datasets'){
                showCSVContent($_FILES["file-input"]["tmp_name"]);
                uploadCSVfileToSolr_Datasets($_FILES["file-input"]["tmp_name"], $solr);

            }
            elseif($_SESSION['Type']=='APIs'){
                showCSVContent($_FILES["file-input"]["tmp_name"]);
                uploadCSVfileToSolr_APIs($_FILES["file-input"]["tmp_name"], $solr);

            }

            elseif($_SESSION['Type']=='ResearchInfrastructures'){ //


                preprocessing_ResearchInfrastructures($_FILES["file-input"]["tmp_name"]);
                showCSVContent($_FILES["file-input"]["tmp_name"]);
                uploadCSVfileToSolr_ResearchInfrastructures($_FILES["file-input"]["tmp_name"], $solr);
            }
            $response = array(
            "type" => "success",
            "message" => "CSV is uploaded successfully"
            );
        }
        else
        {
            $response = array(
                "type" => "error",
                "message" => "Unable to process CSV"
            );
        }

        echo '
                 </div>
              </div>
           </div>';
    }
    ?>
    <?php if (!empty($response))
    { ?>
    <div>
        <?php echo $response["message"]; ?>
    </div>


    <?php
    } ?>

    <?php
    //------------------------------------------------------------------------------------------------------
    function getHost($Address) {
        $parseUrl = parse_url(trim($Address));
        $host=strtolower(trim($parseUrl[host] ? $parseUrl[host] : array_shift(explode('/', $parseUrl[path], 2))));

        if (strpos($host, 'www.') === 0 ) {
            $host=substr($host,4);
        }
        return $host;
    }
    //------------------------------------------------------------------------------------------------------
    function preprocessing_ResearchInfrastructures($filename)
    {
        $file_contents = file_get_contents($filename);
        $file_contents = str_replace("http://www.oil-e.net/ontology/envri-rm.owl#ResearchInfrastructure", "ResearchInfrastructure", $file_contents);
        $file_contents = str_replace("ResearchInfrastructure", "Research Infrastructure", $file_contents);
        $file_contents = str_replace("http://envri.eu/entity/QWmvj6lQv", "marine domain", $file_contents);
        $file_contents = str_replace("http://envri.eu/entity/QmAOWQhKx", "atmospheric domain", $file_contents);
        $file_contents = str_replace("http://envri.eu/entity/QRW2A7WrJ", "ecosystem domain", $file_contents);
        $file_contents = str_replace("envri:QRW2A7WrJ", "ecosystem domain", $file_contents);
        $file_contents = str_replace("http://envri.eu/entity/QqKsuhT0R", "solid earth domain", $file_contents);
        file_put_contents($filename, $file_contents);
    }
    //------------------------------------------------------------------------------------------------------
    function showCSVContent($filename)
    {
        $row = 1;
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';

        if (($handle = fopen($filename, "r")) !== false)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== false)
            {
                $num = count($data);
                if ($row == 1)
                {
                    echo "<thead>";
                    for ($c = 0;$c < $num;$c++)
                    {
                        echo "<th>" . $data[$c] . "</th>";
                    }
                    echo "</thead>";
                    echo "<tfoot>";
                    for ($c = 0;$c < $num;$c++)
                    {
                        echo "<th>" . $data[$c] . "</th>";
                    }
                    echo "</tfoot>";
                    echo "<tbody>";
                }
                else
                {
                    echo "<tr>";
                    for ($c = 0;$c < $num;$c++)
                    {
                        echo "<td>" . $data[$c] . "</td>";
                    }
                    echo "</tr>";
                }
                $row++;
            }
            fclose($handle);
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    //------------------------------------------------------------------------------------------------------
    function addNewDocumentToSolr($solr, $ContentType, $BaseURL, $PageURL, $LatestPageTitle, $PageTitle, $ParentPageTitle, $SiteTitle, $SpaceKey, $SpaceKeyName, $TitleTxt, $Wikilink, $FileExtension, $path0, $path1, $path2, $Path_basename, $MainText, $Email, $EmailDomain, $Phone, $Ontology3, $Ontology3URI, $Ontology3ReferableURI, $Ontology3MatchText, $Person, $Organization, $WorkOfArt, $Date, $Law, $Product, $Location)
    {
        $document = new Apache_Solr_Document();
        $document->content_type_ss = $ContentType;
        $document->title_txt = $TitleTxt;
        $document->wikilink_ss = $Wikilink;
        $document->language_s = "en";
        $document->content_type_group_ss = ["Text document"];
        $document->filename_extension_s = $FileExtension;
        $document->path0_s = $path0;
        $document->path1_s = $path1;
        $document->path2_s = $path2;
        $document->path_basename_s = $Path_basename;
        $document->_text_ = $MainText;
        $document->text_txt_en = $MainText;
        $document->email_ss = $Email;
        $document->email_domain_ss = $EmailDomain;
        $document->phone_ss = $Phone;
        $document->phone_normalized_ss = $Phone;
        $document->ontology_3_ss = $Ontology3;
        $document->ontology_3_ss_uri_ss = $Ontology3URI;
        $document->ontology_3_ss_preflabel_and_uri_ss = $Ontology3ReferableURI;
        $document->ontology_3_ss_matchtext_ss = $Ontology3MatchText;
        $document->person_ss = $Person;
        $document->organization_ss = $Organization;
        $document->work_of_art_ss = $WorkOfArt;
        $document->date_ss = $Date;
        $document->law_ss = $Law;
        $document->product_ss = $Product;
        $document->location_ss = $Location;
        $document->id = $PageURL;
        $document->dc_title_ss = $TitleTxt;
        $document->content_txt = $MainText;
        $solr->addDocument($document);
    }
    //------------------------------------------------------------------------------------------------------
    function DeletingAllDocuments($solr)
    {
        $solr->deleteByQuery("*:*");
        $solr->commit();
        print_r("All docs have been deleted!");
    }
    //------------------------------------------------------------------------------------------------------
    function DeletingDocById($solr,$DelURL)
    {
        try {
            $solr->deleteByQuery('id: "'.$DelURL.'"');
            $update_response = $solr->request("<commit/>");
            $response = $update_response->getResponse();
            print_r($response);
        }
        catch(Exception $e) {
            $error = $e->__toString();
        }
    }
    //------------------------------------------------------------------------------------------------------
    function appendArry($mainArray, $extraItems){
        foreach($extraItems as $item){
            if($item){
                array_push($mainArray, $item);
            }
        }
        return $mainArray;
    }
    //------------------------------------------------------------------------------------------------------
    function UpdateByBaseURL($solr, $BaseURL, $RelatedToRI, $Domain, $Type){
        try {
            $offset=0;
            do {
                $results = $solr->search('path0_s:"'.$BaseURL.'"',$offset,1000);
                $offset=$offset+999;
                $Docs=$results->response->docs;

                foreach($Docs as $doc){
                    $document = new Apache_Solr_Document();
                    $document=$doc;
                    //--------------------------------------
                    $document->wikilink_ss=$Type;
                    $document->organization_ss=$RelatedToRI;
                    $document->location_ss= explode(",", $Domain);
                    //--------------------------------------
                    $solr->addDocument($document);
                }
            } while ($Docs);
        }
        catch(Exception $e) {
            $error = $e->__toString();
        }
    }
    //------------------------------------------------------------------------------------------------------
    function SearchByURL($solr,$SearchURL)
    {
        try {
            $results = $solr->search('id: "'.$SearchURL.'"', 0, 1, $etl_status_solr_query_params);
        }
        catch(Exception $e) {
            $error = $e->__toString();
        }
        if (!empty($results->response)) {
            $total = (int)($results->response->numFound);
            if($total>0){
                $doc= $results->response->docs[0];
                return $doc;
//                echo "Title:". $doc->title_txt. "<br>";
//                echo "ID:". $doc->id. "<br>";
//                echo "Content:". $doc->content_txt. "<br>";
            }
        }

        return NULL;
    }
    //------------------------------------------------------------------------------------------------------
    function DeletingDocByTitle($solr,$DelTitle)
    {
        try {
            $solr->deleteByQuery('dc_title_ss:"'.$DelTitle.'"');
            $update_response = $solr->request("<commit/>");
            $response = $update_response->getResponse();
            print_r($response);
        }
        catch(Exception $e) {
            $error = $e->__toString();
        }
    }
    //------------------------------------------------------------------------------------------------------
    function DeletingDocByQuery($solr,$DelQuery)
    {
         try {
            $solr->deleteByQuery($DelQuery);
            $update_response = $solr->request("<commit/>");
            $response = $update_response->getResponse();
            print_r($response);
         }
        catch(Exception $e) {
            $error = $e->__toString();
        }
    }
    //------------------------------------------------------------------------------------------------------
    function uploadCSVfileToSolr_APIs($filename, $solr){
        ///////////////////////////////////////////////
        $ParentPageTitle = "null";
        $SpaceKey = "null";
        $SpaceKeyName = "null";
        $Wikilink = "[* STANDARD DOC APIs *]";
        $path0 = "null";
        $path1 = "null";
        $path2 = "null";
        $Ontology3 = "null";
        $Ontology3URI = "null";
        $Ontology3ReferableURI = "null";
        $Ontology3MatchText = "null";
        $WorkOfArt = "null";
        $Law = "null";
        $Product = ["null"];
        $Email = "null";
        $EmailDomain = "null";
        $Phone = "null";
        $Person = ["null"];
        ///////////////////////////////////////////////
        if (($handle = fopen($filename, "r")) !== false)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== false)
            {
                $FileExtension = "html";
                $ContentType = ["text/html; charset=UTF-8"];
                $path0=getHost($data[3]);
                $BaseURL = $data[2];
                $PageURL = $data[2];
                $LatestPageTitle = $data[0];
                $PageTitle = $data[2];
                $SiteTitle = $data[0];
                $TitleTxt = $data[0];
                $FileExtension = "html";
                $Path_basename = $data[2];
                $MainText = [$data[0]];
                $Organization = [$data[0]];
                $Date = ["today"];
                $Location = [$data[1]];
                addNewDocumentToSolr($solr, $ContentType, $BaseURL, $PageURL, $LatestPageTitle, $PageTitle, $ParentPageTitle, $SiteTitle, $SpaceKey, $SpaceKeyName, $TitleTxt, $Wikilink, $FileExtension, $path0, $path1, $path2, $Path_basename, $MainText, $Email, $EmailDomain, $Phone, $Ontology3, $Ontology3URI, $Ontology3ReferableURI, $Ontology3MatchText, $Person, $Organization, $WorkOfArt, $Date, $Law, $Product, $Location);
            }
            $solr->commit();
            fclose($handle);
        }
    }
    //------------------------------------------------------------------------------------------------------
    function uploadCSVfileToSolr_ServiceCatalogs($filename, $solr){
        ///////////////////////////////////////////////
        $ParentPageTitle = "null";
        $SpaceKey = "null";
        $SpaceKeyName = "null";
        $Wikilink = "[* STANDARD DOC SERVICECATALOGS *]";
        $path0 = "null";
        $path1 = "null";
        $path2 = "null";
        $Ontology3 = "null";
        $Ontology3URI = "null";
        $Ontology3ReferableURI = "null";
        $Ontology3MatchText = "null";
        $WorkOfArt = "null";
        $Law = "null";
        $Product = ["null"];
        $Email = "null";
        $EmailDomain = "null";
        $Phone = "null";
        $Person = ["null"];
        ///////////////////////////////////////////////
        if (($handle = fopen($filename, "r")) !== false)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== false)
            {
                $FileExtension = "html";
                $ContentType = ["text/html; charset=UTF-8"];
                $path0=getHost($data[3]);
                $BaseURL = $data[3];
                $PageURL = $data[3];
                $LatestPageTitle = $data[2];
                $PageTitle = $data[2];
                $SiteTitle = $data[1];
                $TitleTxt = $data[2];
                $FileExtension = "html";
                $Path_basename = $data[3];
                $MainText = [$data[0]];
                $Organization = [$data[0]];
                $Date = ["today"];
                $Location = [$data[4]];
                addNewDocumentToSolr($solr, $ContentType, $BaseURL, $PageURL, $LatestPageTitle, $PageTitle, $ParentPageTitle, $SiteTitle, $SpaceKey, $SpaceKeyName, $TitleTxt, $Wikilink, $FileExtension, $path0, $path1, $path2, $Path_basename, $MainText, $Email, $EmailDomain, $Phone, $Ontology3, $Ontology3URI, $Ontology3ReferableURI, $Ontology3MatchText, $Person, $Organization, $WorkOfArt, $Date, $Law, $Product, $Location);
            }
            $solr->commit();
            fclose($handle);
        }
    }
    //------------------------------------------------------------------------------------------------------
    function uploadCSVfileToSolr_Datasets($filename, $solr){
        ///////////////////////////////////////////////
        $ParentPageTitle = "null";
        $SpaceKey = "null";
        $SpaceKeyName = "null";
        $Wikilink = "[* STANDARD DOC DATASETS *]";
        $path0 = "null";
        $path1 = "null";
        $path2 = "null";
        $Ontology3 = "null";
        $Ontology3URI = "null";
        $Ontology3ReferableURI = "null";
        $Ontology3MatchText = "null";
        $WorkOfArt = "null";
        $Law = "null";
        $Product = ["null"];
        $Email = "null";
        $EmailDomain = "null";
        $Phone = "null";
        $Person = ["null"];
        ///////////////////////////////////////////////

        if (($handle = fopen($filename, "r")) !== false)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== false)
            {
                $FileExtension = "html";
                $ContentType = ["text/html; charset=UTF-8"];
                $path0=getHost($data[3]);
                $BaseURL = $data[3];
                $PageURL = $data[2];
                $LatestPageTitle = $data[1];
                $PageTitle = $data[1];
                $SiteTitle = $data[0];
                $TitleTxt = $data[1];
                $FileExtension = "html";
                $Path_basename = $data[3];
                $MainText = [$data[0]];
                $Organization = [$data[5]];
                $Date = ["today"];
                $Location = [$data[5]];

                addNewDocumentToSolr($solr, $ContentType, $BaseURL, $PageURL, $LatestPageTitle, $PageTitle, $ParentPageTitle, $SiteTitle, $SpaceKey, $SpaceKeyName, $TitleTxt, $Wikilink, $FileExtension, $path0, $path1, $path2, $Path_basename, $MainText, $Email, $EmailDomain, $Phone, $Ontology3, $Ontology3URI, $Ontology3ReferableURI, $Ontology3MatchText, $Person, $Organization, $WorkOfArt, $Date, $Law, $Product, $Location);
            }
            $solr->commit();
            fclose($handle);
        }
    }
    //------------------------------------------------------------------------------------------------------
    function uploadCSVfileToSolr_ResearchInfrastructures($filename, $solr)
    {
        ///////////////////////////////////////////////
        $ParentPageTitle = "null";
        $SpaceKey = "null";
        $SpaceKeyName = "null";
        $Wikilink = "[* STANDARD DOC RI *]";
        $path0 = "null";
        $path1 = "null";
        $path2 = "null";
        $Ontology3 = "null";
        $Ontology3URI = "null";
        $Ontology3ReferableURI = "null";
        $Ontology3MatchText = "null";
        $WorkOfArt = "null";
        $Law = "null";
        $Product = ["null"];
        $Email = "null";
        $EmailDomain = "null";
        $Phone = "null";
        $Person = ["null"];
        ///////////////////////////////////////////////
        if (($handle = fopen($filename, "r")) !== false)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== false)
            {
                $FileExtension = "html";
                $ContentType = ["text/html; charset=UTF-8"];
                $path0=getHost($data[3]);
                $BaseURL = $data[3];
                $PageURL = $data[3];
                $LatestPageTitle = $data[2];
                $PageTitle = $data[2];
                $SiteTitle = $data[1];
                $TitleTxt = $data[2];
                $FileExtension = "html";
                $Path_basename = $data[3];
                $MainText = [$data[4]];
                $Organization = [$data[0]];
                $Date = ["today"];
                $Location = [$data[5]];
                addNewDocumentToSolr($solr, $ContentType, $BaseURL, $PageURL, $LatestPageTitle, $PageTitle, $ParentPageTitle, $SiteTitle, $SpaceKey, $SpaceKeyName, $TitleTxt, $Wikilink, $FileExtension, $path0, $path1, $path2, $Path_basename, $MainText, $Email, $EmailDomain, $Phone, $Ontology3, $Ontology3URI, $Ontology3ReferableURI, $Ontology3MatchText, $Person, $Organization, $WorkOfArt, $Date, $Law, $Product, $Location);
            }
            $solr->commit();
            fclose($handle);
        }
    }
    ?>
</body>
</html>

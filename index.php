<?php
    $configs = include('config/config.php');
    set_include_path(get_include_path() . PATH_SEPARATOR . "Admin/Model/");
    spl_autoload_extensions(".php"); // phần mở rộng
    spl_autoload_register();
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="public/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?php echo $configs['title'] ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="public/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="public/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="public/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="public/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="public/assets/js/config.js"></script>
    
    <link
      rel="stylesheet"
      href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css"
    />
    
    <!-- Link JS Libary -->
    
    <link rel="stylesheet" href="node_modules/datatables.net-jqui/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="public/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="public/assets/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="public/assets/css/datatables.min.css"/>
    <!-- <link rel="stylesheet" href="node_modules/datatables.net-buttons-dt/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" href="node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="public/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="public/assets/css/dataTables.bootstrap5.min.css">
    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="public/assets/js/datatables.min.js" defer></script>
    <script src="node_modules/datatables.net/js/jquery.dataTables.js" defer></script>
    <script src="node_modules/datatables.net-jqui/js/dataTables.jqueryui.js" defer></script>
    <script src="node_modules/datatables.net-buttons-dt/js/buttons.dataTables.min.js" defer></script>
    <script src="node_modules/datatables.net-buttons/js/dataTables.buttons.min.js" defer></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.html5.min.js" defer></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.print.min.js" defer></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.colVis.min.js" defer></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.flash.min.js" defer></script>
    <script src="node_modules/pdfmake/build/pdfmake.min.js" defer></script>
    <script src="node_modules/pdfmake/build/vfs_fonts.js" defer></script>
    <script src="node_modules/jszip/dist/jszip.min.js" defer></script>
    <script src="public/assets/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="public/assets/js/buttons.bootstrap5.min.js" defer></script>
    
    <!-- Tiny MCE -->
    <script src="https://cdn.tiny.cloud/1/lr1kmk05jpis1aldhamlyue1fk0s8utdunsv7wjlmac1dzk5/tinymce/6/tinymce.min.js" referrerpolicy="origin" defer></script>
    
    <link rel="stylesheet" href="public/assets/css/style.css">
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'Admin/View/menu.php' ?>
        <!-- / Menu -->
        <?php
            $ctrl = 'home';
            if(isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            include 'Admin/Controller/'. $ctrl. '.php';
        ?>
        <!-- Layout container -->
        
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    
    <!-- Core JS -->
    <!-- build:public assets/vendor/js/core.js -->
    <script src="public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="public/assets/vendor/libs/popper/popper.js"></script>
    <script src="public/assets/vendor/js/bootstrap.js"></script>
    <script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="public/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="public/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    
    <!-- Toats JS -->
    <script src="public/assets/js/ui-toasts.js"></script>

    <!-- Main JS -->
    <script src="public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="public/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

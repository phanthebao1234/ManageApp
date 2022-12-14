<?php 
    $action = "product";
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    
    switch($action) {
        case 'product':
            include 'Admin/View/product/product.php';
            break;
        case 'insert':
            include 'Admin/View/product/editProduct.php';
            break;
        case 'update':
            include 'Admin/View/product/editProduct.php';
            break;
        case 'remove':
            if(isset($_GET['id']) && $_GET['id'] !== '') {
                $product = new Product();
                $product -> temporaryDelete($_GET['id']);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
                echo '<script>alert("Xóa thành công")</script>!';
            }
        default:
            include 'Admin/View/product/product.php';
            break;
    }
?>
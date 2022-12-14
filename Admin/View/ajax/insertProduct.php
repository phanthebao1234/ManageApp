<?php
    include '../../Model/connect.php';
    include '../../Model/product.php';
    
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $product_inventory = isset($_POST['product_inventory']) ? $_POST['product_inventory'] : "";
    $product_unit_id = isset($_POST['product_unit_id']) ? $_POST['product_unit_id'] : "";
    $product_price = isset($_POST['product_price']) ? $_POST ['product_price'] : "";
    $product_category_id = isset($_POST['product_category_id']) ? $_POST ['product_category_id'] : "";
    $product_trademark_id = isset($_POST['product_trademark_id']) ? $_POST ['product_trademark_id'] : "";
    $product_thumbnail = isset($_POST['product_thumbnail']) ? $_POST ['product_thumbnail'] : "";
    $product_gallery = isset($_POST['product_gallery']) ? $_POST['product_gallery'] : "";
    
    if (empty($product_name) || empty($product_description) || empty($product_price) ) {
        echo '<script>console.log("err3")</script>';
        echo '<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin</div>';
    } else {
        $product = new Product();
        if ($action == 'insert') {
            try {
                $product -> insertProduct($product_name,
                $product_description,
                $product_inventory,
                $product_unit_id,
                $product_price,
                $product_category_id,
                $product_trademark_id,
                $product_thumbnail,
                $product_gallery);
                if ($product) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
                    echo '<script>alert("Thêm thành công")</script>!';
                }
            } catch (\Throwable $th) {
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
                echo '<script>alert("Thêm không thành công")</script>!';
                echo '<script>console.log('.$th.')</script>';
            }
        } else if($action == 'update') {
            try {
                $product -> updateProduct($product_id, 
                $product_name,
                $product_description,
                $product_inventory,
                $product_unit_id,
                $product_price,
                $product_category_id,
                $product_trademark_id,
                $product_thumbnail,
                $product_gallery);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
                echo '<script>alert("Cập nhật thành công")</script>!';
            } catch (\Throwable $th) {
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
                echo '<script>alert("Cập nhật không thành công")</script>!';
                echo '<script>console.log('.$th.')</script>';
            }
            
        }
    }
?>
<?php
    include '../../Model/connect.php';
    include '../../Model/product.php';
    
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $product_inventory = isset($_POST['product_inventory']) ? $_POST['product_inventory'] : "";
    $product_unit_id = isset($_POST['product_unit_id']) ? $_POST['product_unit_id'] : "";
    $product_price = isset($_POST['product_price']) ? $_POST ['product_price'] : "";
    $product_category_id = isset($_POST['product_category_id']) ? $_POST ['product_category_id'] : "";
    $product_trademark_id = isset($_POST['product_trademark_id']) ? $_POST ['product_trademark_id'] : "";
    $product_thumbnail = isset($_POST['product_thumbnail']) ? $_POST ['product_thumbnail'] : "";
    $product_gallery = isset($_POST['product_gallery']) ? $_POST['product_gallery'] : "";
    
    if (empty($product_name) || empty($product_description) || empty($product_inventory) || empty($product_unit_id) || empty($product_price) || empty($product_category_id) || empty($product_trademark_id) || empty($product_thumbnail) || empty($product_gallery)) {
        echo '<script>console.log("err3")</script>';
        echo '<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin</div>';
    } else {
        $product = new Product();
        $product -> updateProduct($product_name,
        $product_description,
        $product_inventory,
        $product_unit_id,
        $product_price,
        $product_category_id,
        $product_trademark_id,
        $product_thumbnail,
        $product_gallery);
        if ($product) {
            
        }
    }
?>
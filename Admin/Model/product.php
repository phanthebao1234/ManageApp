<?php

/**
 * Product
 * Đối tượng sản phẩm
 */
class Product
{
    public function __construct()
    {}

    // Lấy tất cả sản phẩm
    public function getListProducts()
    {
        $db = new connect();
        $query = "select * from products";
        $results = $db->getList($query);
        return $results;
    }
    
    // Lấy tất cả sản phẩm Active
    public function getListProductActive() {
        $db = new connect();
        $query = "select * from product where product_status = 1";
        $results = $db->getList($query);
        return $results;
    }

    // Lấy sản phẩm chi tiết
    public function getDetailProducts($id)
    {
        $db = new connect();
        $query = "select * from products where product_id = $id";
        $results = $db->getInstance($query);
        return $results;
    }
    // Lấy giới hạn sản phẩm
    public function getLimitProduct($limit)
    {
        $db = new connect();
        $query = "select * from products limit = $limit";
        $results = $db->getList($query);
        return $results;
    }
    // Thêm sản phẩm
    public function insertProduct($product_name = "", $product_description = "", $product_inventory = "", $product_unit_id = "", $product_price = "", $product_category_id = "", $product_trademark_id = "", $product_thumbnail = "", $product_gallery = "")
    {
        $db = new connect();
        $query = "insert into products
        (`product_name`, `product_description`, `product_inventory`, `product_unit_id`, `product_price`, `product_category_id`, `product_trademark_id`, `product_thumbnail`, `product_gallery`) 
        values 
        ('$product_name', '$product_description', '$product_inventory', '$product_unit_id', '$product_price', '$product_category_id', '$product_trademark_id', '$product_thumbnail', '$product_gallery');";
        $db->exec($query);
    }
    // Cập nhật sản phẩm
    public function updateProduct($product_id ,$product_name = "", $product_description = "", $product_inventory = "", $product_unit_id = "", $product_price = "", $product_category_id = "", $product_trademark_id = "", $product_thumbnail = "", $product_gallery = "") {
        $db = new connect();
        $query = "update products set
        product_name='$product_name',
        product_description='$product_description',
        product_inventory='$product_inventory',
        product_unit_id='$product_unit_id',
        product_price='$product_price',
        product_category_id='$product_category_id',
        product_trademark_id='$product_trademark_id',
        product_thumbnail='$product_thumbnail',
        product_gallery='$product_gallery'
        where product_id = $product_id";
        $db -> exec($query);
    }
    
    // Xóa tạm thời sản phẩm
    public function temporaryDelete($product_id) {
        $db = new connect();
        $query = "update products set product_status = 0 where product_id = $product_id";
        $db -> exec($query);
    }
    
    // Khôi phục
    public function restoreProduct($product_id) {
        $db = new connect();
        $query = "update products set product_status = 1 where product_id = $product_id";
        $db -> exec($query);
    }
    
    // Xóa vĩnh viễn
    public function permanentlyDelete($product_id) {
        $db = new connect();
        $query = "delete from products where product_id = $product_id";
        $db -> exec($query);
    }

}

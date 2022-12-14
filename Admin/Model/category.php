<?php
    class Category {
        public function __construct() {}
        
        public function getListCategory() {
            $db = new connect();
            $query = "select * from category";
            $results = $db->getList($query);
            return $results;
        }
        
        public function getDetailCategory($category_id) {
            if ($category_id) {
                $db = new connect();
                $query = "select * from categogy where category_id = $category_id";
                $results = $db -> getInstance($query);
                return $results;
            } else {
                echo '<script>alert("Thiếu id danh mục")</script>';
            }
        }
    }
?>
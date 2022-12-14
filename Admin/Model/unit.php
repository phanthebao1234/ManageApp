<?php
        
    /**
     * Unit
     * Đối tượng đơn vị
     */
    class Unit {
        public function __construct() {}
        
        public function getListUnit() {
            $db = new connect();
            $query = "select * from unit";
            $results = $db->getList($query);
            return $results;
        }
        
        public function getDetailUnit($product_unit_id) {
            $db = new connect();
            $query = "select unit_name from unit where unit_id = $product_unit_id";
            $results = $db -> getInstance($query);
            return $results;
        }
    }

?>
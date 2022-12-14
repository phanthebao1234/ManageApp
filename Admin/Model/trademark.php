<?php
    class Trademark {
        public function __construct() {}
        
        public function getListTradeMark() {
            $db = new connect();
            $query = "select * from trademark";
            $results = $db->getList($query);
            return $results;
        }
        
        public function getDetailTradeMark($trademark_id) {
            $db = new connect();
            $query = "select * from trademark where trademark_id = $trademark_id";
            $results = $db -> getInstance($query);
            return $results;
        }
    }
?>
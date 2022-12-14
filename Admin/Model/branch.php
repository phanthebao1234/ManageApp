<?php 
        
    /**
     * Branch
     * Nhóm đối tượng chi nhánh
     */
    class Branch {
        public function __construct() {}
                
        /**
         * getListBranch
         * Trả về danh sách các chi nhánh
         * @return void
         */
        public function getListBranch() {
            $db = new connect();
            $query = "SELECT * FROM branch";
            $results = $db->getList($query);
            return $results;
        }
                
        /**
         * getDetailBranchWithId
         * Trả về thông tin chi nhánh cụ thể qua id
         * @param  mixed $id
         * @return void
         */
        public function getDetailBranchWithId($id) {
            $db = new connect();
            $query = "SELECT * FROM branch WHERE branch_id = $id";
            $results = $db-> getInstance($query);
            return $results;
        }
        
        
    }
?>
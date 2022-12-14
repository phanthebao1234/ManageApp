<?php 
    
    /**
     * User
     * Đối tượng người dùng
     */
    class User {
        public function __construct() {}
        
        public function getListUsers() {
            $db = new connect();
            $query = "SELECT * FROM users";
            $results = $db->query($query);
            return $results;
        }
        
        public function getListUsersWithBranch($branch_id) {
            $db = new connect();
            $query = "SELECT * FROM users WHERE branch_id = $branch_id";
            $results = $db->query($query);
            return $results;
        }
        
        public function getListUsersNoBanned() {
            $db = new connect();
            $query = "SELECT * FROM users WHERE user_status = 1";
            $results = $db->query($query);
            return $results;
        }
        
        public function insertUser($user_id ,$user_firstname=null, $user_lastname=null, $user_birthday=null, $user_render=1,
        $user_address_id=null, $user_address_number=null, $user_phone, $user_email=null, $user_password=null, $user_verify_code=null,
        $user_verify_status=0, $user_status = 0, $user_roll_id = null, $user_startday, $user_outday= null,$user_branch_id=null) {
            $db = new connect();
            $query = "insert into users (
                user_id,
                user_firstname,
                user_lastname,
                user_birthday,
                user_render,
                user_address_id,
                user_address_number,
                user_phone,
                user_email,
                user_password,
                user_verify_code,
                user_verify_status,
                user_status,
                user_roll_id,
                user_startday,
                user_outday,
                user_branch_id)
            values (
                $user_id,
                $user_firstname,
                $user_lastname,
                $user_birthday,
                $user_render,
                $user_address_id,
                $user_address_number,
                $user_phone,
                $user_email,
                $user_password,
                $user_verify_code,
                $user_verify_status,
                $user_status,
                $user_roll_id,
                $user_startday,
                $user_outday,
                $user_branch_id
            )";
            $db -> exec($query);
        }
        
    }
?>
<?php

/**
 * Roles
 * Đối tượng phân quyền
 */
class Roles {
    public function __construct() {}
    
    public function getListRoles() {
        $db = new connect();
        $query = "SELECT * FROM roles";
        $results = $db->query($query);
        return $results;
    }
    
    
}
?>
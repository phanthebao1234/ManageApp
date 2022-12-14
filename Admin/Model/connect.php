<?php
class connect
{

    public $db = null;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=manager';
        $user = 'root';
        $pass = '';
        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //    Lấy nhiều rows
    public function getList($select)
    {
        $results = $this->db->query($select);
        return ($results);
    }

    public function exec($query)
    {
        $results = $this->db->exec($query);
        return ($results);
    }
    public function getInstance($query)
    {
        $results = $this->db->query($query);
        $result = $results->fetch();
        return $result;
    }
    
}

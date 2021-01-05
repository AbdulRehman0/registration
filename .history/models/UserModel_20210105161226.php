<?php 
Class User{
    private $db;
    private $lastID;
    public function __construct($db){
        $this->db = $db;
    }

    public function getAllUsers(){

    }
    public function insertUser($data){

    }
    public function getUserByID($id){}
    public function getUserByEmail($email){
        return $this->db->where('email',$email)->get("users");
    }
    public function deleteUserByID($id){}
    public function updateUserByID($data){}


}

?>
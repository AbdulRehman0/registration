<?php 
Class User{
    private $db;
    private $lastID;
    public function __construct($db){
        $this->db = $db;
    }

    public function getAllUsers(){
        return $this->db->get("users");

    }
    public function insertUser($data){
        $insertData=array(
            "name"=>$data["name"],
            "email"=>$data["email"],
            "role_id"=>$data["role_id"],
            "password"=>$data["password"]
        );
        return $this->db->insert("users",$insertData);

    }
    public function getUserByID($id){}
    public function getUserByEmail($email){
        $query = "select * from users where email=?";
        $params=array($email);
        return $this->db->rawQuery($query,$params);
    }
    public function deleteUserByID($id){}
    public function updateUserByID($data){}


}

?>
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
            "password"=>$data["password"],
            "phone"=>$data["phone"]
        );
        return $this->db->insert("users",$insertData);

    }
    public function getUserByID($id){
        return $this->db->where->("id",$id)get("users");
    }
    public function getUserByEmail($email){
        $query = "select * from users where email=?";
        $params=array($email);
        return $this->db->rawQuery($query,$params);
    }
    public function deleteUserByID($id){
        return $this->db->where("id",$id)->delete("users");
        
    }
    public function updateUserByID($data,$id){
        return $this->db->where("id",$id)->update("users",$data);
    }


}

?>
<?php

class Task
{

    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTasks(){

        $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC');
        $this->db->bind(':user_id' , $_SESSION['user_id']);

        return $this->db->resultSet();
    }




public function addTask($data){

    $this->db->query('INSERT INTO tasks (description , deadline, user_id) VALUE (:description , :deadline, :user_id )');

    $this->db->bind(':user_id' ,$data['user_id']);
    $this->db->bind(':description' ,$data['description']);
    $this->db->bind(':deadline' ,$data['deadline']);

    if($this->db->execute()){
        return true ;
    }else{
        return false; 
    }
}

    public function addMultipTask($data){
        
        $this->db->query('INSERT INTO tasks (description , deadline, user_id) VALUE (:description , :deadline, :user_id )');

        $this->db->bind(':user_id' ,$data['user_id']);
        $this->db->bind(':description' ,$data['description']);
        $this->db->bind(':deadline' ,$data['deadline']);
    
        if($this->db->execute()){
            return true ;
        }else{
            return false; 
        }

    }



    public function delete($id)
    {
        $this->db->query('DELETE FROM `tasks` WHERE id =:id');
        //bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function updateTask($data)
    {
        $this->db->query('UPDATE `tasks` SET  `status`=:status,`description`=:description,`deadline`=:deadline WHERE id = :id');
        //bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':deadline', $data['deadline']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




}

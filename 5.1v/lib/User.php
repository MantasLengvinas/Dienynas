<?php 

class User{
    private $db;
    private $role;

    public function __construct(){
        $this->db = new Database;
    }

    public function roleTitle($role){
        switch($role){
            case '0':
                return 'Mokinys';
            break;
            case '1':
                return 'Administratorius';
            break;   
            default:
                return 'undefined'; 
        }
    }

    public function Login($username, $password){

        try{
            $hashed_password = md5($password);

            $this->db->query("SELECT * FROM users WHERE username=:un AND password = :pass");
            $this->db->bind('un', $username);
            $this->db->bind('pass', $hashed_password);
            $this->db->execute();

            $count= $this->db->rowCount();
            $data = $this->db->getSingle();

            if ($count != 0 ){

                $_SESSION['username'] = $data->username;
                $_SESSION['firstname'] = $data->firstname;
                $_SESSION['lastname'] = $data->lastname;
                $_SESSION['school'] = $data->school;
                $this->role = $data->role;
                $_SESSION['role'] = $this->roleTitle($this->role);
                
                // This is how we'll know the user is logged in
                $_SESSION['logged_in'] = true;
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function checkAdmin(){
        if($this->role == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllMarks(){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username ORDER BY uploaded DESC");
        $this->db->bind('username', $_SESSION['username']);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    }

    public function getAllSubjects(){
        $this->db->query("SELECT * FROM subjects WHERE student_username=:username");
        $this->db->bind('username', $_SESSION['username']);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    }    
}
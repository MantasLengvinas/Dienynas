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

    public function Logout(){
        session_unset();
        session_destroy();

        header("Location: ../Prisijungimas/Login?logout=true");
    }

    public function checkAdmin(){
        if($this->role == 1){
            return true;
        }
        else{
            return false;
        }
    }

    //User functions

    public function getAllMarks($username){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username ORDER BY uploaded DESC");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    }

    public function getAllSubjects($username){
        $this->db->query("SELECT * FROM subjects WHERE student_username=:username");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    } 
    
    //Admin functions

    public function getAllUsers(){
        $this->db->query("SELECT * FROM users ORDER BY id DESC");
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    }

    public function getUserData($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $user = $this->db->getSingle();
        $marks = $this->getAllMarks($user->username);
        $subjects = $this->getAllSubjects($user->username);

        $data = array(
            $user, $marks, $subjects
        );

        return $data;
    }

    public function createUser($username, $firstname, $lastname, $email, $password, $school, $role){
        $this->db->query("INSERT INTO users (firstname, lastname, username, email, password, school, role) VALUES (:firstname, :lastname, :username, :email, :password, :school, :role)");
        $hashed_password = md5($password);
        $this->db->bind("firstname", $firstname);
        $this->db->bind("lastname", $lastname);
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->bind("password", $hashed_password);
        $this->db->bind("school", $school);
        $this->db->bind("role", $role);
        $this->db->execute();

        return 'Vartotojas sėkmingai sukurtas!';
    }

    public function deleteUser($id){
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return 'Vartotojas sėkmingai ištrintas';
    }
}
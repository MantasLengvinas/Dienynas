<?php 

class User{
    private $db; //db class
    private $m; //mark class
    private $s; //subject class
    private $role;

    public function __construct(){
        $this->db = new Database;
        $this->m = new Mark;
        $this->s = new Subject;
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

    public function userExist($username){
        $this->db->query("SELECT username FROM users WHERE username=:un");
        $this->db->bind('un', $username);
        $this->db->execute();

        $count = $this->db->rowCount();
        if($count > 0){
            return true;
        }
        else{
            return false;
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
    
    //Admin functions

    public function getAllUsers(){
        $this->db->query("SELECT * FROM users ORDER BY id DESC");
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function getStudents(){
        $this->db->query("SELECT * FROM users WHERE role = :role ORDER BY id ASC");
        $this->db->bind('role', 0);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function getUserData($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $user = $this->db->getSingle();
        $marks = $this->m->getAllMarks($user->username);
        $subjects = $this->s->getAllSubjects($user->username);

        $data = array(
            $user, $marks, $subjects
        );

        return $data;
    }

    public function createUser($username, $firstname, $lastname, $email, $password, $school, $role){
        try{
            $this->db->query("INSERT INTO users (firstname, lastname, username, email, password, school, role) VALUES (:firstname, :lastname, :username, :email, :password, :school, :role)");
            $hashed_password = md5($password);
            if(!$this->userExist($username)){
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
            else{
                return 'Šis vartotojo vardas jau naudojamas!';
            }
        }
        catch(PDOException $e){
            return $e;
        }
    }

    public function deleteUser($username){
        $this->db->query("DELETE FROM users WHERE username = :username");
        $this->db->bind('username', $username);
        $this->db->execute();
        $this->m->deleteMarks($username);
        $this->s->deleteSubjects($username);

        return 'Vartotojas sėkmingai ištrintas';
    }
}
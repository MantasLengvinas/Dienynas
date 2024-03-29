<?php 

// 	

class User{
    private $db; //db class
    private $m; //mark class
    private $s; //subject class
    private $session;
    private $role;

    public function __construct(){
        $this->db = new Database;
        $this->m = new Mark;
        $this->s = new Subject;
        $this->session = new Session;
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

    public function roleShort($role){
        switch($role){
            case '0':
                return 'mok';
            break;
            case '1':
                return 'admin';
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
        
        return 0;
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
                $_SESSION['ri'] = $this->roleShort($this->role);
                
                $_SESSION['logged_in'] = true;
                $ip = $this->session->getIP();
                $mac = $this->session->getMac();
                $this->session->saveSession($username, $ip, $mac);
                $this->session->deleteSessions();
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
        
        return false;
    }
    
    //Admin functions

    public function getAllUsers(){

        $this->db->query("SELECT * FROM users ORDER BY id DESC");
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function searchUser($input){
        $this->db->query("SELECT * FROM users WHERE username LIKE '%$input%' OR firstname LIKE '%$input%' OR lastname LIKE '%$input%' ORDER BY id DESC");
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

    public function getUserByUsername($username){
        $this->db->query("SELECT * FROM users WHERE username = :uname");
        $this->db->bind('uname', $username);
        $this->db->execute();

        $data = $this->db->getSingle();

        return $data;
    }

    public function createUser($username, $firstname, $lastname, $email, $password, $school, $role){

        $log = "../log.txt";
        $actionTime = date('Y-m-d H:i:s');
        $logMsg = "[USER_CREATED] <b>".$username."</b> created by <b>".$_SESSION['username']."</b> at: <i>".$actionTime."</i>\n";      
        file_put_contents($log, $logMsg, FILE_APPEND | LOCK_EX);

        try{
            $this->db->query("INSERT INTO users (firstname, lastname, username, email, password, school, role) VALUES (:firstname, :lastname, :username, :email, :password, :school, :role)");
            $hashed_password = md5($password);
            
            $this->db->bind("firstname", $firstname);
            $this->db->bind("lastname", $lastname);
            $this->db->bind("username", $username);
            $this->db->bind("email", $email);
            $this->db->bind("password", $hashed_password);
            $this->db->bind("school", $school);
            $this->db->bind("role", $role);

            if($this->db->execute()){
                return true;
            }

        }
        catch(PDOException $e){
            return false;
        }
    }

    public function deleteUser($username){

        $log = "../log.txt";
        $actionTime = date('Y-m-d H:i:s');
        $logMsg = "[USER_DELETED] <b>".$username."</b> by <b>".$_SESSION['username']."</b> at: <i>".$actionTime."</i>\n";      
        file_put_contents($log, $logMsg, FILE_APPEND | LOCK_EX);

        $this->db->query("DELETE FROM users WHERE username = :username");
        $this->db->bind('username', $username);
        if($this->db->execute()){
            $this->m->deleteMarks($username);
            $this->s->deleteSubjects($username);
            return true;
        }

        return false;
    }
}
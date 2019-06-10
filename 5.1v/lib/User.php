<?php 

class User{
    private $db;
    private $err;
    private $stmt;

    public function __construct(){
        $this->db = new Database;
    }

    public function verify(){
        $username = $mysqli->escape_string($_POST['username']);
        $this->stmt = $this->db->query("SELECT username FROM users WHERE username='$username'");

        if ( $this->stmt->num_rows == 0 ){ // User doesn't exist
            $err = "User with that email doesn't exist!";
            return $err;
        }
        else{
            
            $user = $this->db->single();

            if ( password_verify($_POST['password'], $user['password']) ) {
        
                $_SESSION['username'] = $user['username'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['school'] = $user['school'];
                $_SESSION['role'] = $user['role'];
                
                // This is how we'll know the user is logged in
                $_SESSION['logged_in'] = true;
            }
            else {
                $err = "You have entered wrong password, try again!";
                return $err;
            }
        }
    }
}
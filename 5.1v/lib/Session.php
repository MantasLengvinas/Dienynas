<?php 

// file_get_contents();

class Session{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getIP(){
        $ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        return $ip;
    }

    public function getMac(){
        $d = explode('Physical Address. . . . . . . . .',shell_exec ("ipconfig/all"));  
        $d1 = explode(':',$d[1]);  
        $d2 = explode(' ',$d1[1]);  
        return $d2[1];
    }

    public function saveSession($username, $ip){

        $log = "../log.txt";
        $sessionTime = date('Y-m-d h:i:sa');
        $curr = date('Y-m-d');
        $date = date_create($curr);
        date_add($date, date_interval_create_from_date_string('7 days'));
        $delete = date_format($date, 'Y-m-d');
        $this->db->query("INSERT INTO sessions (username, ip, delete_at) VALUES (:username, :ip, :delete_at)");
        $this->db->bind('username', $username);
        $this->db->bind('ip', $ip);
        $this->db->bind('delete_at', $delete);
        $logMsg = "[SESSION_STARTED] IP: ".$ip." requested username: ".$username." request time: \n";
        
        file_put_contents($log, $logMsg, FILE_APPEND | LOCK_EX);
        $this->db->execute();
    }

    public function getSessions(){
        $this->db->query("SELECT * FROM sessions ORDER BY id DESC");

        $this->db->execute();

        $data = $this->db->getAll();
        return $data;
    }

    public function getSession($id){
        $this->db->query("SELECT * FROM sessions WHERE id=:id ORDER BY id DESC");
        $this->db->bind("id", $id);
        $this->db->execute();

        $data = $this->db->getSingle();
        return $data;
    }

    public function deleteSessions(){
        $sessions = $this->getSessions();
        $curr = date('Y-m-d');

        foreach($sessions as $session){
            if($curr >= $session->delete_at){
                $this->db->query("DELETE FROM sessions WHERE id=:id");
                $this->db->bind("id", $session->id);
                $this->db->execute();
            }
        }
    }
}
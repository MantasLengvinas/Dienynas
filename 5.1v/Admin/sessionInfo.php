<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/sessioninfo.php');
    $session = new Session;
    $u = new User;

    $apikey = '9d5ff06b30c75b12a4baf0fbdf0b1304';
    $sessionID = $_GET['id'];

    $template->selected = $session->getSession($sessionID);
    $template->user = $u->getUserByUsername($template->selected->username);
    $roleid = $template->user->role;
    $template->role = $u->roleTitle($roleid);
    $ch = curl_init('http://api.ipapi.com/'.$template->selected->ip.'?access_key='.$apikey.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($ch);
    $template->data = json_decode($json);
    print_r($template->data);
    
    echo $template;

?>


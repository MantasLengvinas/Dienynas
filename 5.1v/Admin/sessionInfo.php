<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/sessioninfo.php');
    $session = new Session;
    $u = new User;

    $apikey = 'f1cd85b353451f17d5d642c0cd336825';
    $sessionID = $_GET['id'];

    $template->selected = $session->getSession($sessionID);
    $template->user = $u->getUserByUsername($template->selected->username);
    $roleid = $template->user->role;
    $template->role = $u->roleTitle($roleid);
    $template->data = json_decode(file_get_contents('http://api.ipstack.com/'.$template->selected->ip.'?access_key='.$apikey));


    echo $template;

?>


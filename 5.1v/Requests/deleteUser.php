<?php include_once '../config/init.php'; ?>

<?php 
    $id = $_POST['id'];
    $user = new User();

    $status = $user->deleteUser($id);

    $r = new RNotify;

    $r->title = "Vartotojas";
    $r->status = $status;

    if($status){
        $r->content = "Paskyra sėkmingai pašalinta";
    }
    else{
        $r->content = "Klaida. Paskyra nepašalinta";
    }
    
    $response = json_encode($r);

    echo $response;
?>
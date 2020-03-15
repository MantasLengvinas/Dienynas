<?php include_once '../config/init.php'; ?>

<?php 

    $m = new Mark;

    $username = $_POST['username'];
    $id = $_POST['id'];

    $status = $m->deleteOneMark($username, $id);

    $r = new RNotify;

    $r->title = "Pažymys";
    $r->status = $status;

    if($status){
        $r->content = "Pažymys sėkmingai ištrintas";
    }
    else{
        $r->content = "Klaida. Pažymys neištrintas";
    }

    $response = json_encode($r);

    echo $response;

?>
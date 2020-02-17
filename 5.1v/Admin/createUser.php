<?php include_once '../config/init.php'; ?>

<?php 

    $user = new User;

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $school = $_POST['school']; 
    $role = $_POST['role'];

    $status = $user->createUser($username, $firstname, $lastname, $email, $password, $school, $role);

    $r = new RNotify;

    $r->title = "Vartotojas";
    $r->status = $status;

    if($status){
        $r->content = "Paskyra sėkmingai sukurta (".$username.")";
    }
    else{
        $r->content = "Klaida. Paskyra nesukurta";
    }
    
    $response = json_encode($r);

    echo $response;

?>
<?php include_once '../config/init.php'; ?>

<?php 

    $user = new User();

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $school = $_POST['school']; 
    $role = $_POST['role'];

    $response = $user->createUser($username, $firstname, $lastname, $email, $password, $school, $role);

    echo $response;

?>
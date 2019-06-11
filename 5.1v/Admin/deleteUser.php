<?php include_once '../config/init.php'; ?>

<?php 
    $id = $_POST['id'];
    $user = new User();

    $response = $user->deleteUser($id);

    echo $response;
?>
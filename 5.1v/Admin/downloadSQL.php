<?php include_once '../config/init.php'; ?>
<?php
    $db = $_POST['database']; 
    $file = '../_db_backup/'.$db;

    // if(file_exists($file)) {
    //     header('Content-Description: File Transfer');
    //     header('Content-Type: application/octet-stream');
    //     header('Content-Disposition: attachment; filename="'.basename($file).'"');
    //     header('Expires: 0');
    //     header('Pragma: public');
    //     header('Content-Length: ' . filesize($file));
    //     // Clear output buffer
    //     flush();
    //     readfile($file);
    //     exit();
    // }else{
    //   echo "File not found.";
    // }

    $status = false;

    $r = new RNotify;

    $r->title = "Duomenų bazė";
    $r->status = $status;

    if($status){
        $r->content = "Duomenų bazė atsiunčiama (".$db.")";
    }
    else{
        $r->content = "Klaida. Duomenų bazės atsiųsti nepavyko";
    }
    
    $response = json_encode($r);

    echo $response;
?>


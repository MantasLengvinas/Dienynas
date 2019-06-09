
<?php 
    class Filter{
        public $type = "";
        public $input = "";
    }

    $type = $_GET['filter_type'];
    $input = $_GET['filter_input'];

    $filterArr = [];

    if($type == 'filter_none'){
        $type = 0;
    }
    if($input == ""){
        $input = 0;
    }

    $f = new Filter();
    $f->type = $type;
    $f->input = $input;

    array_push($filterArr, $f);

    $json = json_encode($filterArr);

    echo($json);
?>
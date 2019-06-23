<?php include_once '../config/init.php'; ?>

<?php 

    class PeriodAvg{
        public $subject = "";
        public $avg = "";
    }

    $template = new Template('../templates/admin/periodData.php');
    $m = new Mark;
    $s = new Subject;
    $p = new Period;
    $avgs = array();

    $username = $_GET['uid'];

    $template->subjects = $s->getSubjectNames($username);
    foreach($template->subjects as $subject){
        // $a = new PeriodAvg;
        // $a->subject = $subject;
        // $a->avg = $p->getAvg($username, $subject);
        $a = $p->getAvg($username, $subject);
        array_push($avgs, $a);
    }
    $template->avgs = $avgs;
    $template->marks = $m->getAllMarks($username);
    $template->markTypes = $m->markTypes;

    echo $template;

?>
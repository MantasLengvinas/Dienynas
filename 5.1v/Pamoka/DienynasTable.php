<?php include_once '../config/init.php'; ?>

<?php 

$m = new Mark;
$s = new Subject;
$template = new Template('../templates/user/Pamoka/DienynasTable.php');

$metai = $_POST['metai'];
$menuo = $_POST['menuo'];
$metai = (int)$metai;
$menuo = (int)$menuo;
$info = $_POST['info'];

$timeinfo = getdate();
extract($timeinfo);
$today = $mday;
$thisMonth = $mon;

$daysNumber = cal_days_in_month(CAL_GREGORIAN, $menuo, $metai);

$monthString = $menuo;

if(strlen($monthString) == 1){
    $monthString = '0'.$monthString;
}

$date = date_create($monthString.'/01'.'/'.$metai);
$unix_time = date_format($date, 'U');

$startinfo = getdate($unix_time);
extract($startinfo);
$startDay = $wday;
$monthName = $info[1];
$dayName = $info[0];

$marks = $m->getMonthMarks($_SESSION['username'], $menuo, $metai);
$subjects = $s->getSubjectNames($_SESSION['username']);

$template->monthName = $monthName[$menuo];
$template->dayName = $dayName;
$template->menuo = $menuo;
$template->metai = $metai;
$template->startDay = $startDay;
$template->daysNumber = $daysNumber;
$template->today = $today;
$template->thisMonth = $thisMonth;
$template->marks = $marks;
$template->subjects = $subjects;

echo $template;
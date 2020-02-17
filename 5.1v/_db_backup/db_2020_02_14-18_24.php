<?php
$xmlstr = "<?xml version=\"1.0\" standalone=\"yes\"?>";
$xmlstr .= "<movies>\n<movie>Behind the Parser</movie>\n</movies>\n";
header('Content-type: text/xml; charset=utf-8');
echo $xmlstr;
?> 
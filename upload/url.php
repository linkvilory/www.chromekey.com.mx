<?php
include('phpqrcode/qrlib.php');
// outputs image directly into browser, as PNG stream
$pngAbsoluteFilePath = "bla.png"; 
QRcode::png('http://archertroy.com', $pngAbsoluteFilePath);
?>
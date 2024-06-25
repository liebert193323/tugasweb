<?php

use Dompdf\Dompdf;

require "vendor/autoload.php";

$dompdf = new Dompdf();
$html = "<h1>Hi</h1>";
$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("output.pdf");
?>

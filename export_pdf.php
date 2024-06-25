<?php
require 'vendor/autoload.php';

use TCPDF;

session_start();

if (!empty($_SESSION['data'])) {
    $pdf = new TCPDF();
    $pdf->AddPage();

    $html = '<h2>Data yang Dimasukkan</h2>
             <table border="1" cellpadding="4">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>';

    foreach ($_SESSION['data'] as $data) {
        $html .= '<tr>
                    <td>' . $data['name'] . '</td>
                    <td>' . $data['email'] . '</td>
                  </tr>';
    }
    $html .= '</table>';

    $pdf->writeHTML($html);
    $fileName = 'data.pdf';

    $pdf->Output($fileName, 'D');
    exit;
} else {
    echo "Tidak ada data untuk diekspor.";
}
?>

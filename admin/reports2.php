<?php

include '../connection.php';
require_once '../vendor/autoload.php';
$data="select * from students where library==='' ";
$datarun = mysqli_query($conn, $data);
$rows = mysqli_fetch_all($datarun, MYSQLI_ASSOC);


use Dompdf\Dompdf;

$html = '<h2>List Of Graduating Students</h2>';
$html .= '<p style="font-size: 20px;color:blue; text-space: 1.5;">The following students managed to satisfied the boad of examiners and are the ones to graduate this yea.Thanks for their hardwork and resilience they put when they were studying.</p>';

$html .= '<table style="border:2px solid blue;border-collapse: collapse;">   
            <style>
            th,td{
            border: 2px solid blue;
            border-collapse: collapse;
            }
            
</style>         
            <thead  style="border: 2px solid grey">
            <tr>
                <th>Name</th>
                <th>RegNo</th>
                <th>School</th>
                <th>Course</th>
            </tr>
            
           </thead>';

foreach ($rows as $row) {
    $html .= '<tr>
            <td>' . $row['name'] . '</td>
            <td>' . $row['regno'] . '</td>
            <td>' . $row['school'] . '</td>
            <td>' . $row['course'] . '</td>
</tr>';
}
$html .= '</table>';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('clearedstudents.pdf', array('Attachment' => 0));


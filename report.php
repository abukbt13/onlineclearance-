<?php
// reference the Dompdf namespace
include 'connection.php';
require_once 'vendor/autoload.php';
$data="select * from students";
$datarun=mysqli_query($conn,$data);
$rows=mysqli_fetch_all($datarun,MYSQLI_ASSOC);





use Dompdf\Dompdf;
$html='<h2>List Of Graduating Students</h2>';
$html .='<p style="font-size: 20px;color:blue; text-space: 1.5;">The following students managed to satisfied the boad of examiners and are the ones to graduate this yea.Thanks for their hardwork and resilience they put when they were studying.</p>';

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
                <th>Year Joined</th>
            </tr>
            
           </thead>';

foreach ($rows as $row){
    $html .='<tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['school'].'</td>
            <td>'.$row['course'].'</td>
            <td>'.$row['regno'].'</td>
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
$dompdf->stream('test.pdf', array('Attachment' => 0));

<?php
if(isset($_POST['response'])) {
    $regno=$_POST['regno'];
    $category=$_POST['category'];

}
?>
<div style="display: block; border: solid;align-items: center; justify-content: center; display: grid;" id="process" class="respond">
    <form action="">
        <label for="">Reg No</label>
        <p><?php echo $regno;?></p>
        <label for="">Category</label>
        <p><?php echo $category;?></p>
        <textarea name="respond" id="" cols="40" rows="5" class="form-control"></textarea>
        <button class="btn btn-info w-100 m-2">Process</button>
    </form>
</div>
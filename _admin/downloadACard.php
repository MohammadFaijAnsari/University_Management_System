<?php
require("./plugins/fpdf/fpdf.php");
include_once("./includes/db_connect.php");
include("./includes/function.php");


$sql = "SELECT * FROM student WHERE st_id='$_REQUEST[id]'";
$rs = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($rs);

$pdf = new FPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('times', 'BU', 20);
$pdf->Cell(190, 7, "Download E-Admit Card", 0, 1, 'C');

$pdf->Ln();
$pdf->SetFont('times', 'B', 15);
$pdf->Cell(40, 7, "ID : ", 0, 0, 'L');
$pdf->Cell(20, 7, $data['st_id'], 0, 1, 'L');

$pdf->Cell(40, 7, "Name : ", 0, 0, 'L');
$pdf->Cell(20, 7, $data['st_name'], 0, 1, 'L');

$pdf->Cell(40, 7, "Father Name : ", 0, 0, 'L');
$pdf->Cell(20, 7, $data['st_fathername'], 0, 1, 'L');

$pdf->Cell(40, 7, "Gender : ", 0, 0, 'L');
$pdf->Cell(20, 7, $data['st_gen'], 0, 1, 'L');

$pdf->Cell(40, 7, "Date Of Birth : ", 0, 0, 'L');
$pdf->Cell(20, 7, $data['st_dob'], 0, 1, 'L');


$pdf->Cell(40, 7, "Course : ", 0, 0, 'L');
$pdf->Cell(20, 7, get_single_value('course', 'course_id', 'course_name', $data['st_course']), 0, 1, 'L');
$ext = explode(".",$data['st_image']);

$pdf->Image("uploads/" . $data['st_image'], 140, 20, 40, 45,$ext[count($ext)-1] );


$sql = "SELECT * FROM exam WHERE exam_course = '$data[st_course]'";
$rs = mysqli_query($con, $sql);
$count = 0;
$pdf->SetFont('times', 'B', 13);
$pdf->Ln();
// $pdf->Cell(30, 7, "Serial No", 1, 0, 'L');
$pdf->Cell(30, 7, "Exam Subject", 1, 0, 'L');
$pdf->Cell(55, 7, "Exam Shift", 1, 0, 'L');
$pdf->Cell(30, 7, "Exam Date", 1, 0, 'L');
$pdf->Cell(40, 7, "Exam Description", 1, 1, 'L');
$pdf->SetFont('times', 'B', 12);
while ($data = mysqli_fetch_assoc($rs)) {
    // $pdf->Cell(30, 7, ++$count, 1, 0, 'L');
    $pdf->Cell(30, 7, get_single_value('subtable', 'sub_id', 'sub_name', $data['exam_subject']), 1, 0, 'L');
    $pdf->Cell(55, 7, $data['exam_shift'], 1, 0, 'L');
    $pdf->Cell(30, 7, $data['exam_date'], 1, 0, 'L');
    $pdf->Cell(40, 7, $data['exam_decription'], 1, 1, 'L');
}
$pdf->Ln();
$pdf->Cell(300, 7, " 1. E-Admit Card Instructions.", 0, 1, 'L');

$pdf->Cell(300, 7, " 2. Please ensure all details are accurate before proceeding.)", 0, 1, 'L');

$pdf->Cell(300, 7, "3. Carry this admit card to the examination venue.", 0, 1, 'L');


$pdf->Cell(300, 7, "4. Verify your identity with a valid photo ID along with the admit card.", 0, 1, 'L');


$pdf->Cell(300, 7, "5. Arrive at the exam center at least 30 minutes before the start time.", 0, 1, 'L');
$pdf->Cell(300, 7, "6. Do not bring any prohibited items, such as electronic devices or study materials.", 0, 1, 'L');


$pdf->Cell(300, 7, "7. Follow all exam regulations and instructions given by the invigilators.", 0, 1, 'L');
$pdf->Cell(300, 7, "8. In case of discrepancies, contact the examination authority immediately.", 0, 1, 'L');

$pdf->Cell(300, 7, "9. Keep this admit card safe until the completion of your exams.", 0, 1, 'L');
$pdf->Cell(300, 7, "10. Best of luck!
", 0, 1, 'L');

$pdf->Output("I", "D");

?>
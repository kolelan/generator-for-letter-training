<?php
require_once('gridphp.php');

$pdf = new PDF_Grid();

/*
//Устанавливаем основные настройки прописи
*/
//[true|false]Включаем наклонную линию
if (isset($_POST['inclined_line']) &&
    $_POST['inclined_line'] == 'Yes') {
    $pdf->inclined = true;
} else {
    $pdf->inclined = false;
}
if (isset($_POST['border_line']) &&
    $_POST['border_line'] == 'Yes') {
    $pdf->border = true;
} else {
    $pdf->border = false;
}

$left = $_POST['margin_left'] ?? 5;
$top = $_POST['margin_top'] ?? 5;
$right = $_POST['margin_right'] ?? 5;

$pdf->SetMargins($left, $top, $right);    //Устанавливаем отступы
$pdf->grid = 18;            //устанавливаем через какое расстояние нижняя линейка будет повторяться
$pdf->AddPage();


/*
//Устанавливаем настройки начертания букв(настраиваем шрифты)
*/

switch ($_POST['type_letter_propisi']) {
    case 0:        //серое начертание
        $pdf->AddFont('LearningCurve-Bold', '', 'learning_curve_bold_ot_tt.php');
        $pdf->SetFont('LearningCurve-Bold', '', 36);
        $pdf->SetTextColor(140, 140, 140);
        break;
    case 1:        //пунктирное начертание
        $pdf->AddFont('LearningCurve-dashed', '', 'learning_curve_dashed_ot_tt.php');
        $pdf->SetFont('LearningCurve-dashed', '', 36);
        $pdf->SetTextColor(0, 0, 0);
        break;
    default:
        $pdf->Write(18, "Упс, ошибка при выборе начертаний букв");
        break;
}
$text_propisi = mb_convert_encoding($_POST['data1'], "cp1252");
$pdf->Write(18, "$text_propisi");        //Вывод текста в виде прописи


$pdf->Output();

?>
<?php
if (isset($_POST['tableHTML'])) {
    $tableHTML = $_POST['tableHTML'];

    // Generate the PDF using a library like TCPDF or FPDF
    // Example using TCPDF:
    require_once('tcpdf/tcpdf.php');

    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Table Data');

    // Set default header data
    $pdf->SetHeaderData('', '', 'Table Data', '');

    // Set header and footer fonts
    $pdf->setHeaderFont(Array('helvetica', '', 12));
    $pdf->setFooterFont(Array('helvetica', '', 10));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont('courier');

    // Set margins
    $pdf->SetMargins(15, 15, 15);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(true, 15);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    // Add a page
    $pdf->AddPage();

    // Output the HTML table as PDF
    $pdf->writeHTML($tableHTML);

    // Output the PDF as a file download
    $pdf->Output('table_data.pdf', 'D');
}
?>

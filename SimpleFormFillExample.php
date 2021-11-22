<?php

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\FormField;

class SimpleFormFillExample
{
    private static string $BasePath = __DIR__;
 
    public static function RunExample()
    {
        $pdf = new Pdf();
        $pdf->AddPdf("samples/shared/pdf/simple-form-fill.pdf");
        $formField = new FormField("nameField", "DynamicPDF");
        $formField2 = new FormField("descriptionField", "DynamicPDF CloudAPI. RealTime PDFs, Real FAST!");
        array_push($pdf->FormFields, $formField);
        array_push($pdf->FormFields, $formField2);
        $response = $pdf->Process();
        file_put_contents(SimpleFormFillExample::$BasePath . "/output/simple-formfill-example-php-output.pdf", $response->Content);
    }
}
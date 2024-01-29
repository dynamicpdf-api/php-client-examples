<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\FormField;


class FormFlattenDelete
{
    public static function Run(string $apikey, string $path, string $outputPath)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $pdfInput = $pdf->AddPdf(new PdfResource($path . "fw9AcroForm_14.pdf"));

         //complete the values from the pdf
         $formField = new FormField("topmostSubform[0].Page1[0].f1_1[0]", "Any Company, Inc.");
         $formField->Flatten = true;

         $formField2 = new FormField("topmostSubform[0].Page1[0].f1_2[0]", "Any Company");
         $formField2->Remove = true;

         $formField3 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]", "1");
         $formField3->Flatten = true;

         $formField4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]", "123 Main Street");
         $formField5 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]", "Washington, DC  22222");
         $formField6 = new FormField("topmostSubform[0].Page1[0].f1_9[0]", "Any Requester");
         $formField7 = new FormField("topmostSubform[0].Page1[0].f1_10[0]", "17288825617");
         $formField8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]", "1234567");
         $formField9 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]", "1234567");
         $formField9->Remove = true;

         array_push($pdf->FormFields, $formField);
         array_push($pdf->FormFields, $formField2);
         array_push($pdf->FormFields, $formField3);
         array_push($pdf->FormFields, $formField4);
         array_push($pdf->FormFields, $formField5);
         array_push($pdf->FormFields, $formField6);
         array_push($pdf->FormFields, $formField7);
         array_push($pdf->FormFields, $formField8);
         array_push($pdf->FormFields, $formField9);

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($outputPath . "form-flatten-output.pdf", $response->Content);

        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
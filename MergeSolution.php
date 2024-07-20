<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\WordInput;
use DynamicPDF\Api\WordResource;
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\LayoutDataResource;
class MergeSolution
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $pdfInput = $pdf->AddPdf(new PdfResource($path . "/merge-pdfs-pdf-endpoint/DocumentA.pdf"));
        $pdfInput->StartPage = 1;
        $pdfInput->PageCount = 1;

        $pdf->AddPdf(new PdfResource($path . "/merge-pdfs-pdf-endpoint/DocumentB.pdf"));


        $wordResource = new WordResource($path . "/users-guide/Doc1.docx");
        $wordInput = new WordInput($wordResource);
        
        array_push($pdf->Inputs, $wordInput);

        $imageResource = new ImageResource($path . "/image-conversion/testimage.tif");
        $imageInput = $pdf->AddImage($imageResource);


        $file =  Utility::GetFileData($path . "/users-guide/products.html");
        $htmlResource = new HtmlResource($file);
        $pdf->AddHtml($htmlResource);


        $layoutData = new LayoutDataResource($path . "/creating-pdf-dlex-layout/creating-pdf-dlex-layout.json");
        $pdf->AddDlex("samples/creating-pdf-dlex-layout-endpoint/creating-pdf-dlex-layout.dlex", $layoutData);

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "/merge-pdfs-solution-php-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
MergeSolution::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH, CLIENT_EXAMPLES_OUTPUT_PATH);
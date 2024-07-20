<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class PdfExample
{
    public static function Run(string $apikey, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $pageNumberingElement = new PageNumberingElement("1", ElementPlacement::TopRight);
        $pageNumberingElement->Color = RgbColor::Red();
        $pageNumberingElement->Font = Font::Courier();
        $pageNumberingElement->FontSize = 24;
        array_push($pageInput->Elements, $pageNumberingElement);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($output_path . "php-pdf-example-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}
PdfExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_OUTPUT_PATH);
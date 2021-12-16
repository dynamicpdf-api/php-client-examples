<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

class ExtractText
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/extract-text/";

    public static function Run()
    {
        $resource = new PdfResource(ExtractText::$BasePath . "fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->ApiKey ="DP.NKSoPxiwOgZoypSVYaXyEARo2cO9Kk5BRgY2ZRC0jF/KQq4pDzhfK8yO";

        $response = $pdfText->Process();
       

        if($response->IsSuccessful)
        {
            echo ($response->JsonContent);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
ExtractText::Run();
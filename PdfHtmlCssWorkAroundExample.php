<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';
class PdfHtmlCssWorkAroundExample {

    public static function Run(string $apikey, string $path, $outpath){

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;

        $tempHtml = file_get_contents($path . "example.html");
        $tempCss = file_get_contents($path . "example.css");
        
        $sb = substr($tempHtml, 0, strpos($tempHtml,"<link"));
        $sb = $sb . "<style>" . $tempCss . "</style>";
        
        $tempHtml = substr($tempHtml, strpos($tempHtml, "<link"));
        $sb = $sb . substr($tempHtml, strpos($tempHtml, "/>") + 2);
        
        $resource = new HtmlResource($sb);
          
        $pdf->AddHtml($resource, null, "Letter", "Portrait", 1);

        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($outpath . "workaround-html-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
PdfHtmlCssWorkAroundExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);
<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class PdfTextExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->ApiKey = $apikey;
        $response = $pdfText->Process();
        echo ($response->JsonContent);
    }
}
PdfTextExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-info/");
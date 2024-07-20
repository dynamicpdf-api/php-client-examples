<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;

class PdfXmpExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->ApiKey = $apikey;
        $response = $pdfXmp->Process();
        echo ($response->Content);
    }
}
PdfXmpExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-info/");
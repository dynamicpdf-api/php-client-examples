<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';

include_once("constants.php");
use DynamicPDF\Api\PdfInfo;
use DynamicPDF\Api\PdfResource;

class PdfInfoExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $apikey;
        $response = $pdfInfo->Process();
        echo (json_encode($response));
    }
}
PdfInfoExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-info/");
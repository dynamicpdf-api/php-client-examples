<?php

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInfo;

class GetPdfInfo
{
  
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $apikey;
        $response = $pdfInfo->Process();
        if ($response->IsSuccessful) {
            echo ($response->JsonContent);
        } else {
            echo (json_encode($response));
        }
    }
}
GetPdfInfo::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/get-pdf-info-pdf-info-endpoint/");

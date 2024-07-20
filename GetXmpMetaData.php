<?php

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\PdfXmp;
use DynamicPDF\Api\PdfResource;

class GetXmpMetaData {

    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->ApiKey = $apikey;
        $response = $pdfXmp->Process();
        
        if($response->IsSuccessful)
        {
            echo($response->Content);
        } else {
            echo($response->ErrorJson);
        }
    }
}
GetXmpMetaData::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/get-xmp-metadata-pdf-xmp-endpoint/");
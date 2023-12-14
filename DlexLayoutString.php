<?php

use DynamicPDF\Api\DlexLayout;
use DynamicPDF\Api\LayoutDataResource;


require __DIR__ . '/vendor/autoload.php';

class DlexLayoutString
{

    public static function Run(string $apikey, string $path)
    {
        $file_content = file($path . "SimpleReportWithCoverPage.json");
        $layoutData = new LayoutDataResource($file_content);
        $dlexEndpoint = new DlexLayout("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $apikey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents($path . "php-dlex-layout-string-example-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }  
    }
}
#DlexLayoutString::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/dlex-layout/");
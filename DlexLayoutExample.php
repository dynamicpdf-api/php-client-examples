<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

require __DIR__ . '/vendor/autoload.php';

class DlexLayoutExample
{
    private static string $BasePath = "C:/temp/dlex-layout-example/";
    private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run()
    {
        $layoutData = new LayoutDataResource(DlexLayoutExample::$BasePath . "SimpleReportWithCoverPage.json");
        $dlexEndpoint = new DlexLayout("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = DlexLayoutExample::$ApiKey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents(DlexLayoutExample::$BasePath . "php-dlex-layout-example-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }  
    }
}
DlexLayoutExample::Run();
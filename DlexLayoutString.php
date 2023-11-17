<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

require __DIR__ . '/vendor/autoload.php';

class DlexLayoutString
{
    private static string $BasePath = "C:/temp/dlex-layout-example/";
    private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run()
    {
        $file_content = file(DlexLayoutString::$BasePath . "SimpleReportWithCoverPage.json");
        $layoutData = new LayoutDataResource($file_content);
        $dlexEndpoint = new DlexLayout("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = DlexLayoutString::$ApiKey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents(DlexLayoutString::$BasePath . "php-dlex-layout-string-example-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }  
    }
}
DlexLayoutString::Run();
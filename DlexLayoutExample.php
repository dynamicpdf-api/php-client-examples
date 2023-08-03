<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

require __DIR__ . '/vendor/autoload.php';

class DlexLayoutExample
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/error-handling-example/";
    private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run()
    {
        $layoutData = new LayoutDataResource(DlexLayoutExample::$BasePath . "SimpleReportWithCoverPage.json");
        $dlexEndpoint = new DlexLayout("samples/error-handling-example/SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = DlexLayoutExample::$ApiKey;
        $response = $dlexEndpoint->Process();
        echo("Http Status: " . $response->StatusCode . "\n");

        if($response->IsSuccessful) {
        file_put_contents(DlexLayoutExample::$BasePath . "php-dlex-layout-example-output.pdf", $response->Content);
        } else {
            echo("ErrorId: " . $response->ErrorId . "\n");
            echo("ErrorMsg:" . $response->ErrorMessage . "\n");
            echo("ErrorJSON: " . $response->ErrorJson . "\n");
        }
    }
}
DlexLayoutExample::Run();
<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

require __DIR__ . '/vendor/autoload.php';

class DlexLayoutExample
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/create-pdf-dlex/";
    private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run()
    {
        $layoutData = new LayoutDataResource(DlexLayoutExample::$BasePath . "SimpleReportWithCoverPage.json");
        $dlexEndpoint = new DlexLayout("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = DlexLayoutExample::$ApiKey;
        $response = $dlexEndpoint->Process();
        file_put_contents(DlexLayoutExample::$BasePath . "php-dlex-layout-example-output.pdf", $response->Content);
    }
}
DlexLayoutExample::Run();
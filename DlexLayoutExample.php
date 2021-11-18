<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class DlexLayoutExample
{
    private static string $BasePath = __DIR__;
    public static function RunExample()
    {
        $layoutData = new LayoutDataResource(DlexLayoutExample::$BasePath . "/Resources/client-libraries-examples/SimpleReportData.json");
        $dlexEndpoint = new DlexLayout("samples/shared/dlex/SimpleReportWithCoverPage.dlex", $layoutData);
        $response = $dlexEndpoint->Process();
        file_put_contents(DlexLayoutExample::$BasePath . "./output/dlex-output.pdf", $response->Content);
        echo ("PDF Received: " . DlexLayoutExample::$BasePath . "./output/dlex-output.pdf");
    }
}
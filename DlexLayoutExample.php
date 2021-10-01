<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class DlexLayoutExample
{


    public static function RunExample($baseUrl, $basePath)
    {
        $layoutData = new LayoutDataResource($basePath . "/Resources/client-libraries-examples/AllReportElementsData.json");
        $dlexEndpoint = new DlexLayout("samples/shared/dlex/AllReportElements.dlex", $layoutData);
        $dlexEndpoint->BaseUrl = $baseUrl;
        $response = $dlexEndpoint->Process();
        file_put_contents($basePath . "./output/dlex-output.pdf", $response->Content);
        echo ("PDF Received: " . $basePath . "./output/dlex-output.pdf");
    }
}

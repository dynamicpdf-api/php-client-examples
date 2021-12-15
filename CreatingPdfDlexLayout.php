<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class CreatingPdfDlexLayout
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/creating-pdf-dlex-layout-endpoint/";

    public static function Run()
    {
        //get layoutdata from local filesystem
        $layoutData = new LayoutDataResource(CreatingPdfDlexLayout::$BasePath . "create-pdf-dlex-layout.json");

        //load dlex from cloud and layoutdata
        $dlexEndpoint = new DlexLayout("samples/creating-pdf-dlex-layout-endpoint/create-pdf-dlex-layout.dlex", $layoutData);
        $dlexEndpoint->ApiKey = "DP.7vATWolKJ4xdaefbf/pTgSW7uGWofsZAKctZ1J/hzV9yTrzDvmDI1lwT";

        //call dlex-layout endpoint and get response
        $response = $dlexEndpoint->Process();

        //if successul write to file
        if($response->IsSuccessful)
        {
            file_put_contents(CreatingPdfDlexLayout::$BasePath . "create-pdf-dlex-layout-output.pdf", $response->Content);
        } else {
            echo($response->ErrorMessage);
        }
    }
}
CreatingPdfDlexLayout::Run();
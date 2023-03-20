<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/dlex-layout/tutorial-dlex-layout

class CreatingPdfDlexLayout
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/creating-pdf-dlex-layout-endpoint/";

    public static function Run()
    {
        //get layoutdata from local filesystem
        $layoutData = new LayoutDataResource(CreatingPdfDlexLayout::$BasePath . "creating-pdf-dlex-layout.json");

        //load dlex from cloud and layoutdata
        $dlexEndpoint = new DlexLayout("samples/creating-pdf-dlex-layout-endpoint/creating-pdf-dlex-layout.dlex", $layoutData);
        $dlexEndpoint->ApiKey = "DP.xxx-api-key-xxx";

        //call dlex-layout endpoint and get response
        $response = $dlexEndpoint->Process();

        //if successul write to file
        if($response->IsSuccessful)
        {
            file_put_contents(CreatingPdfDlexLayout::$BasePath . "create-pdf-dlex-layout-php-output.pdf", $response->Content);
        } else {
            echo($response->ErrorJson);
        }
    }
}
CreatingPdfDlexLayout::Run();
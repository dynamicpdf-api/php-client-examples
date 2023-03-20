<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class GettingStartedInFive
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/";
    public static function Run()
    {
        $layoutData = new LayoutDataResource(GettingStartedInFive::$BasePath . "getting-started.json");
        $dlexEndpoint = new DlexLayout("samples/getting-started/getting-started.dlex", $layoutData);
        $dlexEndpoint->ApiKey = "DP.xxx-api-key-xxx";
        $response = $dlexEndpoint->Process();

        if($response->IsSuccessful)
        {
            file_put_contents(GettingStartedInFive::$BasePath . "getting-started-php-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
GettingStartedInFive::Run();
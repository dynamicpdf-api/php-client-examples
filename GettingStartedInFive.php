<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class GettingStartedInFive
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $layoutData = new LayoutDataResource($path . "getting-started.json");
        $dlexEndpoint = new DlexLayout("samples/getting-started/getting-started.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $apikey;
        $response = $dlexEndpoint->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "getting-started-php-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
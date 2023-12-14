<?php
use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;
include_once __DIR__ . '/DynamicPdfExamples.php';;
class PdfHtmlCssWorkAroundExample {

    public static function Run(string $apikey, string $path, $outpath){
        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;

        $tempHtml = file_get_contents($path . "example.html");
        $tempCss = file_get_contents($path . "example.css");
        
        $sb = substr($tempHtml, 0, strpos($tempHtml,"<link"));
        $sb = $sb . "<style>" . $tempCss . "</style>";
        
        $tempHtml = substr($tempHtml, strpos($tempHtml, "<link"));
        $sb = $sb . substr($tempHtml, strpos($tempHtml, "/>") + 2);
        
        $resource = new HtmlResource($sb);
          
        $pdf->AddHtml($resource, null, "Letter", "Portrait", 1);

        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($outpath . "workaround-html-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
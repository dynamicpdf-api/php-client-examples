<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AddBookmarks.php';
include_once __DIR__ . '/CompletingAcroForm.php';
include_once __DIR__ . '/CreatePdfDlex.php';
include_once __DIR__ . '/DesignerReportTemplate.php';
include_once __DIR__ . '/DlexLayoutExample.php';
include_once __DIR__ . '/DlexLayoutString.php';
include_once __DIR__ . '/ExtractTextExample.php';
include_once __DIR__ . '/GetImageInfo.php';
include_once __DIR__ . "/GettingStartedInFive.php";
include_once __DIR__ . '/GoogleFontExample.php';
include_once __DIR__ . '/HtmlToPdf.php';
include_once __DIR__ . '/ImageInfoExample.php';
include_once __DIR__ . '/MergePdfs.php';
include_once __DIR__ . '/PdfExample.php';
include_once __DIR__ . '/GetPdfInfo.php';
include_once __DIR__ . '/PdfHtmlCssWorkAroundExample.php';
include_once __DIR__ . '/PdfHtmlExample.php';
include_once __DIR__ . '/PdfInfoExample.php';
include_once __DIR__ . '/PdfTextExample.php';
include_once __DIR__ . '/PdfXmpExample.php';
include_once __DIR__ . '/WordToPdfExample.php';
include_once __DIR__ . '/InstructionsExample.php';
include_once __DIR__ . '/SolutionImagesTextRecExample.php';
include_once __DIR__ . '/ImageConversion.php';
include_once __DIR__ . '/PdfBarcode.php';
include_once __DIR__ . '/OutlinesSolution.php';
include_once __DIR__ . '/DeletePages.php';
include_once __DIR__ . '/SplitPdf.php';
include_once __DIR__ . '/FormFlattenDelete.php';
class DynamicPdfExamples
{


    public static function Run() {

        if (!file_exists(Constants::$OUTPUT_PATH)) {
            mkdir(Constants::$OUTPUT_PATH, 0777, false);
        }
        

    }
    
}
DynamicPdfExamples::Run();
?>
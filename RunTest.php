<?php
require __DIR__ . '/vendor/autoload.php';

require_once(__DIR__ . './PdfInfoExample.php');
require_once(__DIR__ . './ImageInfoExample.php');
require_once(__DIR__ . './PdfTextExample.php');
require_once(__DIR__ . './PdfXmpExample.php');
require_once(__DIR__ . './PdfExample.php');
require_once(__DIR__ . './DlexLayoutExample.php');
require_once(__DIR__ . './instructions/InstructionsExample.php');

RunTest::RunMainTest();

class RunTest
{
    public static  function RunMainTest(): void
    {
        global $argv, $argc;
        if ($argc < 2) {
            echo "\nUsage:\nphp $argv[0] <Api Key> [Base URL]\n\n";
            echo "<Api Key>\t: Api key for server authentication.\n";
            echo "[Base URL]\t: (Optional) Server base URL in case of custom server is used.\n";
            exit - 1;
        }
        if ($argc >= 2) {
            \DynamicPDF\Api\Pdf::$DefaultApiKey = $argv[1];
        }
        if ($argc > 2) {
            \DynamicPDF\Api\Pdf::$DefaultBaseUrl = $argv[2];
        }

        RunTest::PrintDivider("Pdf Info Example");
        PdfInfoExample::RunExample();

        RunTest::PrintDivider("Image Info Example (1)");
        ImageInfoExample::RunExampleOne();

        RunTest::PrintDivider("Image Info Example (2)");
        ImageInfoExample::RunExampleTwo();

        RunTest::PrintDivider("Pdf Text Example");
        PdfTextExample::RunExample();

        RunTest::PrintDivider("Pdf Xmp Example");
        PdfXmpExample::RunExample();

        RunTest::PrintDivider("Pdf Example");
        PdfExample::RunExample();

        RunTest::PrintDivider("DlexLayout Example");
        DlexLayoutExample::RunExample();

        RunTest::PrintDivider("Instructions Example");
        InstructionsExample::DemoInstructions();
    }

    public  static function PrintDivider($exampleName)
    {
        echo ("\n============================================\n");
        echo $exampleName;
        echo ("\n============================================\n");
    }
}

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
        $args = array();
        $args[0] = "DP.4dyM4Ltnd4LHKTz9/1JUu2TlMgSkNtmICr/QQUm4A9NqRZxExfJVFL8L";
        $args[1] = "https://localhost:44397/v1.0";
        $args[2] =  __DIR__ . "./";

        \DynamicPDF\Api\Pdf::$DefaultApiKey = $args[0];
        \DynamicPDF\Api\Pdf::$DefaultBaseUrl = $args[1];
        RunTest::PrintDivider("Pdf Info Example");
        PdfInfoExample::RunExample($args[1], $args[2]);

        RunTest::PrintDivider("Image Info Example (1)");
        ImageInfoExample::RunExampleOne($args[1], $args[2]);
        
        RunTest::PrintDivider("Image Info Example (2)");
        ImageInfoExample::RunExampleTwo($args[1], $args[2]);
        
        RunTest::PrintDivider("Pdf Text Example");
        PdfTextExample::RunExample($args[1], $args[2]);
        
        RunTest::PrintDivider("Pdf Xmp Example");
        PdfXmpExample::RunExample($args[1], $args[2]);
        
        RunTest::PrintDivider("Pdf Example");
        PdfExample::RunExample($args[1], $args[2]);
        
        RunTest::PrintDivider("DlexLayout Example");
        DlexLayoutExample::RunExample($args[1], $args[2]);
        
        RunTest::PrintDivider("Instructions Example");
        InstructionsExample::DemoInstructions($args);
    }

    public  static function PrintDivider($exampleName)
    {
        echo ("\n============================================\n");
        echo $exampleName;
        echo ("\n============================================\n");
    }
}

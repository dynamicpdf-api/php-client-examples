<?php
require __DIR__ . '/vendor/autoload.php';

require_once(__DIR__ . './PdfInfoExample.php');
require_once(__DIR__ . './ImageInfoExample.php');
require_once(__DIR__ . './PdfTextExample.php');
require_once(__DIR__ . './PdfXmpExample.php');
require_once(__DIR__ . './PdfExample.php');
require_once(__DIR__ . './DlexLayoutExample.php');
require_once(__DIR__ . './instructions/InstructionsExample.php');
require_once(__DIR__ . './FormFillExample.php');
require_once(__DIR__ . './SimpleDlexMergeExample.php');
require_once(__DIR__ . './OutlineTutorialExample.php');

RunTest::RunMainTest();

class RunTest
{
    public static  function RunMainTest(): void
    {
            DynamicPDF\Api\Pdf::$DefaultApiKey = "DP.poEtD7F5tD1Ulp3qPcolUFaCcQFxWOvuNUqm/WragUdOSaAesnu3L6XE";
      
            DynamicPDF\Api\Pdf::$DefaultBaseUrl = "https://api.dynamicpdf.com/v1.0/";
       

    //    RunTest::PrintDivider("Pdf Info Example");
    //    PdfInfoExample::RunExample();

     //   RunTest::PrintDivider("Image Info Example (1)");
     //   ImageInfoExample::RunExampleOne();

    //    RunTest::PrintDivider("Image Info Example (2)");
    //    ImageInfoExample::RunExampleTwo();

    //    RunTest::PrintDivider("Pdf Text Example");
    //    PdfTextExample::RunExample();

    //    RunTest::PrintDivider("Pdf Xmp Example");
    //    PdfXmpExample::RunExample();

    //    RunTest::PrintDivider("Pdf Example");
    //    PdfExample::RunExample();

    //    RunTest::PrintDivider("DlexLayout Example");
    //    DlexLayoutExample::RunExample();

       // RunTest::PrintDivider(("Form Fill Tutorial"));
       // FormFillExample::RunExample();

      //  RunTest::PrintDivider("Simple Dlex Merge Tutorial");
       // SimpleDlexMergeExample::RunExample();

        RunTest::PrintDivider("Outline Tutorial Example");
        OutlineTutorialExample::RunExample();

      //  RunTest::PrintDivider("Instructions Example");
      //  InstructionsExample::DemoInstructions();
    }

    public  static function PrintDivider($exampleName)
    {
        echo ("\n============================================\n");
        echo $exampleName;
        echo ("\n============================================\n");
    }
}
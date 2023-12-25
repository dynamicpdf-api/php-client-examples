<?php

##############################################################
# An example code snippet using the pdf endpoint with a dlex
# and layoutdata
##############################################################


include_once('wordpress-dpdf-base.php');

# be certain to set the api key and if running on wordpress, the argIsDebug to false.

$dpdf_apiKey = "DP.---api-key---"; 
$dpdf_argIsDebug = true;

$dpdfBase = new DynamicPdfWordPressBase();

# set the local path to the json layout data
# and the local path to the instructions.json

$dpdfBase->set_dpdf_isLocalDebug($dpdf_argIsDebug);
$dpdfBase->dpdf_initialize("pdf");
$dpdf_jsonFileName = "report-with-cover-page.json";
$dpdf_instructionFileName = "instructions.json";
$dpdf_jsonDataPath = $dpdfBase->get_dpdf_basePath() . "/" . $dpdf_jsonFileName ;
$dpdf_instructionsPath = $dpdfBase->get_dpdf_basePath() . "/" . $dpdf_instructionFileName;

$dpdf_ch = curl_init();
$dpdfBase->dpdf_configureCurlSharedProps($dpdf_ch, $dpdf_apiKey);

curl_setopt($dpdf_ch, CURLOPT_POSTFIELDS, [
    'Instructions' => new CURLFile($dpdf_instructionsPath, "application/json" , $dpdf_instructionFileName),
    'Resource' => new CURLFile($dpdf_jsonDataPath, "application/json", $dpdf_jsonFileName),
]);


$dpdfBase->dpdf_executeAndSaveCurlOutputAndCloseCurlHandle($dpdf_ch);

echo $dpdfBase->dpdf_outputEmbedAsString();

?>


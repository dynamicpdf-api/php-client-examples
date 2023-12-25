<?php

# ##############################################################################
# DynamicPDF Cloud API PHP examples to use as Code Snippets in a WordPress site.
# Blog Post Illustrating pdf endpoint call:
# https://cloud.dynamicpdf.com/blog/cloudapi-with-wordpress
# note: the API key is not a constant to allow different endpoints to use
# different api keys
#
#
# By using this software you agree to the MIT License, licensing terms
# available at: https://mit-license.org/
# You also agree to the terms specified by DynamicPDF, available
# here: https://cloud.dynamicpdf.com/terms
################################################################################

class DynamicPdfWordPressBase
{
    protected static $dpdf_instance = NULL;

    #path to local folder if debug
    private string $dpdf_DEBUG_BASE_PATH = "c:/temp/wordpress";

    #additional path info after the wp media base path, modify to your path
    private string $dpdf_WP_PATH_ADDITION = "/2023/12/pdf-data";

    #the folder to save the created pdf

    private string $dpdf_BASE_FOLDER_NAME = "pdf-data";
    private string $dpdf_OUTPUT_FOLDER = "pdf-output";

    #delete only temporary files older than n seconds
    private string $dpdf_DELETE_WAIT_TIME = "-120 seconds";

    #url to dynamicpdf cloud
    private string $dpdf_API_URL = "https://api.dynamicpdf.com/v1.0";

    private string $dpdf_outputPath;
    private string $dpdf_outputFileName;

    private string $dpdf_outputFileUrl;
    private string $dpdf_endpointName;

    public string $dpdf_basePath;

    public bool $dpdf_isLocalDebug = true;

    public function test(){
        return 'DynamicPdfWordPressBase Working...';
    }

    public function get_pdf_isLocalDebug(){
        return $this->dpdf_isLocalDebug;
    }
    public function set_dpdf_isLocalDebug(bool $dpdf_arg){
       $this->dpdf_isLocalDebug = $dpdf_arg;
    }

    public function get_dpdf_basePath(){
        return $this->dpdf_basePath;
    }

 
    public function dpdf_initialize(string $dpdf_argEndpoint){
        $this->dpdf_endpointName = $dpdf_argEndpoint;
        $this->dpdf_initializeBasePath();
        $this->dpdf_initializeOutputPath();
        $this->dpdf_initializeOutputFileName();
        $this->dpdf_initializeOutputUrl();
        $this->dpdf_cleanOldFiles();
    }

    public function dpdf_configureCurlSharedProps(CurlHandle $curlHandle, string $apiKey) {

        curl_setopt($curlHandle, CURLOPT_URL, $this->dpdf_API_URL . "/" . $this->dpdf_endpointName);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curlHandle, CURLOPT_POST, 1);

        if($this->dpdf_isLocalDebug){
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        }

        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
        ]);

    }

    public function dpdf_executeAndSaveCurlOutputAndCloseCurlHandle(CurlHandle $curlHandle){

        $response = curl_exec($curlHandle);

        if ($response === false) {
            echo curl_error($curlHandle) . "\n";
        } else {

            if(str_starts_with($response, "{")) {
                echo $response . "\n";
            } else{
                file_put_contents($this->dpdf_outputPath . "/" . $this->dpdf_outputFileName, $response);
            }
        }

        curl_close($curlHandle);
    }

    public function dpdf_outputEmbedAsString(){

        return "<iframe src='" . $this->dpdf_outputFileUrl . "' width='1000' height='1000'></iframe>";

    }

    ##########################################################################
    # Construct the base path to the project. If debug it uses the local
    # system's constant above, otherwise gets it from wordpress uploads
    #########################################################################
    private function dpdf_initializeBasePath(){
        
        $dpdf_baseDir = "";

        if($this->dpdf_isLocalDebug == false) {
            $dpdf_uploads   = wp_upload_dir();
            $dpdf_baseDir = $dpdf_uploads['basedir'] . "/" . $this->dpdf_WP_PATH_ADDITION;
        } else {
            $dpdf_baseDir = $this->dpdf_DEBUG_BASE_PATH;
        }
        $this->dpdf_basePath = $dpdf_baseDir;
    }

    #########################################################################################
    # Create the output path to output created pdf 
    #########################################################################################
    private function dpdf_initializeOutputPath(){
       $this->dpdf_outputPath = $this->dpdf_basePath . "/" . $this->dpdf_OUTPUT_FOLDER;
    }

    #########################################################################
    # Get the endpoint calling and add it to the filename.
    # For example, dlex-layout-12324333234-pdf-output.pdf
    # 
    #########################################################################
    private function dpdf_initializeOutputFileName(){

        # if the output folder does not exist, then create the output folder

        if (!file_exists($this->dpdf_outputPath)) {
            mkdir($this->dpdf_outputPath, 0777, true);
        }

        # construct the temporary name for output file and return it

        $this->dpdf_outputFileName = $this->dpdf_endpointName ."-" . strtotime("now") . '-output.pdf';
   
    }

    ##########################################################################
    # Get the output url to the constructed file, for embedding.
    # only relevant if not in debug mode
    ##########################################################################
    private function dpdf_initializeOutputUrl(){
        if(!$this->dpdf_isLocalDebug) {
            $dpdf_uploads   = wp_upload_dir();
            $this->dpdf_outputFileUrl = $dpdf_uploads['url'] . "/" . $this->dpdf_BASE_FOLDER_NAME . '/' . $this->dpdf_OUTPUT_FOLDER . "/" . $this->dpdf_outputFileName;
        } else {
            $this->dpdf_outputFileUrl = "nowhere";
        }
    }


    private function dpdf_cleanOldFiles(){

        $files = array();
        
        foreach (scandir($this->dpdf_outputPath) as $file) {
            if ($file !== '..' && $file !== '.') {
               if( filemtime($this->dpdf_outputPath . "/" . $file) <= strtotime($this->dpdf_DELETE_WAIT_TIME)) {
                 unlink($this->dpdf_outputPath . "/" . $file);
              }
            }
        }
    }
}
?>
![](./logo-banner2.png)

***

php-client-examples
=========================================

The project contains numerous sample projects for the tutorials and examples on cloud.dynamicpdf.com. Each example project is designed to run independently. All resources can be found on the cloud.dynamicpdf.com website.

- **This project contains the tutorials and examples from [cloud.dynamicpdf.com](https://cloud.dynamicpdf.com)**

Running Examples
----------------

In order to install PHP client for DynamicPDF Cloud API, run the following command.

    composer update

This will install the package which is already added as a dependency in examples project. It will also generate the autoload needed to load the dependencies.

You can then run each example individually.

```bash
php <fileName>.php
```

## Resources

To obtain the resources for the project, login to cloud.dynamicpdf.com (assuming you have an account), and go to the **Resource Manager**. You use the `samples` folder to add the resources for the tutorials and examples from this project.

- [Resource Manager Samples](https://cloud.dynamicpdf.com/docs/usersguide/environment-manager/environment-manager-sample-resources)  

For more information on the tutorials and example code, refer to:

- https://cloud.dynamicpdf.com/docs/tutorials/tutorials-overview
- https://cloud.dynamicpdf.com/docs/usersguide/cloud-api/cloud-api-overview

## Tutorials

For more information on the tutorials and example code, refer to:

- https://cloud.dynamicpdf.com/docs/tutorials/tutorials-overview
- https://cloud.dynamicpdf.com/docs/usersguide/cloud-api/cloud-api-overview

* The following lists the tutorials provided by DynamicPDF Cloud API that illustrate using the API's endpoints.
* Obtain the project, [php-client-examples](https://github.com/dynamicpdf-api/php-client-examples), to view complete worked examples for each of the following tutorials

| Tutorial                                                     | Endpoint/Tool | Sample Project                              | Description                                                  |
| ------------------------------------------------------------ | ------------- | ------------------------------------------- | ------------------------------------------------------------ |
| [Merging PDFs](./cloud-api/merging-pdfs)                     | `pdf`         | Merge PDFs (pdf endpoint)                   | Use the `pdf` endpoint to merge three pre-existing `pdf` documents. |
| [Completing an Acroform](./cloud-api/form-completion)        | `pdf`         | Fill an Acroform (pdf endpoint)             | Use the `pdf` endpoint to fill-out a pre-existing PDF form with values and save the resulting PDF. |
| [Creating a PDF from DLEX (`pdf` Endpoint)](./cloud-api/dlex-pdf-endpoint) | `pdf`         | Create a PDF (pdf endpoint)                 | Use the `pdf` endpoint to generate a PDF report using DLEX. Then merge two PDF documents and then append the merged PDFs to the PDF created using the DLEX report. |
| [Adding Bookmarks to a PDF](./cloud-api/bookmarks)           | `pdf`         | Add Bookmarks (pdf endpoint)                | Use the Outline element in JSON instructions with the `pdf` endpoint to create a PDF that includes bookmarks. |
| [Creating a PDF from DLEX (`dlex-layout` Endpoint)](./cloud-api/dlex-layout) | `dlex-layout` | Create a PDF (dlex-layout endpoint)         | Use the `dlex-layout` endpoint to create PDF reports dynamically on the cloud. |
| [Get Image Metadata](./cloud-api/image-info)                 | `image-info`  | Get Image Information (image-info endpoint) | Use the `image-info` endpoint to get metadata describing an image. |
| [Extract PDF Metadata](./cloud-api/pdf-info)                 | `pdf-info`    | Get PDF Information (pdf-info endpoint)     | The `pdf-info` endpoint returns metadata from a PDF document. |
| [Extract PDF Text](./cloud-api/pdf-text)                     | `pdf-text`    | Extract Text (pdf-text endpoint)            | Extract text from PDF documents using the `pdf-text` endpoint. |
| [Extract XMP Metadata](./cloud-api/pdf-xmp)                  | `pdf-xmp`     | Get XMP Metadata (pdf-xmp endpoint)         | Extract XMP meta-data from PDF documents using the `pdf-xmp` endpoint. |

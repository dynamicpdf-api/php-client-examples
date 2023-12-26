

php-client-examples
=========================================

The PHP Client Examples (`php-client-examples`) project uses the DynamicPDF Cloud API PHPclient library to create, merge, split, form fill, stamp, obtain metadata, convert, and secure/encrypt PDF documents.  This project contains numerous sample projects for the tutorials and examples at the [DynamicPDF Cloud API](https://cloud.dynamicpdf.com/) website.

The DynamicPDF Cloud API consists of the following endpoints.

* `dlex-layout`
* `image-info`
* `pdf`
* `pdf-info`
* `pdf-text`
* `pdf-xmp`

For more information, please visit [DynamicPDF Cloud API](https://cloud.dynamicpdf.com/ "DynamicPDF Cloud API Homepage"). Support for other languages/platforms (PHP, C#, Node.js) is available on GitHub ([DynamicPDF Cloud API at GitHub](https://github.com/dynamicpdf-api "DynamicPDF Cloud API at GitHub")).

## Client Library (`php-client`)

* The PHP client project source is available on Github ([php-client](https://github.com/dynamicpdf-api/php-client)). 
* Follow the instructions on that project to install the php-client.

Running Examples
----------------

In order to install PHP client examples for DynamicPDF Cloud API be certain you have first installed the `php-client` library using Composer. After downloading this library run the update commmand.

```bash
composer update
```
Use the code below to autoload.

```bash
require_once('vendor/autoload.php');
```

You can then run each example individually.

```bash
php <fileName>.php
```

## Resources

To obtain the resources for the project, login to [cloud.dynamicpdf.com](https://cloud.dynamicpdf.com/) (assuming you have an account), and go to the **Resource Manager**. You use the `samples` folder to add the resources for the tutorials and examples from this project.

- [Resource Manager Samples](https://cloud.dynamicpdf.com/docs/usersguide/environment-manager/environment-manager-sample-resources)  

You need the following samples folder in your Cloud Storage space to run all the examples.

- samples/report-with-cover-page
- samples/creating-pdf-pdf-endpoint
- samples/creating-a-report-template-designer
- samples/creating-a-page-template-designer
- samples/dlex-layout
- samples/merge-pdfs-pdf-endpoint
- samples/fill-acro-form-pdf-endpoint
- samples/creating-a-page-template-designer

Local files are in the `resources` folder.  The created PDFs are placed in the project's `output` folder (created when run in `DynamicPdfExamples`).

## Tutorials

The following table lists the available tutorials.

| Tutorial Title                                     | Project/File/Class      | Tutorial Location                                            |
| -------------------------------------------------- | ----------------------- | ------------------------------------------------------------ |
| Merging PDFs                                       | MergePdfs               | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/merging-pdfs |
| Completing an AcroForm                             | `CompletingAcroForm`    | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/form-completion |
| Creating a PDF Using a DLEX and the `pdf` Endpoint | `CreatingPdfDlex`       | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/dlex-pdf-endpoint |
| Adding Bookmarks to a PDF                          | `AddBookmarks`          | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/bookmarks |
| Creating a PDF Using the `dlex-layout` Endpoint    | `CreatingPdfDlexLayout` | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/dlex-layout |
| Extracting Image Metadata                          | `GetImageInfo`          | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/image-info |
| Extract PDF Metadata                               | `GetPdfInfo`            | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-info |
| Extracting PDF's Text                              | `ExtractingText`        | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-text |
| Extract XMP Metadata                               | `GetXmpMetaData`        | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-xmp |

# Support

The primary source for the DynamicPDF Cloud API support is through [Stack Overflow](https://stackoverflow.com/questions/tagged/dynamicpdf-api). Please use the "[dynamicpdf-api](https://stackoverflow.com/questions/tagged/dynamicpdf-api)" tag to ask questions. Our support team actively monitors the tag and responds promptly to any questions.  Also, let us know you asked the question by following up with an email to [support@dynamicpdf.com](mailto:support@dynamicpdf.com). 

## Pro Plan Subscribers[#](https://cloud.dynamicpdf.com/support#pro-plan-subscribers)

Ticket support is available to Pro Plan subscribers. But we still encourage you to help the community by posting on Stack Overflow when possible. You can also email [support@dynamicpdf.com](mailto:support@dynamicpdf.com) if you need to ask something specific to your use case that may not help the DynamicPDF Cloud API community.

# License

The `php-client-examples` library is licensed under the [MIT License](./LICENSE).

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

## **Tutorials**

The following table lists the tutorial project or file name.  In Visual Studio each tutorial is it's own project. In the remaining client libraries each tutorial is its own individual class.

The following table lists the tutorial project or file name.  In Visual Studio each tutorial is it's own project. In the remaining client libraries each tutorial is its own individual class.

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

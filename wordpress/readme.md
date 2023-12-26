![](../logo-banner2.png)

The PHP WordPress examples in the PHP DynamicPDF Cloud API's (`php-client-examples`) project uses **The DynamicPDF Cloud API** PHP client library to create, merge, split, form fill, stamp, obtain metadata, convert, and secure/encrypt PDF documents. 

The PHP WordPress sub-project contains examples of how to using **The DynamicPDF Cloud API** with **WordPress**.

## Blog Post

Review the blogpost: [Using CloudAPI with WordPress](https://cloud.dynamicpdf.com/blog/cloudapi-with-wordpress) for an example of how to use these snippets.

## Installation and Running

The examples consists of a class, `DynamicPdfWordPressBase`, in `wordpress-dpdf-base.php`, and two sample scripts that use the `DynamicPdfWordPressBase` class.

* The available PHP snippet plugins do not easily support using PHP classes and methods.
* Install `wordpress-dpdf-base.php` in a location where it is available by PHP.
* Create a PHP code snippet by copying and pasting the sample snippets in `wordpress-dlex-layout-snippet.php` or `wordpress-pd-dlex-snippet.php`.

## Resources

To run the sample snippets, login to [cloud.dynamicpdf.com](https://cloud.dynamicpdf.com/) (assuming you have an account), and go to the **Resource Manager**. You use the `samples` folder to add the resources for the tutorials and examples from this project. 

You need the following sample folder in your Cloud Storage space to run all the examples.

- samples/report-with-cover-page

Local files are in the `wordpress/resources` folder. You will need to upload them to WordPress. 

The created PDFs are displayed in your WordPress page.

## Warning

DynamicPDF does not warranty these samples and are intended as examples. Be certain to properly secure your WordPress site from hackers.  Moreover, do not make your PDF generating page accessible to the public, as this could incur excessive usage fees for your DynamicPDF Cloud API account. Note in the tutorial we password protected the example page (not sufficient for a production site).

## License

The `php-client-examples` library is licensed under the [MIT License](https://file+.vscode-resource.vscode-cdn.net/c%3A/Users/James Brannan/dynamicpdf-work/php-client-examples/LICENSE).
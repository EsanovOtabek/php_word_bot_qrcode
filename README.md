# php_word_bot_pdf_qrcode

* "phpoffice/phpword": - https://github.com/PHPOffice/PHPWord
* "dompdf/dompdf": -  https://github.com/dompdf/dompdf
* "convertapi/convertapi-php": - https://github.com/convertapi/convertapi-php
* "phpqrcode": -http://phpqrcode.sourceforge.net/




------------------------------------------------------------------------------------------------------------
# phpword ![PHPWord](https://rawgit.com/PHPOffice/PHPWord/develop/docs/images/phpword.svg "PHPWord")

Master: 
[![Latest Stable Version](https://poser.pugx.org/phpoffice/phpword/v/stable.png)](https://packagist.org/packages/phpoffice/phpword)
[![Build Status](https://travis-ci.org/PHPOffice/PHPWord.svg?branch=master)](https://travis-ci.org/PHPOffice/PHPWord)
[![Code Quality](https://scrutinizer-ci.com/g/PHPOffice/PHPWord/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PHPOffice/PHPWord/)
[![Coverage Status](https://coveralls.io/repos/github/PHPOffice/PHPWord/badge.svg?branch=master)](https://coveralls.io/github/PHPOffice/PHPWord?branch=master)
[![Total Downloads](https://poser.pugx.org/phpoffice/phpword/downloads.png)](https://packagist.org/packages/phpoffice/phpword)
[![License](https://poser.pugx.org/phpoffice/phpword/license.png)](https://packagist.org/packages/phpoffice/phpword)
[![Join the chat at https://gitter.im/PHPOffice/PHPWord](https://img.shields.io/badge/GITTER-join%20chat-green.svg)](https://gitter.im/PHPOffice/PHPWord)

Develop:
[![Latest Development Version](https://img.shields.io/badge/unstable-dev--develop-orange.svg)](https://packagist.org/packages/phpoffice/phpword#dev-develop)
[![Build Status](https://travis-ci.org/PHPOffice/PHPWord.svg?branch=develop)](https://travis-ci.org/PHPOffice/PHPWord/branches)
[![Code Quality](https://scrutinizer-ci.com/g/PHPOffice/PHPWord/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/PHPOffice/PHPWord/?branch=develop)
[![Coverage Status](https://coveralls.io/repos/github/PHPOffice/PHPWord/badge.svg?branch=develop)](https://coveralls.io/github/PHPOffice/PHPWord?branch=develop)

PHPWord is a library written in pure PHP that provides a set of classes to write to and read from different document file formats. The current version of PHPWord supports Microsoft [Office Open XML](http://en.wikipedia.org/wiki/Office_Open_XML) (OOXML or OpenXML), OASIS [Open Document Format for Office Applications](http://en.wikipedia.org/wiki/OpenDocument) (OpenDocument or ODF), [Rich Text Format](http://en.wikipedia.org/wiki/Rich_Text_Format) (RTF), HTML, and PDF.

PHPWord is an open source project licensed under the terms of [LGPL version 3](COPYING.LESSER). PHPWord is aimed to be a high quality software product by incorporating [continuous integration](https://travis-ci.org/PHPOffice/PHPWord) and [unit testing](http://phpoffice.github.io/PHPWord/coverage/develop/). You can learn more about PHPWord by reading the [Developers' Documentation](http://phpword.readthedocs.org/).

If you have any questions, please ask on [StackOverFlow](https://stackoverflow.com/questions/tagged/phpword)

Read more about PHPWord:

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Getting started](#getting-started)
- [Contributing](#contributing)
- [Developers' Documentation](http://phpword.readthedocs.org/)

## Features

With PHPWord, you can create OOXML, ODF, or RTF documents dynamically using your PHP 5.3.3+ scripts. Below are some of the things that you can do with PHPWord library:

- Set document properties, e.g. title, subject, and creator.
- Create document sections with different settings, e.g. portrait/landscape, page size, and page numbering
- Create header and footer for each sections
- Set default font type, font size, and paragraph style
- Use UTF-8 and East Asia fonts/characters
- Define custom font styles (e.g. bold, italic, color) and paragraph styles (e.g. centered, multicolumns, spacing) either as named style or inline in text
- Insert paragraphs, either as a simple text or complex one (a text run) that contains other elements
- Insert titles (headers) and table of contents
- Insert text breaks and page breaks
- Insert and format images, either local, remote, or as page watermarks
- Insert binary OLE Objects such as Excel or Visio
- Insert and format table with customized properties for each rows (e.g. repeat as header row) and cells (e.g. background color, rowspan, colspan)
- Insert list items as bulleted, numbered, or multilevel
- Insert hyperlinks
- Insert footnotes and endnotes
- Insert drawing shapes (arc, curve, line, polyline, rect, oval)
- Insert charts (pie, doughnut, bar, line, area, scatter, radar)
- Insert form fields (textinput, checkbox, and dropdown)
- Create document from templates
- Use XSL 1.0 style sheets to transform headers, main document part, and footers of an OOXML template
- ... and many more features on progress

## Requirements

PHPWord requires the following:

- PHP 5.3.3+
- [XML Parser extension](http://www.php.net/manual/en/xml.installation.php)
- [Laminas Escaper component](https://docs.laminas.dev/laminas-escaper/intro/)
- [Zip extension](http://php.net/manual/en/book.zip.php) (optional, used to write OOXML and ODF)
- [GD extension](http://php.net/manual/en/book.image.php) (optional, used to add images)
- [XMLWriter extension](http://php.net/manual/en/book.xmlwriter.php) (optional, used to write OOXML and ODF)
- [XSL extension](http://php.net/manual/en/book.xsl.php) (optional, used to apply XSL style sheet to template )
- [dompdf library](https://github.com/dompdf/dompdf) (optional, used to write PDF)

## Installation

PHPWord is installed via [Composer](https://getcomposer.org/).
To [add a dependency](https://getcomposer.org/doc/04-schema.md#package-links) to PHPWord in your project, either

Run the following to use the latest stable version
```sh
    composer require phpoffice/phpword
```
or if you want the latest master version
```sh
    composer require phpoffice/phpword:dev-master
```

You can of course also manually edit your composer.json file
```json
{
    "require": {
       "phpoffice/phpword": "v0.18.*"
    }
}
```

## Getting started

The following is a basic usage example of the PHPWord library.

```php
<?php
require_once 'bootstrap.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
$section->addText(
    '"Learn from yesterday, live for today, hope for tomorrow. '
        . 'The important thing is not to stop questioning." '
        . '(Albert Einstein)'
);

/*
 * Note: it's possible to customize font style of the Text element you add in three ways:
 * - inline;
 * - using named font style (new font style object will be implicitly created);
 * - using explicitly created font style object.
 */

// Adding Text element with font customized inline...
$section->addText(
    '"Great achievement is usually born of great sacrifice, '
        . 'and is never the result of selfishness." '
        . '(Napoleon Hill)',
    array('name' => 'Tahoma', 'size' => 10)
);

// Adding Text element with font customized using named font style...
$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$section->addText(
    '"The greatest accomplishment is not in never falling, '
        . 'but in rising again after you fall." '
        . '(Vince Lombardi)',
    $fontStyleName
);

// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(13);
$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
$myTextElement->setFontStyle($fontStyle);

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');

// Saving the document as ODF file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
$objWriter->save('helloWorld.odt');

// Saving the document as HTML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
$objWriter->save('helloWorld.html');

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
```

More examples are provided in the [samples folder](samples/). For an easy access to those samples launch `php -S localhost:8000` in the samples directory then browse to [http://localhost:8000](http://localhost:8000) to view the samples.
You can also read the [Developers' Documentation](http://phpword.readthedocs.org/) for more detail.

## Contributing

We welcome everyone to contribute to PHPWord. Below are some of the things that you can do to contribute.

- Read [our contributing guide](CONTRIBUTING.md).
- [Fork us](https://github.com/PHPOffice/PHPWord/fork) and [request a pull](https://github.com/PHPOffice/PHPWord/pulls) to the [develop](https://github.com/PHPOffice/PHPWord/tree/develop) branch.
- Submit [bug reports or feature requests](https://github.com/PHPOffice/PHPWord/issues) to GitHub.
- Follow [@PHPWord](https://twitter.com/PHPWord) and [@PHPOffice](https://twitter.com/PHPOffice) on Twitter.





___________________________________________________________________________________________________________________________________

Dompdf
======

[![Build Status](https://travis-ci.org/dompdf/dompdf.png?branch=master)](https://travis-ci.org/dompdf/dompdf)
[![Latest Stable Version](https://poser.pugx.org/dompdf/dompdf/v/stable.png)](https://packagist.org/packages/dompdf/dompdf)
[![Total Downloads](https://poser.pugx.org/dompdf/dompdf/downloads.png)](https://packagist.org/packages/dompdf/dompdf)
[![Latest Unstable Version](https://poser.pugx.org/dompdf/dompdf/v/unstable.png)](https://packagist.org/packages/dompdf/dompdf)
[![License](https://poser.pugx.org/dompdf/dompdf/license.png)](https://packagist.org/packages/dompdf/dompdf)
 
**Dompdf is an HTML to PDF converter**

At its heart, dompdf is (mostly) a [CSS 2.1](http://www.w3.org/TR/CSS2/) compliant
HTML layout and rendering engine written in PHP. It is a style-driven renderer:
it will download and read external stylesheets, inline style tags, and the style
attributes of individual HTML elements. It also supports most presentational
HTML attributes.

*This document applies to the latest stable code which may not reflect the current 
release. For released code please
[navigate to the appropriate tag](https://github.com/dompdf/dompdf/tags).*

----

**Check out the [demo](http://eclecticgeek.com/dompdf/debug.php) and ask any
question on [StackOverflow](https://stackoverflow.com/questions/tagged/dompdf) or
in [Discussions](https://github.com/dompdf/dompdf/discussions).**

Follow us on [![Twitter](http://twitter-badges.s3.amazonaws.com/twitter-a.png)](http://www.twitter.com/dompdf).

---



## Features

 * Handles most CSS 2.1 and a few CSS3 properties, including @import, @media &
   @page rules
 * Supports most presentational HTML 4.0 attributes
 * Supports external stylesheets, either local or through http/ftp (via
   fopen-wrappers)
 * Supports complex tables, including row & column spans, separate & collapsed
   border models, individual cell styling
 * Image support (gif, png (8, 24 and 32 bit with alpha channel), bmp & jpeg)
 * No dependencies on external PDF libraries, thanks to the R&OS PDF class
 * Inline PHP support
 * Basic SVG support (see "Limitations" below)
 
## Requirements

 * PHP version 7.1 or higher
 * DOM extension
 * MBString extension
 * php-font-lib
 * php-svg-lib
 
Note that some required dependencies may have further dependencies 
(notably php-svg-lib requires sabberworm/php-css-parser).

### Recommendations

 * OPcache (OPcache, XCache, APC, etc.): improves performance
 * GD (for image processing)
 * IMagick or GMagick extension: improves image processing performance

Visit the wiki for more information:
https://github.com/dompdf/dompdf/wiki/Requirements

## About Fonts & Character Encoding

PDF documents internally support the following fonts: Helvetica, Times-Roman,
Courier, Zapf-Dingbats, & Symbol. These fonts only support Windows ANSI
encoding. In order for a PDF to display characters that are not available in
Windows ANSI, you must supply an external font. Dompdf will embed any referenced
font in the PDF so long as it has been pre-loaded or is accessible to dompdf and
reference in CSS @font-face rules. See the
[font overview](https://github.com/dompdf/dompdf/wiki/About-Fonts-and-Character-Encoding)
for more information on how to use fonts.

The [DejaVu TrueType fonts](https://dejavu-fonts.github.io/) have been pre-installed
to give dompdf decent Unicode character coverage by default. To use the DejaVu
fonts reference the font in your stylesheet, e.g. `body { font-family: DejaVu
Sans; }` (for DejaVu Sans). The following DejaVu 2.34 fonts are available:
DejaVu Sans, DejaVu Serif, and DejaVu Sans Mono.

## Easy Installation

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require dompdf/dompdf
```

Make sure that the autoload file from Composer is loaded.

```php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';

```

### Download and install

Download a packaged archive of dompdf and extract it into the 
directory where dompdf will reside

 * You can download stable copies of dompdf from
   https://github.com/dompdf/dompdf/releases
 * Or download a nightly (the latest, unreleased code) from
   http://eclecticgeek.com/dompdf

Use the packaged release autoloader to load dompdf, libraries,
and helper functions in your PHP:

```php
// include autoloader
require_once 'dompdf/autoload.inc.php';
```

Note: packaged releases are named according using semantic
versioning (_dompdf_MAJOR-MINOR-PATCH.zip_). So the 1.0.0 
release would be dompdf_1-0-0.zip. This is the only download
that includes the autoloader for Dompdf and all its dependencies.

### Install with git

From the command line, switch to the directory where dompdf will
reside and run the following commands:

```sh
git clone https://github.com/dompdf/dompdf.git
cd dompdf/lib

git clone https://github.com/PhenX/php-font-lib.git php-font-lib
cd php-font-lib
git checkout 0.5.1
cd ..

git clone https://github.com/PhenX/php-svg-lib.git php-svg-lib
cd php-svg-lib
git checkout v0.3.2
cd ..

git clone https://github.com/sabberworm/PHP-CSS-Parser.git php-css-parser
cd php-css-parser
git checkout 8.1.0
```

Require dompdf and it's dependencies in your PHP.
For details see the [autoloader in the utils project](https://github.com/dompdf/utils/blob/master/autoload.inc.php).

## Quick Start

Just pass your HTML in to dompdf and stream the output:

```php
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
```

### Setting Options

Set options during dompdf instantiation:

```php
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);
```

or at run time

```php
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$dompdf->setOptions($options);
```

See [Dompdf\Options](src/Options.php) for a list of available options.

### Resource Reference Requirements

In order to protect potentially sensitive information Dompdf imposes 
restrictions on files referenced from the local file system or the web. 

Files accessed through web-based protocols have the following requirements:
 * The Dompdf option "isRemoteEnabled" must be set to "true"
 * PHP must either have the curl extension enabled or the 
   allow_url_fopen setting set to true
   
Files accessed through the local file system have the following requirement:
 * The file must fall within the path(s) specified for the Dompdf "chroot" option

## Limitations (Known Issues)

 * Dompdf is not particularly tolerant to poorly-formed HTML input. To avoid
   any unexpected rendering issues you should either enable the built-in HTML5
   parser at runtime (`$options->setIsHtml5ParserEnabled(true);`) 
   or run your HTML through a HTML validator/cleaner (such as
   [Tidy](http://tidy.sourceforge.net) or the
   [W3C Markup Validation Service](http://validator.w3.org)).
 * Table cells are not pageable, meaning a table row must fit on a single page.
 * Elements are rendered on the active page when they are parsed.
 * Embedding "raw" SVG's (`<svg><path...></svg>`) isn't working yet, you need to
   either link to an external SVG file, or use a DataURI like this:
     ```php
     $html = '<img src="data:image/svg+xml;base64,' . base64_encode($svg) . '" ...>';
     ```
     Watch https://github.com/dompdf/dompdf/issues/320 for progress

---

[![Donate button](https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif)](http://goo.gl/DSvWf)

*If you find this project useful, please consider making a donation.
Any funds donated will be used to help further development on this project.)*






________________________________________________________________________________________

# ConvertAPI PHP Client

[![PHP version](https://badge.fury.io/ph/convertapi%2Fconvertapi-php.svg)](https://packagist.org/packages/convertapi/convertapi-php)
[![Build Status](https://secure.travis-ci.org/ConvertAPI/convertapi-php.svg)](http://travis-ci.org/ConvertAPI/convertapi-php)

## Convert your files with our online file conversion API

ConvertAPI helps in converting various file formats. Creating PDF and Images from various sources like Word, Excel, Powerpoint, images, web pages or raw HTML codes. Merge, Encrypt, Split, Repair and Decrypt PDF files and many other file manipulations. You can integrate it into your application in just a few minutes and use it easily.

## Requirements

PHP 5.4.0 and later.

## Installation

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require convertapi/convertapi-php
```

### Manual Installation

If you do not wish to use the Composer, you must require ConvertApi autoloader:

```php
require_once('/path/to/convertapi-php/src/ConvertApi/autoload.php');
```

## Dependencies

Library requires the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php)
- [`json`](https://secure.php.net/manual/en/book.json.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Usage

### Configuration

You can get your secret at https://www.convertapi.com/a

```php
use \ConvertApi\ConvertApi;

ConvertApi::setApiSecret('your-api-secret');
```

### File conversion

Convert file to PDF example. All supported formats and options can be found
[here](https://www.convertapi.com).

```php
$result = ConvertApi::convert('pdf', ['File' => '/path/to/my_file.docx']);

# save to file
$result->getFile()->save('/path/to/save/file.pdf');

# get file contents (without saving the file locally)
$contents = $result->getFile()->getContents();
```

Other result operations:

```php
# save all result files to folder
$result->saveFiles('/path/to/save/files');

# get conversion cost
$cost = $result->getConversionCost();
```

#### Convert file url

```php
$result = ConvertApi::convert('pdf', ['File' => 'https://website/my_file.docx']);
```

#### Specifying from format

```php
$result = ConvertApi::convert(
    'pdf',
    ['File' => '/path/to/my_file'],
    'docx'
);
```

#### Additional conversion parameters

ConvertAPI accepts additional conversion parameters depending on selected formats. All conversion
parameters and explanations can be found [here](https://www.convertapi.com).

```php
$result = ConvertApi::convert(
    'pdf',
    [
        'File' => '/path/to/my_file.docx',
        'PageRange' => '1-10',
        'PdfResolution' => '150',
    ]
);
```

### User information

You can always check your remaining seconds amount programmatically by fetching [user information](https://www.convertapi.com/doc/user).

```php
$info = ConvertApi::getUser();

echo $info['SecondsLeft'];
```

### More examples

Find more advanced examples in the [examples/](https://github.com/ConvertAPI/convertapi-php/tree/master/examples) folder.

## Development

Testing is done with PHPUnit:

```sh
CONVERT_API_SECRET=your-api-secret ./bin/phpunit
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/ConvertAPI/convertapi-php. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.

## License

ConvertAPI PHP Client is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).






________________________________________________________________________________________________

#phpqrcode
PHP QR Code is open source (LGPL) library for generating QR Code, 2-dimensional barcode. Based on libqrencode C library, provides API for creating QR Code barcode images (PNG, JPEG thanks to GD2). Implemented purely in PHP, with no external dependencies (except GD2 if needed).

Some of library features includes:

Supports QR Code versions (size) 1-40
Numeric, Alphanumeric, 8-bit and Kanji encoding. (Kanji encoding was not fully tested, if you are japan-encoding enabled you can contribute by verifing it :) )
Implemented purely in PHP, no external dependencies except GD2
Exports to PNG, JPEG images, also exports as bit-table
TCPDF 2-D barcode API integration
Easy to configure
Data cache for calculation speed-up
Provided merge tool helps deploy library as a one big dependency-less file, simple to "include and do not wory"
Debug data dump, error logging, time benchmarking
API documentation
Detailed examples
100% Open Source, LGPL Licensed
Usage
To install simply include:

qrlib.php for full version (also you have to provide all library files form package plus cache dir)
OR phpqrcode.php for merged version (only one file, but slower and less accurate code because disabled cache and quicker masking configured)
Then use it as follows:
```php
QRcode::png('code data text', 'filename.png'); // creates file
QRcode::png('some othertext 1234'); // creates code image and outputs it directly into browser
```
Above examples show the most basic usage. For more features and customization see Detailed examples and PHP QR Code wiki or read INSTALL file in distrribution package.

Acknowledgements
Based on C libqrencode library (ver. 3.1.1), Copyright (C) 2006-2010 by Kentaro Fukuchi
http://megaui.net/fukuchi/works/qrencode/index.en.html

QR Code is registered trademarks of DENSO WAVE INCORPORATED in JAPAN and other countries.

Reed-Solomon code encoder is written by Phil Karn, KA9Q. Copyright (C) 2002, 2003, 2004, 2006 Phil Karn, KA9Q

Contact
Fell free to contact me via e-mail (deltalab at poczta dot fm - prefferable) or using folowing project pages:

http://sourceforge.net/projects/phpqrcode/
http://phpqrcode.sourceforge.net/


________________________________________________________________________________________________

# telegrambot

```php
// telegram bot bilan ishlash qismi-------------------------------------------------
define('API_KEY','here-your-bot-token');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$members = array("admin_id");
foreach ($members as $member) {
  bot('sendMessage', [
    'chat_id'=>$member,
      'text'=>"xabar matni",
  ]);
   $filelink = "http://lifepc.uz/arizalar/ariza/zip/".$pathname.".zip";
  bot('sendDocument',[
      'chat_id'=>$member,
      'document'=>$filelink,
  ]);
}
```




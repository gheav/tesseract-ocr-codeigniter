# Tesseract OCR for PHP using CodeIgniter Framework

A wrapper to work with Tesseract OCR inside PHP using Codeigniter 3.

<br/>

Reference :  `https://github.com/thiagoalessio/tesseract-ocr-for-php.git`

## Installation

Via [Composer]:

    $ composer install

###  Note for Windows users

There are [many ways][tesseract_installation_on_windows] to install
[Tesseract OCR][] on your system, but if you just want something quick to
get up and running, I recommend installing the [Capture2Text][] package with
[Chocolatey][].

    choco install capture2text --version 3.9

:warning: Recent versions of [Capture2Text][] stopped shipping the `tesseract` binary.

<br/>

###Note for macOS users

With [MacPorts] you can install support for individual languages, like so:

    $ sudo port install tesseract-<langcode>

But that is not possible with [Homebrew]. It comes only with **English** support
by default, so if you intend to use it for other language, the quickest solution
is to install them all:

    $ brew install tesseract tesseract-lang



# Setup Environment Variable

- Add Path TESSDATA_PREFIX on user variables for Me

Variable Name : TESSDATA_PREFIX
<br/>
Variable Value : C:\ProgramData\chocolatey\lib\capture2text\tools\Capture2Text\Utils\tesseract\tessdata

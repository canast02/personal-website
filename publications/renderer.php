<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'bibtex.php';

/*
 Available Fields:

 The field TYPE will be used for data-filtering. If it is not available then the item will be
 marked as uncategorised.

 'note'
 'abstract'
 'year'
 'group'
 'publisher'
 'location'
 'articleno'
 'numpages'
 'page-start'
 'page-end'
 'pages'
 'address'
 'url'
 'doi'
 'volume'
 'chapter'
 'journal'
 'author'
 'raw'
 'title'
 'booktitle'
 'folder'
 'type'
 'series'
 'linebegin'
 'lineend'
 'durl',
 'powerpoint',
 'infosite',
 'website'

 */

/*
 Define the format that will be used for printing each bibtex item.
 If a you desire to print a string infront of a field please use the following format:

 article = array("title", "author", "string", "bibtex field");

 eg.

 article = array("title", "author", "Num. Of pages", "pages");

 Please modify the example below as desired  is presented bellow.
 */

$article = array("title", "author", "journal", "series", "location", "publisher", "volume", "number", "pages", "address", "isbn", "year");
$book = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$booklet = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$conference = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year", "award");
$inbook = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$incollection = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "chapter", "pages", "address", "isbn", "year", "award");
$inproceedings = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "chapter", "pages", "address", "isbn", "year", "award");
$manual = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$mastersthesis = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$misc = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$phdthesis = array("title", "author", "journal", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$proceedings = array("booktitle", "series", "author", "location", "publisher", "volume", "pages", "address", "isbn", "year", "award");
$techreport = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$unpublished = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");
$other = array("title", "author", "booktitle", "series", "location", "publisher", "volume", "pages", "address", "isbn", "year");

/*
 Delimiter for separating each bibtex field.
*/

$delimiter = '.';

/*
 Enter fields equivalent to type field in the BibTex file to sort the bibtex entries in categories.
 Bellow each type enter the title which will be presented as the category title.
*/

$sortby = array('journal', 'conference', 'book', 'editorial', 'workshop', 'theses', 'gconferences');
$sortbyTitle = array('Journals and Magazines', 'Conference Proceedings', 'Book Chapters', 'Editorials', 'Workshop Papers', 'Theses', 'Greek Conferences');

$projects = array('all');

/*
  Enter the location of your BibTex file.
 */
$bibTexFile = 'ca.bib';

$bibTex = new BibTeX_Parser();
$bibTex->parser($file = $bibTexFile);

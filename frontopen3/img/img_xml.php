<?php 
require_once '../../../init.php';
	$DB = MySql::getInstance();

$imgs = $DB->query("SELECT aid,blogid as g,filename,filesize,filepath,(SELECT title FROM ".DB_PREFIX."blog where `gid`=g),count(*) FROM ".DB_PREFIX."attachment WHERE `filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png' GROUP BY `blogid` ORDER BY `addtime` DESC LIMIT 10");

// create doctype 
$dom = new DOMDocument("1.0"); 
// display document in browser as plain text 
// for readability purposes 
header("Content-Type: text/plain"); 
// create root element 
$root = $dom->createElement("bcaster"); 
$dom->appendChild($root); 
//
$autoPlayTime = $dom->createAttribute("autoPlayTime"); 
$root->appendChild($autoPlayTime); 
$Value = $dom->createTextNode("3"); 
$autoPlayTime->appendChild($Value); 
while($img = mysql_fetch_array($imgs)){
// create child element 
$item = $dom->createElement("item"); 
$root->appendChild($item); 
// create attribute node 
$price = $dom->createAttribute("item_url"); 
$item->appendChild($price); 
// create attribute value node 
$priceValue = $dom->createTextNode(BLOG_URL.substr($img[4],3,strlen($img[4]))); 
$price->appendChild($priceValue); 
//
$price = $dom->createAttribute("link"); 
$item->appendChild($price); 
// create attribute value node 
$priceValue = $dom->createTextNode(BLOG_URL."post-".$img[1].".html"); 
$price->appendChild($priceValue);
//
$price = $dom->createAttribute("itemtitle"); 
$item->appendChild($price); 
// create attribute value node 
$priceValue = $dom->createTextNode($img[5]); 
$price->appendChild($priceValue);

}
// save and display tree 
echo $dom->saveXML(); 
?>
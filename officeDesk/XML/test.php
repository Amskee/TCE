<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('tce');

$sql = "SELECT * FROM users";
$res = mysql_query($sql);

$xml = new XMLWriter();
$xml->openMemory();
$xml->startDocument('1.0', 'US-ASCII');

//$xml->openURI("php://output");
$xml->openURI('test.xml');
$xml->startDocument();
$xml->setIndent(true);

$xml->startElement('users');

while ($row = mysql_fetch_assoc($res)) {
  $xml->startElement("user");
  	$xml->startElement("userName");
  	$xml->writeRaw($row['usn']);
  	$xml->endElement();

  	$xml->startElement("RollNo");
	$xml->writeRaw($row['roll']);
  	$xml->endElement();

  	$xml->startElement("Email");
  	$xml->writeRaw($row['email']);
  	$xml->endElement();

  	$xml->startElement("Phone");
  	$xml->writeRaw($row['phone']);
  	$xml->endElement();
  $xml->endElement();
}

$xml->endElement();

//header('Content-type: text/xml');
$xml->flush();
?>
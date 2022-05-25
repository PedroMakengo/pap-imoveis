<?php

require 'source/model/Config.php';
require 'source/model/Model.php';

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
// $result_markers = "SELECT * FROM markers";
// $resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Buscando os DADOS no banco de DADOS
$result_markers = new Model();
$resultado_markers = $result_markers->EXE_QUERY("SELECT * FROM tb_imovel");

foreach($resultado_markers as $row_markers):
  echo '<marker ';
  echo 'name="' . parseToXML($row_markers['tipo_imovel']) . '" ';
  echo 'address="' . parseToXML($row_markers['acao_imovel']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'type="' . $row_markers['acao_imovel'] . '" ';
  echo '/>';
endforeach;
// while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  // echo '<marker ';
  // echo 'name="' . parseToXML($row_markers['name']) . '" ';
  // echo 'address="' . parseToXML($row_markers['address']) . '" ';
  // echo 'lat="' . $row_markers['lat'] . '" ';
  // echo 'lng="' . $row_markers['lng'] . '" ';
  // echo 'type="' . $row_markers['type'] . '" ';
  // echo '/>';
// }

// End XML file
echo '</markers>';

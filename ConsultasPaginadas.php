<?php
include_once ("gestionBD.php");

$pag_actual = ( isset($_SESSION["pag_actual"])) ? $_SESSION["pag_actual"] : 1;
$offset = 1;
$pag_actual = ( isset($_REQUEST["pag_actual"])) ? $_REQUEST["pag_actual"] : $pag_actual;

$tam_pag = 8;
$num_rows = totalQuery();

	$total_pages = ceil($num_rows / $tam_pag);
	if ( isset ($_REQUEST["avance"]) ) {
		if ($_REQUEST["avance"]=="◀") $pag_actual = $pag_actual - $offset; 
		if ($_REQUEST["avance"]=="◀◀") $pag_actual = 1;
		if ($_REQUEST["avance"]=="▶") $pag_actual = $pag_actual + $offset;
		if ($_REQUEST["avance"]=="▶▶") $pag_actual = $total_pages;
	}
	$_SESSION["pag_actual"] = $pag_actual;
	
	
function totalQuery() {
	global $conn;
	global $variable;
	global $query_SQL;
	try {
		return $conn -> query("SELECT COUNT(*) FROM ($variable)") -> fetchColumn();
	} catch ( PDOException $e ) { echo "Error at totalQuery(): $e->getMessage()";
	}
}
?>
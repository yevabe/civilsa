<?php
require("constants.php");
/*Función que conecta a la base de datos*/
function conectar(&$conn){
	$conn = mysqli_connect(DB_SERVER,DB_USER, DB_PASS, DB_NAME);
	if( $conn === false ) {
		die( print_r( mysqli_error(), true));
	}
	return $conn;
}
//Funcion para ejecutar consultas,insert o update
function executeQuery($conexion,$sql,$error,&$stmt){
	$stmt = mysqli_query($conexion,$sql) or die ($error.' <br>Error MYSQL: '.mysqli_error($conexion));
	return $stmt;
}
// Funcion para encapsular caracteres
function queryBinding($conn, $sql, $params,$error,&$stmt){
	$stmt = mysqli_query($conexion,$sql) or die ($error.' <br>Error MYSQL: '.mysqli_error($conexion));
	return $stmt;
}
//Funcion para cerrar la conexion
function closeConnection($stmt,$conexion){
	mysqli_free_result($stmt);
	mysqli_close($conexion);
}
//Funcion que trae el ultimo OID
function getInsertOid($stmt,&$oidReg){
	mysqli_result($stmt);
	mysqli_fetch_array($stmt);
	$oidReg =  mysqli_result($stmt, 0);
}
//Funcion que devuelve el Usuario
function returnUsu(&$usu){
	$usu = $_SESSION["session"];
}
/*Función que retorna la fecha y el equipo*/
function returnDate(&$fec,&$host){
    date_default_timezone_set("America/Bogota"); /*se define zona horaria*/
    $fec = date("Y-m-d H:i:s"); //Se guarda la hora en una variable
    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']); //se guarda el nombre del equipo en una variable
}
/*Función que returna los datos del usuario*/
function returnDateHost(&$fec,&$usu,&$host){
    date_default_timezone_set("America/Bogota"); /*se define zona horaria*/
    $fec = date("Y-m-d H:i:s"); //Se guarda la hora en una variable
    $usu = $_SESSION["session"];
    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']); //se guarda el nombre del equipo en una variable
}

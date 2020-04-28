<?php 
function countrecords($table){
	include("db_connect.php");
	$sql="SELECT * FROM $table ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	mysqli_close($con);
}
function rentcollected($table){
	include("db_connect.php");
	$sql="SELECT SUM(paid_amount) AS totalpaid FROM $table ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		foreach ($result as $sumkey => $sumvalue) {
			# code...
			echo ''.$sumvalue['totalpaid'].'';
		}	
	}
	mysqli_close($con);
}
function getbalances($table){
	include("db_connect.php");
	$sql="SELECT SUM(balance) AS allbalances FROM $table ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		foreach ($result as $balancekey => $balancevalue) {
			# code...
			echo ''.$balancevalue['allbalances'].'';
		}
	}
	mysqli_close($con);
}
function havingbalance($table){
	include("db_connect.php");
	$sql="SELECT * FROM $table WHERE balance>0 ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	mysqli_close($con);
}
function vaccanthouses($table){
include("db_connect.php");
$sql="SELECT * FROM $table WHERE status='vaccant' ORDER BY id";
if ($result=mysqli_query($con,$sql)) {
	# code...
	$rowcount=mysqli_num_rows($result);
	echo $rowcount;
}
mysqli_close($con);
}

 ?>
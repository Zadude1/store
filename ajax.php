<?php
session_start(); 


include 'class/settings.php';
$db = new Settings();


// ajax action for insert data
if($_REQUEST['case']=='add') {
	$id_r = $_SESSION["last_id"];
	$id_m = $_POST['materials'];
	$code = $_POST['code'];
	$measr = $_POST['measr'];
	$quan_unite1 = $_POST['quan_unite1'];
	$quan_frac1 = $_POST['quan_frac1'];
	$quan_unite2 = $_POST['quan_unite2'];
	$quan_frac2 = $_POST['quan_frac2'];
	$price = $_POST['price'];
	$units = $_POST['units'];
	$quan_receiv = $_POST['quan_receiv'];
	$add_user = $_SESSION["id"];
	$update_user = $_SESSION["id"];
	
	
	$insert = $db->insert("receipt_details",$id_r,$id_m, $code,$measr,$quan_unite1,$quan_frac1,$quan_unite2,$quan_frac2,$price,$units,$quan_receiv,$add_user,$update_user);
	
	if($insert) {
		$msg = "Data has inserted successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}

// ajax action for delete data
if($_REQUEST['case']=='delete') {
	$table_id = $_POST['table_id'];
	
	$delete = $db->delete("receipt_details",$table_id);
	
	if($delete) {
		$msg = "Data has deleted successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}

// ajax action for view data in modal when click on edit
if($_REQUEST['case']=='view') {
	$table_id = $_POST['table_id'];
	
	$view = $db->view("receipt_details",$table_id);
	
	if($view) {
		$row = $view->fetch_assoc();
		$return_arr = array(
			"id_rd" => $row["id_rd"],
			"id_r" => $row["id_r"],
			"id_m" => $row["id_m"],
			"code" => $row["code"],
			"measr" => $row["measr"],
			 "quan_unite1" => $row["quan_unite1"],
			 "quan_frac1" => $row["quan_frac1"],
			"quan_unite2" => $row["quan_unite2"],
			"quan_frac2" => $row["quan_frac2"],
			"price" => $row["price"],
			"units" => $row["units"],
			"quan_receiv" => $row["quan_receiv"],
			"add_user" => $row["add_user"],
			"update_user" => $row["update_user"],
			"c_date" => $row["c_date"],
			"u_date" => $row["u_date"]
			);
			
		echo json_encode($return_arr);
	}
}

// ajax action for update data
if($_REQUEST['case']=='edit') {
	$table_id = $_POST['id_rde'];


	$id_r = $_SESSION["last_id"];
	$id_m = $_POST['materialsEdit'];
	$code = $_POST['codee'];
	$measr = $_POST['measre'];
	$quan_unite1 = $_POST['quan_unite1e'];
	$quan_frac1 = $_POST['quan_frac1e'];
	$quan_unite2 = $_POST['quan_unite2e'];
	$quan_frac2 = $_POST['quan_frac2e'];
	$price = $_POST['pricee'];
	$units = $_POST['unitse'];
	$quan_receiv = $_POST['quan_receive'];
	$update_user = $_SESSION["id"];
	
	
	$update = $db->update("receipt_details",$table_id,$id_m
	,$code,$measr,$quan_unite1
	,$quan_frac1,$quan_unite2,$quan_frac2
	,$price,$units,$quan_receiv
	,$update_user);
	
	if($update) {
		$msg = "Data has updated successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}
?>
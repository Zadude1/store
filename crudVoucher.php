<?php
session_start(); 


include 'class/apiVoucher.php';
$db = new apiVoucher();


// ajax action for insert data
if($_REQUEST['case']=='add') {
	$id_e = $_SESSION["last_idV"];
	$id_m = $_POST['materials'];
	$measr = $_POST['measr'];
	$required_writing = $_POST['required_writing'];
	$quan_unite1 = $_POST['quan_unite1'];
	$quan_frac1 = $_POST['quan_frac1'];
	$quan_unite2 = $_POST['quan_unite2'];
	$quan_frac2 = $_POST['quan_frac2'];
	$price_units_f = $_POST['price_units_f'];
	$price_units_d = $_POST['price_units_d'];
	$price_all_f = $_POST['price_all_f'];
	$price_all_d = $_POST['price_all_d'];
	$spent_writing = $_POST['spent_writing'];
	
	$add_user = $_SESSION["id"];
	$update_user = $_SESSION["id"];
	
	
	$insert = $db->insert("exchange_details",
	$id_e,
	$id_m,
	$measr,
	$required_writing,
	$quan_unite1,
	$quan_frac1,
	$quan_unite2,
	$quan_frac2,
	$price_units_f,
	$price_units_d,
	$price_all_f,
	$price_all_d,
	$spent_writing,
	$add_user,
	$update_user);
	
	if($insert) {
		$msg = "Data has inserted successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}

// ajax action for delete data
if($_REQUEST['case']=='delete') {
	$table_id = $_POST['table_id'];
	
	$delete = $db->delete("exchange_details",$table_id);
	
	if($delete) {
		$msg = "Data has deleted successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}

// ajax action for view data in modal when click on edit
if($_REQUEST['case']=='view') {
	$table_id = $_POST['table_id'];
	
	$view = $db->view("exchange_details",$table_id);
	
	if($view) {
		$row = $view->fetch_assoc();
		$return_arr = array(
			"id_ed" => $row["id_ed"],
			"id_e" => $row["id_e"],
			"id_m" => $row["id_m"],
			"code" => $row["code"],
			"measr" => $row["measr"],
			"required_writing" => $row["required_writing"], 
			 "quan_unite1" => $row["quan_unite1"],
			 "quan_frac1" => $row["quan_frac1"],
			"quan_unite2" => $row["quan_unite2"],
			"quan_frac2" => $row["quan_frac2"],
			"price_units_f" => $row["price_units_f"],
			"price_units_d" => $row["price_units_d"],
			"price_all_f" => $row["price_all_f"],
			"price_all_d" => $row["price_all_d"],
			"spent_writing" => $row["spent_writing"],
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

	/* echo '<script> alert('.$_POST.')</script>'; */

	
	$table_id = $_POST['wqtable_id'];


	$id_e = $_SESSION["last_idV"];
	$id_m = $_POST['materialsEdit'];
	$code = $_POST['codee'];
	$measr = $_POST['measre'];
	$required_writing = $_POST['required_writinge'];
	$quan_unite1 = $_POST['quan_unite1e'];
	$quan_unite2 = $_POST['quan_unite2e'];
	$quan_frac1 = $_POST['quan_frac1e'];
	$quan_frac2 = $_POST['quan_frac2e'];
	$price_units_f = $_POST['price_units_fe'];
	$price_units_d = $_POST['price_units_de'];
	$price_all_f = $_POST['price_all_fe'];
	$price_all_d = $_POST['price_all_de'];
	$spent_writing = $_POST['spent_writinge'];
	$update_user = $_SESSION["id"];
	
	
	$update = $db->update("exchange_details",$table_id,$id_e,$id_m
	,$code,$measr,$required_writing,$quan_unite1
	,$quan_frac1,$quan_unite2,$quan_frac2
	,$price_units_f,$price_units_d,$price_all_f,$price_all_d,$spent_writing
	,$update_user);
	
	if($update) {
		$msg = "Data has updated successfully";
		$return_arr = array("msg" => $msg);
		echo json_encode($return_arr);
	}
}

<?php


include_once('functions.php');



/*if(!empty($_POST['add_amount'])){
	$add_amount= $_POST['add_amount'];
	addAmount($add_amount);
	return getCurrentBalance();
}

if(!empty($_POST['subtract_amount'])){
	$subtract_amount= $_POST['subtract_amount'];
	subtractAmount($subtract_amount);
	echo getCurrentBalance();
}
*/

if(!empty($_POST['action'])){
	$action=$_POST["action"];
}
	
if(!empty($_POST['amount'])){
	$amount=$_POST["amount"];
}

if(!empty($_POST['transactionToDelete'])){
	$transactionToDelete = 
			filter_var($_POST["transactionToDelete"],FILTER_SANITIZE_NUMBER_INT);
}
	
if($action=="addAmount"){
	if(!isset($amount) || trim($amount) == ''){
		echo '{"message":"please add"}';
	}
	else
		addAmount($amount);
}

if($action=="subtractAmount"){
	if(!isset($amount) || trim($amount) == ''){
		echo "please subtract amount";
	}
	else
		echo subtractAmount($amount);
}

if($action=="deleteTransaction"){
	if(!isset($transactionToDelete) || trim($transactionToDelete) == ''){
		echo "please subtract amount";
	}
	else
		echo deleteTransaction($transactionToDelete);
}

if($action=="getCurrentBalance"){
	echo getCurrentBalance();
}


	
if($action=="getAllValues"){
	getAllValues();
}















?>
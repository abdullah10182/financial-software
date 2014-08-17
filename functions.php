<?php

	include_once('connect.php');



	function getCurrentBalance(){
		$result = mysql_query("SELECT * FROM current_amount");
		$sum= 0;

		while ($row = mysql_fetch_assoc($result)) {
			 $value=$row['current_amount'];

			 $sum += $value;
		}
		return $sum;
	}


		function getAllValues(){
			$result = mysql_query("SELECT * FROM current_amount ORDER BY id DESC");
			while ($row = mysql_fetch_assoc($result)) {
				echo '<div class="float_left">', $row['current_amount'],'
				<button class="',$row["id"],'">Delete</delete></div>';
			}
		}


		function getLastTransaction(){
			$result = mysql_query("SELECT * FROM current_amount ORDER BY id DESC LIMIT 1");

			while ($row = mysql_fetch_assoc($result)) {
				echo $row['current_amount'];
			}
		}


		function addAmount($amount){
			if(mysql_query("INSERT INTO current_amount (current_amount) VALUES('$amount')")){
				
				$id_query = mysql_query("SELECT * FROM current_amount ORDER BY id DESC LIMIT 1");
				while ($row = mysql_fetch_assoc($id_query)) {
					 $lastTransaction=$row['current_amount'];
					 $id= $row['id'];
				}

				$current_balance=getCurrentBalance();

			echo '{"id": "',$id,'", "lastTransaction":"'
				 ,$lastTransaction,'","current_amount":"',$current_balance,'"}';
				
			}
			else
				echo "fail";

			}


		function subtractAmount($amount){
			$amount= -$amount;
			if(mysql_query("INSERT INTO current_amount (current_amount) VALUES('$amount')")){
				$amount=getLastTransaction();
				return $amount;
			}
			else
				echo "fail";

			}

		function deleteTransaction($transactionToDelete){
			if(mysql_query("DELETE FROM current_amount WHERE id=".$transactionToDelete)){
				echo $transactionToDelete;
			}
			else
				echo "failll";

		}




   




?>
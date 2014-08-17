$('body').on( 'click','#add_amount',function(e){
e.preventDefault();
	$("#loader").show();
	addAmount();
});

$('#subtract_amount').click( function(e){
	e.preventDefault();
	subtractAmount();
});

$(document).on('click','.float_left button', function(){
	$("#loader").show();
	transaction_row = $(this).attr('class');
	deleteTransaction(transaction_row);
//	console.log(transaction_row);
});



$(document).on('click','.close', function(){
	$(this).parent().stop(true,true).slideUp(200);
});



	function getCurrentBalance(){
		$.ajax({
			type:"post",
			url: "enter.php",
			data:"action=getCurrentBalance",
			success:function(data){
				 $("div#current_amount").html(data);
			//	 console.log(data);
			}
		});
	}

	function getAllValues(){
		$.ajax({
			type:"post",
			url: "enter.php",
			data:"action=getAllValues",
			success:function(data){
				 $("div#all_values").html(data);
				 console.log(data);
			}
		});
	}


	function addAmount(){
		var data = $(".form :input").serializeArray();
		var amount = data[0].value;
		//console.log(amount);
		$.ajax({
			type:"post",
			url: "enter.php",
			dataType: "json",
			data:"action=addAmount&amount="+amount,
			success:function(data){
				//$("div#current_amount").html(data);
				if(data.message){
					$("#loader").hide();
					$("#message").append(data.message).slideDown().delay(1500).fadeOut();
				} 
				else{
				$("#loader").hide();
				$("div#all_values").prepend(
					"<div class='float_left'>"+data.lastTransaction
					+" <button class='"+data.id+"'>Delete</button></div>");
				}
				$("#current_amount").html(data.current_amount);
			console.log(data);
			}
		});
	}


	function subtractAmount(){
		var data = $(".form1 :input").serializeArray();
		var amount = data[0].value;
		//console.log(amount);
		$.ajax({
			type:"post",
			url: "enter.php",
			data:"action=subtractAmount&amount="+amount,
			success:function(data){
				//$("div#current_amount").html(data);
			$("div#all_values").prepend("<div class='float_left'>"+data+"</div>");
			//console.log(data);
			}
		});
	}

	function deleteTransaction(transaction_row){
		console.log(transaction_row);
		$.ajax({
			type:"post",
			url: "enter.php",
			data:"action=deleteTransaction&transactionToDelete="+transaction_row,
			success:function(data){
				$("#loader").hide();
				console.log(data);
				$("button."+data).parent().fadeOut(200);
				//getAllValues();
				getCurrentBalance();

			}
		});
	}
	
window.addEventListener('load', function() {
    FastClick.attach(document.body);
}, false);





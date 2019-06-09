$( document ).ready(function() {
	
	// GET REQUEST
	$("#getAllCustomerId").click(function(event){
		event.preventDefault();
		ajaxGet();
	});
	
	// DO GET
	function ajaxGet(){
		
		$.ajax({
			type : "GET",
			url : "http://localhost:8080/users",
			dataType: 'json',
			contentType: 'application/json'
			 crossDomain: true,
			success: function(result){
				
					$('#getResultDiv ul').empty();
					var custList = "";
					$.each(result.data, function(i, customer){
						var customer = "- Customer with Id = " + i + ", firstname = " + customer.firstname.toString + ", lastName = " + customer[i].lastname + "<br>";
						$('#getResultDiv .list-group').append(customer)
			        });
					console.log("Success: ", result);
				
			},
			error : function(e) {
				$("#getResultDiv").html("<strong>Error</strong>");
				console.log("ERROR: ", e);
			}
		});	
	}
})
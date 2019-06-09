var btn = document.getElementById("btn") ;
var animalContainer=document.getElementById("page-content");

btn.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET','/');
    ourRequest.onload = function(){
		if(ourRequest.status >= 200 && ourRequest.status < 400){
			var ourData = JSON.parse(ourRequest.responseText); //first telll to interprt above data as json data so not only ourRequest.responseText but above line 
        renderHTML(ourData);
		}else{
			console.log("server error even after connection");
		}
  
        
};
	
	
	ourRequest.onerror= function(){
		console.log("Connection eror");	
	};

ourRequest.send();
	pageCounter++;
	if (pageCounter > 3){
		btn.classList.add("hide-me");
	}
});


function renderHTML(data){
	
/*	var htmlString = "this is a test";*/
	
	var htmlString = "";
	
	for (i=0; i< data.length; i++){
		htmlString += "<p>" + data[i].name + " is a " +data[i].species + "that likes to eat ";
		for (ii= 0; ii<data[i].foods.likes.length; ii++){
			if(ii==0){
				htmlString += data[i].foods.likes[ii];
			}else{
				htmlString += " and " + data[i].foods.likes[ii];	
			}
		}
		
		htmlString += " and dislikes ";
		
		for (ii= 0; ii<data[i].foods.dislikes.length; ii++){
			if(ii==0){
				htmlString += data[i].foods.dislikes[ii];
			}else{
				htmlString += " and " + data[i].foods.dislikes[ii];	
			}
		}
		
		htmlString +=".</p>"
	}
	animalContainer.insertAdjacentHTML('beforeend', htmlString);
}

 $("#number").focusout(function(){
        $.ajax({
           type:"GET",
           url:"localhost:8080/users",
           success: function(data) {
               //Response from the controller comes here
               var json = JSON.stringify(data);
               //Bind it to fields like these
               $("#firstname").val(json.firstname);
           }
        });
  });*/
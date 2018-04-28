$('#nivel').change(function(event){
$.get("/create/"+event.target.value+"",function(response, state){
console.log(response);

for(i=0; i<response.length; i++ ){
	$('#asignatura').append("<option value='"+response[i].as_id+"'>"+response[i].as_nombre+"</option>")
}

});

});

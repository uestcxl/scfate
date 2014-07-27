function showBox(item){
	for(var i=1;i<arguments.length;i++){
		document.getElementById("nav_"+arguments[i]+"_concent").style.display="none";
		document.getElementById("nav_"+arguments[i]).className="no";
	}
	document.getElementById("nav_"+item+"_concent").style.display="block";
	document.getElementById("nav_"+item).className="select";   
}
function showButton(item){
	for(var i=1;i<arguments.length;i++){
		document.getElementById("nav_"+arguments[i]+"_content").style.display="none";
		document.getElementById("nav_"+arguments[i]).className="no";
	}
	document.getElementById("nav_"+item+"_content").style.display="block";
	document.getElementById("nav_"+item).className="select"; 
}

$(document).ready(function(){
	$('.click').click(function(){
		$('.pop_bg').show();
		$('.edit_pop').show();
	});
});
$(document).ready(function(){
	$('.delete').click(function(){
		$('.pop_bg').show();
		$('.pop_delete').show();
	});
});
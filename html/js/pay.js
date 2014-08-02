$(function(){ 
	$(".add").click(function(){ 
		var t=$(this).parent().find('.text_box'); 
		t.val(parseInt(t.val())+1) 
		setTotal(); 
	}) 

	$(".min").click(function(){ 
		var t=$(this).parent().find('.text_box'); 
		t.val(parseInt(t.val())-1) 
			if(parseInt(t.val())<0){ 
				t.val(0); 
			} 
			setTotal(); 
	}) 


function setTotal(){ 
      var sum=0;
$(" .table_section").each(function(){ 	
	var num=Number($(this).find('.text_box').val());
	var price=Number($(this).find('.price').text());
	
	  sum+=num*price;
	
	}); 
$("#total").html(sum.toFixed(2)); 
} 
setTotal(); 

}) 
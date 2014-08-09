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
	var price=0;
	var num=Number($(this).find('.text_box').val());
	var price_item=Number($(this).find('.price_item').text());
	price=price_item*num;
	$(this).find('.price').html(price.toFixed(2));
	// console.log(price);
	sum+=price;
	}); 

	$("#total").html(sum.toFixed(2));

	}
	setTotal();
}) ;


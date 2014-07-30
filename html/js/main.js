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
$(document).ready(function(){  
    var t = $("#text_box");  
 	
    $("#add").click(function(){       
        t.val(parseInt(t.val())+1)  
       
    })  
    $("#min").click(function(){  
       t.val(parseInt(t.val())-1)  
    
    }) ;
    
});
$(document).ready(function(){
		$('.model').each(function(){
			var i=$(this);
			var p=i.find('li');
			p.focus(function(){
				$(this).css('border','2px solid red');
			});
			p.click(function(){
				if(!!$(this).hasClass('highlight')){
					$(this).removeClass('highlight');
				}else{
					$(this).addClass('highlight').siblings('li').removeClass('highlight');
					$(this).unbind('focus');
				}

				
			});
		});
});
$(document).ready(function(){

	var cart = [];
	

	$('.shopping_cart').click(function(){
		var goods = {};
		goods.type = $(".button").find(".shopping_cart").attr("type");
		goods.model = $(".model").find(".highlight a").text();
		goods.num = parseInt($("#text_box").val(), 10);

		if(cart.length != 0){
			for(var i = 0; i < cart.length; i++){
				if(cart[i].type == goods.type && cart[i].model == goods.model){
					cart[i].num = cart[i].num + goods.num
				}else {
					goods.cid = ParseInt(Math.random() * 100000, 10);
					cart.push(goods);
				}
			}
		}else {
			cart.push(goods);
		}
		console.log(cart);
	})
	
})
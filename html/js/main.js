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
        if(parseInt(t.val())<0){ 
				t.val(0); 
			}  
       
    })  
    $("#min").click(function(){  
       t.val(parseInt(t.val())-1) 
       if(parseInt(t.val())<0){ 
			t.val(0); 
		}  
    
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

	$('.shopping_cart').click(function(){
		var goods = {};
		goods.type = $(".product_name").attr("type");
		goods.model = $(".model").find(".highlight a").text();
		goods.num = parseInt($("#text_box").val(), 10);
		goods.cid = $(".product_name").attr('cid');
		if(!goods.model){
			alert('请选择型号');
		}
		$.ajax({
			type:'post',
			url:'',
			data:'goods',
			datatype:'json',
			success:function(data,status){
				console.log(goods);
			},
		});
	});
	$('#delete').click(function(){
			var goods_delete={};
			goods_delete.type=$('.product_name').attr();
			goods_delete.model=$('.model').text();
			goods_delete.num=parseInt($(".text_box").val(), 10);
			goods_delete.cid=$('.product_name').attr('cid');

			$.ajax({
				type:'post',
				url:'',
				data:'goods_delete',
				datatype:'json',
				success:function(data,status){
				console.log(goods_delete);
			},
			});
	});
});

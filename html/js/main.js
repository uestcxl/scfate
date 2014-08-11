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
		goods.type =Number($(".product_name").attr("type"),10); 
		goods.model = $(".model").find(".highlight a").text();
		goods.num = parseInt($("#text_box").val(), 10);
		goods.cid = parseInt($(".product_name").attr('cid'),10);

			if((goods.type==0) && (!goods.model)){
				alert('请选择型号');
			}
			else{
				$.ajax({
					type:'post',
					// url:'http://localhost/scfate/index.php?r=cart/create',
					url:'http://www.stcy1688.com/index.php?r=cart/create',
					data:{
						'goods':goods
					},
					datatype:'json',
					success:function(data,status){
						// console.log(goods);
						if (status=='success') {
							switch(data){
								case '0':
									alert('您还木登录！');
									// window.location.href="http://localhost/scfate/index.php?r=site/login";
									window.location.href="http://www.stcy1688.com/index.php?r=site/login";
									break;
								case '1':
									alert('加入购物车成功~点右上方购物车查看~Orz');
									break;
								case '2':
									alert('还没有填对值哦');
									break;
								default:
									alert('出了一点点问题~Orz!!');
									break;
							}
						};
					},
				});
			}
	});

	$('.collect').click(function(){
		var collect={};
		collect.type=Number($(".product_name").attr('type'),10);
		collect.cid=parseInt($(".product_name").attr('cid'));
		$.ajax({
			// url: 'http://localhost/scfate/index.php?r=user/createcollect',
			url: 'http://www.stcy1688.com/index.php?r=user/createcollect',
			type:'post',
			data: {
				'collect':collect
			},
			success:function(data,status){
				if (status=='success') {
					switch(data){
						case '0':
						alert('您还木登录！');
						window.location.href="http://localhost/scfate/index.php?r=site/login";
						// window.location.href="http://www.stcy1688.com/index.php?r=site/login";
						break;
						case '1':
							alert('参数错误！');
							break;
						case '2':
							alert('添加成功！');
							break;
						case '3':
							alert('您已添加过此商品！');
							break;
						default:
							// alert('添加失败！Orz')
							alert('出了一点点问题~Orz')
							break;
					}
				};
			}
		})
	});

	$('.delete').click(function(){
			var goods_delete={};
			goods_delete.type=Number($('.product_name').attr('type'));
			goods_delete.model=$('.model').attr('modelname');
			goods_delete.cid=parseInt($('.product_name').attr('cid'));

			$.ajax({
				type:'post',
				// url:'http://localhost/scfate/index.php?r=cart/delete',
				url:'http://www.stcy1688.com/index.php?r=cart/delete',
				data:{'goods_delete':goods_delete},
			success:function(data,status){
				if (status=='success') {
					switch(data){
						case '0':
							alert('您还木登录！');
							// window.location.href="http://localhost/scfate/index.php?r=site/login";
							window.location.href="http://www.stcy1688.com/index.php?r=site/login";
							break;
						case '1':
							alert('删除成功');
							location.reload();
							break;
						case '2':
							alert('参数错误！');
							break;
						default:
							alert('出了一点点问题~Orz');
							// alert(data);
							break;
					}
				};
			},
			});
	});
	$('.next_button').click(function(){
		var goods_detail=new Array();

		var table_section=$('.table_section');
		var i=0;
		$('.table_section').each(
		function(){
			goods_detail[i]={};
			goods_detail[i].cid=$(this).find('.product_name').attr('cid');
			goods_detail[i].type=$(this).find('.product_name').attr('type');
			goods_detail[i].model=$(this).find('.model').text();
			goods_detail[i].num = $(this).find(".text_box").val();
			i++;
		}
		);
		
		var total=$("#total").text();
		goods=JSON.stringify(goods_detail);

		$.cookie('total',total,{expires:1,path:'/'})
		$.cookie('cookieName',goods,{expires:1,path:'/'});
		if ($.cookie('cookieName')!=null) {
			// window.location.href="http://localhost/scfate/index.php?r=cart/second";			
			window.location.href="http://www.stcy1688.com/index.php?r=cart/second";			
		};
	})

 	var $radio=$('input[name="address_choose"]:radio');
		$radio.click(function(){
		address=$(this).val();
		});

	$('.order').click(function(){
			if (!window.address) {
				alert('您还没有选择收货地址！！这让老板怎么发货！！');
			}
			else{
				edit_text=$('form textarea').val();
				goods=$.cookie('cookieName');
				goods=JSON.parse(goods);
				i=goods.length;
				goods[i]={};
				goods[i].eidt_text=edit_text;
				goods[i].address=address;
			
				goods=JSON.stringify(goods);

				$.ajax({
					type:'post',
					// url:'http://localhost/scfate/index.php?r=cart/createorder',
					url:'http://www.stcy1688.com/index.php?r=cart/createorder',
					data:{'goods':goods},
					success:function(data,status){
					console.log(goods);
					if (status=='success') {
						switch(data){
							case '0':
								alert('您还木登录！');
								// window.location.href="http://localhost/scfate/index.php?r=site/login";
								window.location.href="http://www.stcy1688.com/index.php?r=site/login";
								break;
							case '1':
								alert('参数错误！');
								break;
							case '2':
								alert('下单成功！请到您的个人中心查看您的订单状态！');
								// window.location.href="http://localhost/scfate/index.php?r=cart/success";
								window.location.href="http://www.stcy1688.com/index.php?r=cart/success";
								break;
							default:
								alert('出了一点点问题~Orz');
								// alert(data);
								break;
						}
					};
				},
			});
			}
	})
});

// 搜索ajax
/*$(document).ready(function() {
	$('#search_item').click(function() {
		var search_content=$('.search_content').val();
		$.ajax({
			url: 'http://localhost/scfate/index.php?r=site/search',
			type: 'GET',
			data: {search_content: 'search_content'},
			success:function(data,status){
				console.log(search_content);
				if (status=='success') {
					switch('data'){
						default:
						alert(data);
						break;
					}
				}
				else{
					alert('fail,error:'+data);
				}
			}
		})
	});	
});*/
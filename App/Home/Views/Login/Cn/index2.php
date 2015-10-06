<?php 
   
   $sku_item=Array(
   		 
   		    '颜色'=>Array(
   		    		   0=>'白色',
   		    		   1=>'红色',
   		    		   2=>'黑色',
   		    		),
   		    '重量'=>Array(
   		    		0=>'1kg',
   		    		1=>'2kg',
   		    		2=>'3kg',
   		    ),
	   		'尺寸'=>Array(
	   				0=>'21',
	   				1=>'23',
	   				2=>'25',
	   		),
   		
   		);
   print_r($sku_item);
   $sku_item=json_encode($sku_item);
   echo
   "<script>
   sku_item=$sku_item;
   </script>";
?>


<style type="text/css">

li{
    list-style-type:none;
    padding:0;
    margin:0;
}

ul{
    list-style-type:none;
    padding:0;
    margin:0;
}
</style>
<div>
    <div>
     <div class='sku_name' style='display:none'>    
     
     </div>
    </div>
	<div class='product_sku' style='display:none'>
		<input class='input_product_sku' type=text value=''>
		<li>颜色</li>
		<li>重量</li>
	    <li>尺码</li>
	    <li>尺寸</li>
	</div>
	<div class="add_product_sku"><input type=button value='添加商品规格'></div>
	<div class="get_table"><input type=button value='确定'></div>
</div>
<script>

		$('.add_product_sku').click(function(){

				$('.product_sku').show();
				$('li').show();
				$('.input_product_sku').val('');
			});
		$('li').click(function(){

               var select=$(this).html();
               if(select){
            	  $('li').hide();
				  $('.input_product_sku').val(select).focus();
				 				  
               }
			});
		var sku=new Array();
		
		 $('.input_product_sku').blur(function(){//不存在的规格是否要入库？
             var sku_name=$('.input_product_sku').val();
             alert(sku_name);
             //判断是否已经选择过    
             if(sku_name==''){
            	 $('.product_sku').hide();
            	 return false;
                 }
            
             
             if(sku.indexOf(sku_name) >= 0){
 				alert('请勿重复选择');
 				$('.input_product_sku').val('');
 				 $('li').show();
 				return false;
              }
             sku.push(sku_name);
           
            // alert(sku_item[sku_name].length);
            
             var add_sku_item_html='';
             
             if(sku_item[sku_name].length>0){
	             for(var i=0;i<sku_item[sku_name].length;i++){
	
	            	 add_sku_item_html += "<ul sku_name="+sku_name+">"+sku_item[sku_name][i]+"</ul>";
	             }
             }
             alert(add_sku_item_html);
             add_sku_item_html="<div class='product_sku_item' style='display:none' sku_name="+sku_name+" ><input class='input_product_sku_item' type=text value='' sku_name="+sku_name+">"+add_sku_item_html+"</div>";
             alert(add_sku_item_html);
             var append_html="<div class='sku_name'>"+sku_name+"<input class='add_product_sku_item' type='button' value='添加' sku_name="+sku_name+">"+add_sku_item_html+"</div>";
			 $('.sku_name').append(append_html);
			 $('.product_sku').hide();
			 $('.sku_name').show();
	     });

		   $('.add_product_sku_item').live('click',function(){

			  
               var sku_name=$(this).attr('sku_name');  
               //alert(sku_name);
              $('.product_sku_item').each(function(){

                      if($(this).attr('sku_name')==sku_name)
                          $(this).toggle();
                        
                  });
			 });            

          //
         
          $('ul').live('click',function(){

	          var sku_name=$(this).attr('sku_name');
        	  var select=$(this).html();
              if(select){
           	  $('ul').hide();
				 $('.input_product_sku_item').each(function(){

                           if($(this).attr('sku_name')==sku_name){
									$(this).val(select).focus();
                               }
					 });
				 				  
              }
      });
          $('.input_product_sku_item').live('click',function(){
              alert('hello');
        	  var sku_name=$(this).attr('sku_name');
        	  var select=$(this).val();
        	  $('.sku_name').each(function(){

                       if($(this).attr('sku_name')==sku_name){

 							$(this).append("<p>"+select+"</p>");
                           }

            	  });
              });
	     //生成表格
	     
	     $('.get_table').click(function(){

  				alert(sku);
		 });
	     
	     

</script>
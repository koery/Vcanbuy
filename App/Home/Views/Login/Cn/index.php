 <li data-name-type="水果" data-value="苹果">苹果</li>
  <li data-name-type="水果" data-value="香蕉">香蕉</li>
   <li data-name-type="水果" data-value="梨子">梨子</li>
    <li data-name-type="水果" data-value="葡萄">葡萄</li>
    <script type="text/javascript">
       $(function(){

    	   
              $('li').each(function(){

					alert($(this).data("type")+"=>"+$(this).data("value"));
                  });

             
           })
</script>
    
   
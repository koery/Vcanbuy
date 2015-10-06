$(function () {
    $(".input_int").keyup(function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).bind("paste",function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).css("ime-mode", "disabled");  

    $(".input_numeric").keyup(function(){    
            $(this).val($(this).val().replace(/[^0-9.]/g,''));    
        }).bind("paste",function(){   
            $(this).val($(this).val().replace(/[^0-9.]/g,''));     
        }).css("ime-mode", "disabled");  
});

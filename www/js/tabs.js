/***************************/  
//@Author: Adrian "yEnS" Mato Gondelle &amp;amp;amp; Ivan Guardado Castro  
//@website: www.yensdesign.com  
//@email: yensamg@gmail.com  
//@license: Feel free to use it, but keep this credits please!  
/***************************/  
  
$(document).ready(function(){  
    $(".menu > li").click(function(e){  
        switch(e.target.id){  
            case "new":  
                //change status &amp;amp;amp; style menu  
                $("#new").addClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").removeClass("active");  
                //display selected division, hide others  
                $("div.new").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.ranking").css("display", "none");  
            break;  
            case "browse":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").addClass("active");  
                $("#ranking").removeClass("active");  
                //display selected division, hide others  
                $("div.browse").fadeIn();  
                $("div.new").css("display", "none");  
                $("div.ranking").css("display", "none");  
            break;  
            case "ranking":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").addClass("active");  
                //display selected division, hide others  
                $("div.ranking").fadeIn();  
                $("div.new").css("display", "none");  
                $("div.browse").css("display", "none");  
            break;  
        }  
        //alert(e.target.id);  
        return false;  
    });  
});  



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
                $("#moderator").removeClass("active");  
                $("#usrcntrl").removeClass("active");  
                $("#kebapowner").removeClass("active");
                //display selected division, hide others  
                $("div.new").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.ranking").css("display", "none");
                $("div.moderator").css("display", "none");  
                $("div.usrcntrl").css("display", "none");  
                $("div.kebapowner").css("display", "none");  
            break; 
            case "browse":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").addClass("active");  
                $("#ranking").removeClass("active");
                $("#moderator").removeClass("active");  
                $("#usrcntrl").removeClass("active");  
                $("#kebapowner").removeClass("active");
                //display selected division, hide others  
                $("div.browse").fadeIn();  
                $("div.new").css("display", "none");  
                $("div.ranking").css("display", "none");
                $("div.moderator").css("display", "none");  
                $("div.usrcntrl").css("display", "none");  
                $("div.kebapowner").css("display", "none");  
            break; 
            case "ranking":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").addClass("active");
                $("#moderator").removeClass("active");  
                $("#usrcntrl").removeClass("active");  
                $("#kebapowner").removeClass("active");
                //display selected division, hide others  
                $("div.ranking").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.new").css("display", "none");
                $("div.moderator").css("display", "none");  
                $("div.usrcntrl").css("display", "none");  
                $("div.kebapowner").css("display", "none");  
            break;
            case "moderator":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").removeClass("active");
                $("#moderator").addClass("active");  
                $("#usrcntrl").removeClass("active");  
                $("#kebapowner").removeClass("active");
                //display selected division, hide others  
                $("div.moderator").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.new").css("display", "none");
                $("div.ranking").css("display", "none");
                $("div.usrcntrl").css("display", "none");  
                $("div.kebapowner").css("display", "none");  
            break;
            case "usrcntrl":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").removeClass("active");
                $("#moderator").removeClass("active");  
                $("#usrcntrl").addClass("active");  
                $("#kebapowner").removeClass("active");
                //display selected division, hide others  
                $("div.usrcntrl").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.ranking").css("display", "none");
                $("div.moderator").css("display", "none");  
                $("div.new").css("display", "none");  
                $("div.kebapowner").css("display", "none");  
            break; 
            case "kebapowner":  
                //change status &amp;amp;amp; style menu  
                $("#new").removeClass("active");  
                $("#browse").removeClass("active");  
                $("#ranking").removeClass("active");
                $("#moderator").removeClass("active");  
                $("#usrcntrl").removeClass("active");  
                $("#kebapowner").addClass("active");
                //display selected division, hide others  
                $("div.kebapowner").fadeIn();  
                $("div.browse").css("display", "none");  
                $("div.ranking").css("display", "none");
                $("div.moderator").css("display", "none");  
                $("div.usrcntrl").css("display", "none");  
                $("div.new").css("display", "none");  
            break; 
        }  
        //alert(e.target.id);  
        return false;  
    });  
});  




//Toggle for registration usr.php
$(document).ready(function(){
    $("#treg").hide();
    $("a.trego-tregc").click(function () {
    $("#treg").slideToggle("slow");
});
});

//Toggle for login usr.php
$(document).ready(function(){
    $("#tlogin").hide();
    $("a.tlogino-tloginc").click(function () {
    $("#tlogin").slideToggle("slow");
});
});
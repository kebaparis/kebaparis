
//Toggle for registration usr.php
$(document).ready(function(){
    $("#treg").hide();
    $("a.rego-regc").click(function () {
    $("#treg").slideToggle("slow");
});
});

//Toggle for login usr.php
$(document).ready(function(){
    $("#tlogin").hide();
    $("a.logino-loginc").click(function () {
    $("#tlogin").slideToggle("slow");
});
});
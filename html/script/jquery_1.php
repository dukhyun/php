<?php
$local_url = '../';
$web_title = 'PHP 연습장';
$nav_array = array();
$nav_array[Home] = $local_url.'';
include $_SERVER['DOCUMENT_ROOT'].'/../section/header.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        alert('button clicked');
    });
	
    $("#button1").click(function(){
        $("#div1").fadeIn();
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
    });
	
	$("#button2").click(function(){
        $("#div1").fadeOut();
        $("#div2").fadeOut("slow");
        $("#div3").fadeOut(3000);
    });
	
	$("#button3").click(function(){
        $("#div1").fadeToggle();
        $("#div2").fadeToggle("slow");
        $("#div3").fadeToggle(3000);
    });
	
	$("#button4").click(function(){
        $("#div1").slideDown();
        $("#div2").slideDown("slow");
        $("#div3").slideDown(3000);
    });
	
	$("#button5").click(function(){
        $("#div1").slideUp();
        $("#div2").slideUp("slow");
        $("#div3").slideUp(3000);
    });
	
	$("#div1").mouseenter(function(){
        $("#div1").slideUp();
    });
	
	$("#div3").mouseleave(function(){
        $("#div3").slideUp(3000);
    });
	
	$("#div2").click(function(){
        $("#div2").slideUp("fast");
    });
	
	$("#reset").click(function(){
        $("#div1").css('display', 'none');
        $("#div2").css('display', 'none');
        $("#div3").css('display', 'none');
    });
});
</script>

<p>fadeIn </p>

<button id="button1">Click to fade in boxes</button><br><br>
<button id="button2">Click to fade out boxes</button><br><br>
<button id="button3">Click to fade toggle boxes</button><br><br>
<button id="button4">Click to slide down boxes</button><br><br>
<button id="button5">Click to slide up boxes</button><br><br>
<button id="reset">Reset boxes</button><br><br>

<div id="div0" style="width:80px;height:80px;display:none;background-color:black;"></div><br>
<div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
<div id="div2" style="width:80px;height:80px;display:none;background-color:green;"></div><br>
<div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/../section/footer.php'; ?>
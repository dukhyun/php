<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/jquery-ui.css">

<script>
$(document).ready(function(){
    $("#autocomplete-input").autocomplete({
        source: ['남기웅', '윤석민', '김혜관', '김효선', '김종찬', '진두환', '김덕현'],
    });
	
	// http://api.jqueryui.com/autocomplete/
});
</script>
</head>
<body>

<div style="margin-left:500px;">
<p>자동완성이 되는 입력 창입니다 </p>
<input type="text" id="autocomplete-input">
</div>
</body>
</html>
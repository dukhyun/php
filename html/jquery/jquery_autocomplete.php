<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/jquery-ui.css">
<style>
.ui-autocomplete {
	/* max-height: 300px; overflow-y: auto; overflow-x: hidden; */
}
</style>

<script>
$(document).ready(function(){
    $("#autocomplete-input").autocomplete({
        //source: getAutocompleteSource(),
		search: function() {
			var input = $("#autocomplete-input").val();
			$("#autocomplete-input").autocomplete('option', 'source', getAutocompleteSource(input));
		},
		delay: 0,
    });
	
	// http://api.jqueryui.com/autocomplete/
});

function getAutocompleteSource(userInput) {
	var source;
	$.ajax({
		//url: 'autocomplete.php',
		url: 'words.php',
		async: false,
		// dataType: 'json',
		data: {
			// 
			input: userInput
		}, // $_GET['input']
		success : function(result) {
			// alert(result);
			// source = result.split(' ');
			result = JSON.parse(result);
			source = result;
		},
		error: function(xhr) { }
	});
	return source;
}
</script>
</head>
<body>

<div style="margin-left:500px;">
<p>자동완성이 되는 입력 창입니다 </p>
<input type="text" id="autocomplete-input">
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.timer {
	display: block;
	margin:0 auto;
	margin-top: 100px;
	font-size: 4em;
	text-align: center;
}
</style>
<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery.countdown.js"></script>
<script>
$(document).ready(function() {
	window.onbeforeunload = function() {
		return "나갈거야?"
	};
	
	window.onunload = function() {
		return;
	};
	
	function disableF5(e) {
		if ((e.which || e.keyCode) == 116) {
			e.preventDefault();
		}
	}
	$(document).on("keydown", disableF5);
	
	function flick() {
		var newNode = flash.cloneNode(true);
		newNode.id = flash.id + '1';
		flash.parentNode.replacechild(newNode, flash);
		// new Node.className = 'timer mytimer';
	}
	
	$('#timer').countdown(Date.now() + 10000, function(event) {
		var remainingSecondsString = event.strftime('%-S');
		$(this).text(remainingSecondsString);
		if (parseInt(remainingSecondsString) == 0) {
			$(this).text('Time Over');
		} else if (parseInt(remainingSecondsString) % 2 == 0) {
			$(this).css('color', 'red');
		} else {
			$(this).css('color', 'blue');
		}
	});
});
</script>
</head>
<body>
	<span id="timer" class="timer">Waiting...</span>
	<span id="flash" class="timer">Flash</span>
</body>
</html>
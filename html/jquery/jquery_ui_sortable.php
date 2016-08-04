<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>jQuery UI Sortable - Default functionality</title>
<link rel="stylesheet" href="/jquery/themes/base/jquery-ui.css">
<script type="text/javascript" src="/jquery/jquery-1.11.2.js"></script>
<script type="text/javascript" src="/jquery/jquery-ui.js"></script>
<script>
$(function() {
	$("#sortable").sortable();
	$("#sortable").disableSelection();
});
</script>
<style>
.main {
	width: 500px;
	margin: auto;
	margin-top: 100px;
}
#sortable {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
#sortable li {
	padding: 0.4em;
	border: 1px solid;
	margin: 3px;
}
#sortable li span { font-size: 1.4em; }
</style>
</head>
<body>
<div class="main">
	<h1>sorttable</h1>
	<ul id="sortable">
		<li>
			<span>Item 1</span>
		</li>
		<li>
			<span>Item 2</span>
		</li>
		<li>
			<span>Item 3</span>
		</li>
		<li>
			<span>Item 4</span>
		</li>
		<li>
			<span>Item 5</span>
		</li>
		<li>
			<span>Item 6</span>
		</li>
		<li>
			<span>Item 7</span>
		</li>
	</ul>
</div>

</body>
</html>
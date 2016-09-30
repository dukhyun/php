<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<script>
var regex = /"([a-z_]+)"/;
var text = "<span class=\"my_class\">";
var text = '<span class="my_class">';
var result = text.match(regex);
document.write(result);
</script>
</body>
</html>
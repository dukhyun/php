<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script>
function checkForm(form, phone) {
	var re = /123/;
	if (!re.test(phone.value)) {
		alert('123만 입력');
		phone.focus();
		return false;
	}
	
	alert('전화번호:', phone.value);
	return true;
}
</script>
</head>
<body>

<form>
	<input type="text" name="phone">
	<input type="button" value="click" onclick="checkForm(this.form, this.form.phone);">
</form>

</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script>
function checkForm(form, phone) {
	var re = /[0-9]/;
	// test('123')->true
	if (!re.test(phone.value)) {
		alert('false : ' + phone.value);
		phone.focus();
		return false;
	}
	alert('true : ' + phone.value);
	phone.focus();
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
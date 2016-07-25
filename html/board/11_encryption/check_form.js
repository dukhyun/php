function checkRegisterForm(form, id, password, password2) {
	// var id = document.getElementByName("id").value;
	// var password = document.getElementByName("password").value;
	// var password2 = document.getElementByName("password2").value;
	// alert('check_form.js 호출');
    // 빈칸 검사
	if (id.value == '' || password.value == '') {
        alert('아이디와 비밀번호는 빈칸 안됨');
        return false;
    }
    // id 검사
    var re = /^\w+$/; 
    if(!re.test(id.value)) {
        alert('아이디는 숫자와 영문자, _ 만 가능함'); 
        id.focus();
        return false; 
    }
	// 암호 확인
    if (password.value != password2.value) {
        alert('암호 확인이 맞지 않음');
        password.focus();
        return false;
    }

    // 해쉬 값을 포함할 요소 생성
    var hash = document.createElement("input");
    form.appendChild(hash);
    hash.name = "hash";
	hash.type = "hidden";
    hash.value = hex_sha512(password.value);
	// hash.value = password.value;
	
    password.value = '';
    password2.value = '';
	
    form.submit();
    return true;
}

function checkLoginForm(form, id, password) {
	if (id.value == '' || password.value == '') {
		alert('아이디와 비밀번호를 입력해주세요.');
		return false;
	}
	
	var hash = document.createElement('input');
	form.appendChild(hash);
	hash.name = 'hash';
	hash.type = 'hidden';
	hash.value = hex_sha512(password.value);
	
	password.value = '';
	
	form.submit();
	return true;
}
function checkRegisterForm(form, id, password, password2) {
    // 빈칸 검사
	if (id.value == '' || password.value == '') {
        alert('아이디와 비밀번호는 빈칸 안됨');
        return false;
    }
	
	// id 길이
    if (id.value.length < 1) {
        alert('아이디는 4자리 이상이여야함');
        id.focus();
        return false;
    }
    // id 검사
    var re = /^\w+$/; 
    if(!re.test(id.value)) {
        alert('아이디는 숫자와 영문자만 가능함'); 
        id.focus();
        return false; 
    }

	// pw 길이
    if (password.value.length < 1) {
        alert('암호는 6자리 이상이여야함');
        password.focus();
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
	// 빈칸 검사
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
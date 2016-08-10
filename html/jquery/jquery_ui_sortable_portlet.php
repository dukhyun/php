<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>JQuery UI Sortable 뽀대나는 버전</title>
<link rel="stylesheet" href="/jquery/jquery-ui-1.12.0.custom/jquery-ui.css" />
<style>
.column {
	width: 260px;
	height: 300px;
	float: left;
	padding-bottom: 100px;
}
.portlet {
	margin: 0 1em 1em 0;
	padding: 0.3em;
}
.portlet-header {
	padding: 0.2em 0.3em;
	margin-bottom: 0.5em;
	position: relative;
}
.portlet-toggle {
	position: absolute;
	top: 50%;
	right: 0;
	margin-top: -8px;
}
.portlet-content {
	padding: 0.4em;
}
.portlet-placeholder {
	border: 1px dotted black;
	margin: 0 1em 1em 0;
	height: 50px;
}
</style>
<script type="text/javascript" src="/jquery/jquery-ui-1.12.0.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="/jquery/jquery-ui-1.12.0.custom/jquery-ui.js"></script>
<script>
$( function() {
$(".column").sortable({
	connectWith: ".column",
	handle: ".portlet-header",
	cancel: ".portlet-toggle",
	placeholder: "portlet-placeholder ui-corner-all"
});

$(".portlet")
	.addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
	.find(".portlet-header")
	.addClass("ui-widget-header ui-corner-all")
	.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span> ");

	$(".portlet-toggle").on("click", function() {
		var icon = $(this);
		icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
		icon.closest(".portlet").find(".portlet-content").toggle();
	});
});
</script>
</head>
<body>
<div style="width:800px; height: 600px;margin:auto; margin-top:100px; border: 1px solid; padding: 10px;">
<div class="column"> 
	<div class="portlet">
		<div class="portlet-header">날씨 정보</div>
		<div class="portlet-content">기온이 매우 높아서 탈수 현상에 주의해야 합니다. 야외에서의 장시간에 걸친 무리한 활동을 권장합니다. </div>
	</div>
	<div class="portlet">
		<div class="portlet-header">경제 전망</div>
		<div class="portlet-content">저성장, 저고용시대가 계속되어서 흙수저들의 삶은 항상 힘들 것이 확실합니다. 추천 투자종목은 로또입니다.</div>
	</div> 
</div>
 
<div class="column"> 
	<div class="portlet">
		<div class="portlet-header">PHP 프로그래밍</div>
		<div class="portlet-content">자바스크립트와 제이쿼리에 맨붕해서 PHP가 무엇인지도 잊어버린 상황인 듯 하다.</div>
	</div>
	<div class="portlet">
		<div class="portlet-header">먹방</div>
		<div class="portlet-content">방송국마다 먹방이 판을 치고 있다. 현대인은 심한 스트레스를 해소하기 위해 말초적 욕구에 매달리게 된다고 한다. 먹방을 food porno라고 칭하는 것은 그러한 맥락에서이다.</div>
	</div> 
</div>
 
<div class="column"> 
	<div class="portlet">
		<div class="portlet-header">일본어투</div>
		<div class="portlet-content">빨리 숙제를 끝내지 않으면. 따,딱히 너를 위해서 준비한 건 아니니까, 착각하면 안돼. 혹시 난 처...천재? (쿨럭), (퍽), (후다닥), (털썩) 음...오덕문화를 크게 좋아하진 않지만 즐기는 편이랄까 (웃음)  </div>
	</div>
</div>
</div>
</body>
</html>
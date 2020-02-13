$(document).ready(function(){
  $(".submit_btn").click(function(){
	var port = $("#selection option:selected").val();
//	alert(port);
	var vurl = $(".box_url_input").val();
//	alert(vurl);
	var furl = port + vurl;
	$("#iframe").attr("src",furl);
  });
});




 
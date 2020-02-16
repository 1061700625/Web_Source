//author: SXF          
//email:1061700625@qq.com
//date:2018/10/21
function addMember() {
	var inputgroup = $(".input_group").toArray();
	if(inputgroup.length >=5)
	{
		sweetAlert(
		  '哎呦……',
		  '最多只能有5个队员哦！',
		  'error'
		)
		return;
	}
	var add_opt = $(".input_group:last").clone();
	$(".add-option").before(add_opt);	
	$(':input','.input_group:last')
		.not(':button, :submit, :reset, :hidden')
		.val('')
}

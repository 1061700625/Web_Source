<?php
	header("content-type:text/html;charset=utf-8"); //设置编码	
	header( "Access-Control-Allow-Origin:*");
	header('Access-Control-Allow-Methods:POST');  
	header('Access-Control-Allow-Headers:x-requested-with,content-type');
    $counter = intval(file_get_contents("counter.dat"));  //创建一个dat数据文件   
    $counter++;  //刷新一次+1
    $fp = fopen("counter.dat","w");  //以写入的方式，打开文件，并赋值给变量fp
    fwrite($fp, $counter);   //将变量fp的值+1
    fclose($fp); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>VIP视频解析</title>
		<link rel="stylesheet" type="text/css" href="css/vip.css"/>
		<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/share.js"></script>
		<script src="js/vip.js"></script>
		<script src="js/jquery.jqlouds.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/share.css">
		<link rel="stylesheet" type="text/css" href="css/pl.css">
		<style type="text/css">
			body { background-color: #f4fbfd; background-image: url(images/bg.png); background-repeat: repeat-x; padding-top: 30px; }
		</style>
		
	</head>
	<body onload="load()">
		<div id="sky" style="height:230px;width: 100%;z-index:-1"></div>
		<div class="box" style="margin-top: -200px;">
	        <div class="header">
	            <h3>VIP视频解析</h3>
	        </div>
	        <div class="box_body">
	            <form action method="get">
	                <div class="box_input_group">
	                    <span class="notes">可用解析接口:</span>
	                    <select name="decode_url" id="selection">
	                        <option value="http://jx.wsy666.site/?url=">        			超快解析（推荐）</option>
	                        <option value="http://jx.598110.com/?url=">         			通用解析</option>
	                        <option value="https://api.sigujx.com/jx/?url=">        		思古解析</option>
	                        <option value="https://jx.dy-jx.com/?url=">            			高科技解析</option>
	                        <option value="http://api.sumingys.com/index.php?url=">   		宿命解析</option>
	                        <option value="https://www.administratorw.com/video.php?url="> 		无名小站解析</option>
	                        <option value="http://jx.ejiafarm.com/dy.php?url=">           		穷二代解析</option>
	                        <option value="http://jiexi.071811.cc/jx.php?url=">            		石头云解析</option>
	                        <option value="http://jx.598110.com/index.php?url=">        		通用解析</option>
	                        <option value="http://mv.688ing.com/player?url=">           		通用解析</option>
	                        <option value="http://17kyun.com/api.php?url=">               		17K云解析</option>
	                        <option value="http://api.bbbbbb.me/jx/?url=">          	        通用解析（推荐）</option>
	                        <option value="https://jx.618g.com/?url=">            			618G解析</option>
	                        <option value="http://okjx.cc/?url=">            			OK解析</option>
	                        <option value="https://z1.m1907.cn/?a=1&jx=">                   	通用解析</option>
	                        <option value="https://660e.com/?url=">					全能解析</option>
	                        <option value="http://jx.v5ant.com/?v=">				智能解析</option>
							<option value="http://api.baiyug.vip/index.php?url=">			百域阁解析</option>
                            <option value="http://jx.qxkkk.cn/?url=">                        	无广告解析(推荐)</option>
							<option value="https://jx.688ing.com/?search=" selected>				【荐】支持输入名称搜索</option>
	                    </select>
	                </div>
	                <div class="box_input_group">
	                    <span class="notes">输入视频地址:</span>
	                    <input class="box_url_input" type="text" name="video_url">
	                </div>
	                <div class="box_btn_submit">
	                    <input class="submit_btn" type="button" value="播放">
	                </div>
	            </form>

<div id="box_bonus" style="position: fixed;top: 60px;left: 10px; width: 200px;height: 400px;">
	<a style="position:absolute;top:-20px;left:80px;" href="javascript:void(0);" onclick="document.getElementById('box_bonus').style.display='none'">关闭</a>
	<img src="images/bg.jpeg" style="position: absolute;z-index:-1; width: 100%;height: 100%;border-radius: 10px;box-shadow: 10px 10px 5px #888888;"/>
	<div style="width: 100%;height: 100%; overflow: auto;">
		<h2 style="text-align: center;;font-family: '楷体';font-size: 18px;">影片推荐</h2>
		<ul>
			<li>刺客伍六七</li>
    		<li>镇魂街</li>
    		<li>罗小黑战记</li>
    		<li>阿狸</li>
    		<li>烟花</li>
    		<li>言叶之庭</li>
    		<li>夏目友人帐</li>
    		<li>千与千寻</li>
    		<li>天空之城</li>
    		<li>未闻花名</li>
    		<li>萤火之森</li>
    		<li>四月是你的谎言</li>
    		<li>我想吃掉你的胰脏</li>
    		<li>哈尔的移动城堡</li>
    		<li>秒速5厘米</li>
    		<li>云之彼端，约定的地方</li>
    		<li>穿越时空的少女</li>
    		<li>萤火虫之墓</li>
    		<li>言叶之庭</li>
    		<li>搭错车</li>
    		<li>不能说的秘密</li>
    		<li>大灌篮</li>
    		<li>岁月神偷</li>
		</ul>
	</div>
</div>
<div id="box_reward" style="position: fixed;top: 150px;right: 3px; width: 145px;height: 290px;">
	<a style="position:absolute;top:-20px;right:50px;" href="javascript:void(0);" onclick="document.getElementById('box_reward').style.display='none'">关闭</a>
	<a href="https://www.toutiao.com/c/user/64404972564/#mid=1574068880239629"><img src="images/jytt.jpeg" style="padding-top: 50px;position: absolute; width: 100%;height: 50%;border-radius: 10px;box-shadow: 10px 10px 5px #888888;"/></a>
	<div style="width: 100%;height: 100%; overflow: auto;">
		<h2 style="text-align: center;;font-family: '楷体';font-size: 18px;">小伙子,不关注?</h2>
	</div>


	<div class="share-demo">
		<a href="javascript:void(0)" class="share"><img src="images/share-ico.png"/></a>
	</div>
</div>

	            <div class="video_play">
	                <iframe id="iframe" src="" width=800px height=500px allowfullscreen="true" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
                        <p style="color:grey;padding-top:10px;font-family:楷体;"> <?php echo "访问量：".$counter;?> </p>
	            </div>
	        </div>


<div style="z-index: 9">
	<div id="qq">
		<p>有什么新鲜事想告诉大家?</p>
		<div class="message" contentEditable='true'></div>
		<div class="But">
			<img src="images/bba_thumb.gif" class='bq' />
			<span class='submit'>发表</span>
			<div class="face">
				<ul>
					<li><img src="images/smilea_thumb.gif" title="呵呵]"></li>
					<li><img src="images/tootha_thumb.gif" title="嘻嘻]"></li>
					<li><img src="images/laugh.gif" title="[哈哈]"></li>
					<li><img src="images/tza_thumb.gif" title="[可爱]"></li>
					<li><img src="images/kl_thumb.gif" title="[可怜]"></li>
					<li><img src="images/kbsa_thumb.gif" title="[挖鼻屎]"></li>
					<li><img src="images/cj_thumb.gif" title="[吃惊]"></li>
					<li><img src="images/shamea_thumb.gif" title="[害羞]"></li>
					<li><img src="images/zy_thumb.gif" title="[挤眼]"></li>
					<li><img src="images/bz_thumb.gif" title="[闭嘴]"></li>
					<li><img src="images/bs2_thumb.gif" title="[鄙视]"></li>
					<li><img src="images/lovea_thumb.gif" title="[爱你]"></li>
					<li><img src="images/sada_thumb.gif" title="[泪]"></li>
					<li><img src="images/heia_thumb.gif" title="[偷笑]"></li>
					<li><img src="images/qq_thumb.gif" title="[亲亲]"></li>
					<li><img src="images/sb_thumb.gif" title="[生病]"></li>
					<li><img src="images/mb_thumb.gif" title="[太开心]"></li>
					<li><img src="images/ldln_thumb.gif" title="[懒得理你]"></li>
					<li><img src="images/yhh_thumb.gif" title="[右哼哼]"></li>
					<li><img src="images/zhh_thumb.gif" title="[左哼哼]"></li>
					<li><img src="images/x_thumb.gif" title="[嘘]"></li>
					<li><img src="images/cry.gif" title="[衰]"></li>
					<li><img src="images/wq_thumb.gif" title="[委屈]"></li>
					<li><img src="images/t_thumb.gif" title="[吐]"></li>
					<li><img src="images/k_thumb.gif" title="[打哈气]"></li>
					<li><img src="images/bba_thumb.gif" title="[抱抱]"></li>
					<li><img src="images/angrya_thumb.gif" title="[怒]"></li>
					<li><img src="images/yw_thumb.gif" title="[疑问]"></li>
					<li><img src="images/cza_thumb.gif" title="[馋嘴]"></li>
					<li><img src="images/88_thumb.gif" title="[拜拜]"></li>
					<li><img src="images/sk_thumb.gif" title="[思考]"></li>
					<li><img src="images/sweata_thumb.gif" title="[汗]"></li>
					<li><img src="images/sleepya_thumb.gif" title="[困]"></li>
					<li><img src="images/sleepa_thumb.gif" title="[睡觉]"></li>
					<li><img src="images/money_thumb.gif" title="[钱]"></li>
					<li><img src="images/sw_thumb.gif" title="[失望]"></li>
					<li><img src="images/cool_thumb.gif" title="[酷]"></li>
					<li><img src="images/hsa_thumb.gif" title="[花心]"></li>
					<li><img src="images/hatea_thumb.gif" title="[哼]"></li>
					<li><img src="images/gza_thumb.gif" title="[鼓掌]"></li>
					<li><img src="images/dizzya_thumb.gif" title="[晕]"></li>
					<li><img src="images/bs_thumb.gif" title="[悲伤]"></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="msgCon"></div>
</div>

	        <div class="box_links">
	        	<i style="font-family: 楷体;margin-left: 40%;">更多资源请关注公众号：xfxuezhang</i>
	        	<p class="box_links_title">其它链接：</p>
	        	<div class="box_link">
	        		<a href="http://121.36.68.53/WEB/">导航页(推荐去看看)</a>
					<a href="http://121.36.68.53/WEB/pan">云盘</a>
					<a href="http://121.36.68.53/WEB/Source">资源补给站</a>
					<a href="http://121.36.68.53/WEB/Graduate">毕业视频</a>
	        	</div>
	        </div>
	    </div>
	</body>

<script  type="text/javascript">
	$('.share').shareConfig({
		Shade : true, //是否显示遮罩层
		Event:'click', //触发事件
		Content : 'Share', //内容DIV ID
		Title : '分享一下咯' //显示标题
	});
</script>
<script>
	jQuery(function($) {
		 $('#sky').jQlouds({
		  		wind: true		
		});
	});
</script>
<script type="text/javascript">
	//从缓存中获取数据并渲染
	// let msgBoxList = JSON.parse(window.localStorage.getItem('msgBoxList')) || [];
	// innerHTMl(msgBoxList);
	let msgBoxList = [];
	function load(){
		$.getJSON("msgBox.json", function(data,status){
		$.each(data['msgBoxList'],function(i, field){
        		msgBoxList.unshift(field);
			});
			innerHTMl(msgBoxList);
        });
    }

	//点击小图片，显示表情
	$(".bq").click(function (e) {
		$(".face").slideDown(); //慢慢向下展开
		e.stopPropagation(); //阻止冒泡事件
	});

	//在桌面任意地方点击，关闭表情框
	$(document).click(function () {
		$(".face").slideUp(); //慢慢向上收
	});

	//点击小图标时，添加功能
	$(".face ul li").click(function () {
		let simg = $(this).find("img").clone();
		$(".message").append(simg); //将表情添加到输入框
	});

	//点击发表按扭，发表内容
	$("span.submit").click(function () {
		let txt = $(".message").html(); //获取输入框内容
		if (!txt) {
			$('.message').focus(); //自动获取焦点
			return;
		}

		var dateObj = new Date();
		var year = dateObj.getFullYear();
		var month = dateObj.getMonth()+1;
		var day = dateObj.getDate();
		var hour = dateObj.getHours();
		var min = dateObj.getMinutes();
		var dateNow = year+"-"+month+"-"+day+" "+hour+":"+min
		txt = txt + " [" + dateNow + "]";
		let obj = {
			msg: txt
		}
		msgBoxList.unshift(obj) //添加到数组里

		let data = {
          msgBoxList:msgBoxList
		}
		var content = JSON.stringify(data);
		$.ajax({
		    url: "pl.php",
		    contentType: "application/json; charset=utf-8",
		    data: content,
		    type: "POST",
		    dataType: "text",
		    success: function(data) {
		        ;
		    }
		});

		// window.localStorage.setItem('msgBoxList', JSON.stringify(msgBoxList)) //将数据保存到缓存
		innerHTMl([obj]) //渲染当前输入框内容
		$('.message').html('') // 清空输入框

	});

	//删除当前数据
	$("body").on('click', '.del', function () {
		let index = $(this).parent().parent().index();
		msgBoxList.splice(index, 1)

		let data = {
          msgBoxList:msgBoxList
		}
		var content = JSON.stringify(data);
		$.ajax({
		    url: "pl.php",
		    contentType: "application/json; charset=utf-8",
		    data: content,
		    type: "POST",
		    dataType: "text",
		    success: function(data) {
		        ;
		    }
		});
		
		// window.localStorage.setItem('msgBoxList', JSON.stringify(msgBoxList)) //将数据保存到缓存
		$(this).parent().parent().remove()
	})

	//渲染html
	function innerHTMl(List) {
		List = List || []
		List.forEach(item => {
			let str =
				`<div class='msgBox'>
					<div class="headUrl">
						<img src='images/tx.jpg' width='50' height='50'/>
						<div>
							<span class="title">匿名</span>
						</div>
						<a class="del">删除</a>
					</div>
					<div class='msgTxt'>
						${item.msg}
					</div>
				</div>`
			$(".msgCon").prepend(str);
		})
	}

</script>
</html>

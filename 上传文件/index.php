<!DOCTYPE html>
<html lang="zh-cn">
<head>
   <meta charset="utf-8">
   <title>OTA</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Cache-Control" content="max-age=72000" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
   <link rel="stylesheet" href="pintuer/pintuer.css">
   <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
   <script src="pintuer/pintuer.js"></script>
</head>
<style>
   @font-face {
      font-family: 'logo';
      src: url('./logo.ttf');
   }
   .logo {
      font-size: 25px;
      font-family: "logo";
   }
   .csbg {
      background-image: linear-gradient(to right, #eea2a2 0%, #bbc1bf 19%, #57c6e1 42%, #b49fda 79%, #7ac5d8 100%);
   }
</style>
<script>
   // 进度条
   function Progress(value) {
      $('#myProgress').css('width', value + '%');
   }

   function CloseDialog() {
      $('#mydialog').hide();
   }
</script>

<body>
   <!-- 弹出框 -->
   <!-- <div style="position: fixed;max-width:600px;">
      <div class="dialog-win" id="mydialog" style="z-index: 11; top: 10px;display: none;">
         <div class="dialog open">
            <div class="dialog-head">
               <span class="close rotate-hover" onclick="CloseDialog()"></span><strong>图片预览</strong>
            </div>
            <div class="dialog-body" style="width:100%;">
               <img src="" id="pic" class="img-responsive" alt="响应式图片" style="width:100%"/>
            </div>
         </div>
      </div>
   </div> -->
   <div class="container">
      <div class="view-body">
         <div class="keypoint bg-blue bg-inverse radius text-center csbg">
            <a href="https://gitee.com/songxf1024" target="_blank">
               <h1 class="logo">
                  ESP32 OTA
               </h1>
            </a>
            <p>
               Welcome to visit the website of 'ESP32 Update' 
			</p>
            <p>
               <br />
			   
			   <form class="button bg-main" action="php/upload_file.php" method="post"
				   enctype="multipart/form-data">
				   <input type="file" name="file" id="file" /> 
				   <input class="button bg-main button-big icon-arrow-circle-up" type="submit" name="submit" value="开始上传" />
			   </form>
               
            </p>
         </div>
         <div class="progress progress-small">
            <div class="progress-bar bg-yellow" id="myProgress" style="width: 0%;">
            </div>
         </div>
      </div>

      <div class="view-body">
         <div class="panel">
            <div class="panel-head">
               <strong>上传bin名称说明</strong>
            </div>
            <ul class="list-group">
               <li> spi_mqtt_pad.bin </li>
            </ul>
         </div>
      </div>
	  
	  <?php
	  	include 'php/danmu.php'
	  ?>
	  
      <div class="container-layout">
         <div class="border-top padding-top">
            <div class="text-center">
               <ul class="nav nav-inline">
                  <li><a href="http://ncurobot.club" target="_blank">SXF</a> </li>
               </ul>
            </div>
            <div class="text-center height-big">
               <a href="http://ncurobot.club" target="_blank">ncurobot.club</a> - Reserved</div>
         </div>
      </div>
   </div>
</body>


<script type="text/javascript" src="https://js.users.51.la/19663859.js"></script>
</html>
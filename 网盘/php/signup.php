<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="SXF">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>欢迎!</title>
    <script type="text/javascript">
    	function sw(){
      	swal.queue([{
				  title: '你的公网IP',
				  confirmButtonText: '显示我的公网IP',
				  text:
				    '你将收到公网IP，' +
				    '通过AJAX请求',
				  showLoaderOnConfirm: true,
				  preConfirm: function () {
				    return new Promise(function (resolve) {
				      $.get('https://api.ipify.org?format=json')
				        .done(function (data) {
				          swal.insertQueueStep(data.ip)
				          resolve()
				        })
				    })
				  }
				}])
			}
      </script>
  </head>
    <body onload="sw()">
      
      <script src="https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js"></script>
			<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    </body>  
</html>
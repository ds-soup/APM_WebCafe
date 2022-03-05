<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" 
          content="width=device-width, height=device-height, 
                     minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
	<title>I eat Food two times in a day</title>
	<script 
		src="https://kit.fontawesome.com/cd1b4c31a5.js" 
		crossorigin="anonymous"
	></script>
    <script src="/js/iconF.js"> </script>
    <script src="/js/register.js"> </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    
    <script>
        function check_enroll() {
            if(!$("#id").val()) {
                alert("아이디를 입력하세요!");
                $("#id").focus();
                return;
            }
            if(!$("#pwd").val()) {
                alert("비밀번호를 입력하세요!");
                $("#pwd").focus();
                return;
            }
            if(!$("#confirm").val()) {
                alert("비밀번호재확인을 입력하세요!");
                $("confirm").focus();
                return;
            }
            if(!$("#email").val()) {
                alert("이메일을 입력하세요!");
                $("#email").focus();
                return;
            }
            if(!$("#name").val()) {
                alert("이름을 입력하세요!");
                $("#name").focus();
                return;
            }
            if($("#pwd").val() != $("#confirm").val()) {
                alert("비밀번호가 일치하지 않습니다.\n 다시 입력해 주세요!");
                $("#confirm").focus();
                return;
            }
            document.forms["sign_in"].submit();
        }
        function checkLogin() {
            if(!$("#login_id").val()) {
                alert("아이디를 입력하세요!");
                $("#login_id").focus();
                return;
            }
            if(!$("#login_pwd").val()) {
                alert("비밀번호를 입력하세요!");
                $("#login_pwd").focus();
                return;
            }
            document.forms["login_form"].submit();
        }
        function checkid() {
            var userid = $("#id").val();

            var popupX = (document.body.offsetWidth / 2) - (200 / 2);
            var popupY= (window.screen.height / 2) - (300 / 2);
            if(userid) {
                window.open('./member/check.php?userid=' + userid, 'chkid','width=250, height=100, scrollbars=no, left=' + popupX + ',top=' +popupY);
                
            } else {
                alert("아이디를 입력하세요.");
            }
        }
    </script>
    
    
</head>
<body class="parent">
    
    <div class="nav_bar"> 
        <div class="logo">
            <h2>
                하루에 두끼
            </h2>
            <p>
                IT Security Study blog
            </p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="#">Study</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Story</a></li>
                <li><a href="#">자유게시판</a></li>
            </ul>
            <div class="login_bar">
                <ul class="login_btn">
                    <li><p>Welcome!</p></li>
                    <li><a href="./account.php?tmpCMD=login">Sign in</a></li>
                    <li><a href="./account.php?tmpCMD=register">Sign up</a></li>                    
                </ul>
            </div>
        </div>
        
    </div>
    
    <div class="container">
        <div class="main-container" style=" width:100%;height:100%;float:left">
            <?php
            require_once("backaccount.php")
        ?>
        </div>
    </div>
	
</body>
</html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" 
          content="width=device-width, height=device-height, 
                     minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/writeboard.css">
	<title>I eat Food two times in a day</title>
	<script 
		src="https://kit.fontawesome.com/cd1b4c31a5.js" 
		crossorigin="anonymous"
	></script>
</head>
<body class="parent">
    <?php
        require_once("../config/lib.php");
    ?>
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="index.php?boardNum=1">Study</a></li>
                <li><a href="index.php?boardNum=2">Forum</a></li>
                <li><a href="index.php?boardNum=3">Story</a></li>
                <li><a href="index.php?boardNum=4">자유게시판</a></li>
            </ul>
            <div class="login_bar">
                <?php require_once("../member/navlogin.php"); ?>
            </div>
        </div>
        
    </div>
    
    <div class="container">
    <?php
	require_once("../config/lib.php");
    if($_SESSION['LoginStatus'] != "OK" || !isset($_SESSION['LoginStatus'])) {
        echo "<script>alert('로그인 후 이용할 수 있습니다.');";
        echo "window.location.href='../index.php';</script>";
    }

    ?>
    <script>
        function sendPost() {
            
            var title = document.getElementsByClassName('textarea_title')[0].value;
            var content = document.getElementsByClassName('textarea_content')[0].value;
            
            // title , content에 대한 필터링 적용.
            var params = [];
            params.push ({
                key : "title",
                value : title
            });
            params.push ({
                key : "content",
                value : content
            });
            var form = document.createElement('form');
            form.setAttribute('method','post');
            form.setAttribute('action',"writeCheck.php?boardNum=<?php echo $_GET['boardNum']; ?>");
            document.charset='utf-8';
            
            for(var i=0; i<2; i++) {
                var hiddenField = document.createElement('input');
                hiddenField.setAttribute('type','hidden');
                hiddenField.setAttribute('name',params[i].key);
                hiddenField.setAttribute('value',params[i].value);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
        } 
    </script>
        <h2 class="writetit" style="padding-left:10%;font-family:'GimhaeGayaB';margin-bottom:3rem;">게시글 작성</h2>
        <div class="post-title">
            <textarea class="textarea_title" placeholder="제목을 입력하세요" style="width:100%;resize:none;"></textarea>
        </div>
        <div class="post-content">
            <textarea class="textarea_content" style="width:100%;resize:none;"></textarea>
        </div>
        <div class="write_btns" style="width:100%;position:relative;margin-left:10%;">
            <button class="submit_content" type="button" onclick="sendPost()">제출</button>
            <button class="cancel_content" type="button" onclick="javascript:history.back();">취소</button>
        </div>
    </div>
</body>
</html>
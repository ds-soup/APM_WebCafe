<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" 
          content="width=device-width, height=device-height, 
                     minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>I eat Food two times in a day</title>
	<script 
		src="https://kit.fontawesome.com/cd1b4c31a5.js" 
		crossorigin="anonymous"
	></script>
</head>
<body class="parent">
    <?php
        require_once("./config/lib.php");
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
                <li><a href="#">Home</a></li>
                <li><a href="board/index.php?boardNum=1">Study</a></li>
                <li><a href="board/index.php?boardNum=2">Forum</a></li>
                <li><a href="board/index.php?boardNum=3">Story</a></li>
                <li><a href="board/index.php?boardNum=4">자유게시판</a></li>
            </ul>
            <div class="login_bar">
                <?php require_once("./member/navlogin.php"); ?>
            </div>
        </div>
        
    </div>
    
    <div class="container">
        <div class="main-container" style=" width:80%;height:100%;float:left">
            <div class="main_section">
                <h3>Study</h3>
            </div>
            <div class="sub_section">
                <h3>Forum</h3>
            </div>
            <div class="sub_section">
                <h3>자유게시판</h3>
            </div>
        </div>
    </div>
    <div class="right_sidebar">
        <div class="side_image">이미지
        </div>
        <h3 class ="side_container">About me</h3>
        <h3 class ="side_container">mail</h3>
        <h3 class ="side_container">Recent Post</h3>
    </div>
	
</body>
</html>
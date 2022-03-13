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
	require_once("../config/dbcon.php");
    require_once("boardinfo.php");

    if(!isset($_GET['boardNum'])) {
        $boardNum = '1';
    }
    if(!isset($_GET['idx'])) {
        $idx = '1';
    }
    if(isset($_GET['boardNum']) && isset($_GET['idx'])) {
        $boardNum = $_GET['boardNum'];
        $idx = $_GET['idx'];
    }

    $table = $boardMenuTableN[$boardNum];
    $query = "select title, name, date, content from {$table} where idx={$idx}";
    $db = new instance_DB();
    $result = $db->DownloadBoardPage($query);
    $data = $result->fetch_assoc();
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
        <div class="board_series"><? echo $boardMenu[$boardNum];?></div>
        <h2 class="read_title"><? echo data['title']; ?></h2>
        <div class="read_board_writer">
            <span class="writer">
                <p><? echo data['name']; ?></p>
            </span>
            <span class="publishdata">
                <p><? echo data['date']; ?></p>
            </span>
        </div>
        <div class="se-main-container">
            <p><? echo data['content']; ?></p>
        </div>
    </div>
</body>
</html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" 
          content="width=device-width, height=device-height, 
                     minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/readboard.css">
	<title>I eat Food two times in a day</title>
	<script 
		src="https://kit.fontawesome.com/cd1b4c31a5.js" 
		crossorigin="anonymous"
	></script>
    <script>
        function submit_comment() {
            
            var comment = document.getElementsByClassName('reply_content')[0].value;
            var form = document.createElement('form');
            form.setAttribute('method','post');
            form.setAttribute('action',"sendcomment.php?boardNum=<?php echo $_GET['boardNum']; ?>&idx=<?php echo $_GET['idx']; ?>");
            document.charset='utf-8';
            
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type','hidden');
            hiddenField.setAttribute('name','comment');
            hiddenField.setAttribute('value',comment);
            form.appendChild(hiddenField);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
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
        <div class="subcontainer">
            <div class="board_series" style="padding-bottom:20px;margin-top:30px;"><a href="index.php?boardNum=<?php echo $boardNum;?>"><?php echo $boardMenu[$boardNum];?></a></div>
            <div class="read_title"><?php echo $data['title']; ?></div>
            <div class="read_board_writer">
                <span class="writer">
                    <p><?php echo $data['name']; ?></p>
                </span>
                <span class="publishdate">
                    <p><?php echo $data['date']; ?></p>
                </span>
            </div>
            <div class="se-main-container">
                <div><?php echo nl2br($data['content']); ?></div>
            </div>
            <div style="position:relative;height:50px;">
                <ul class="opt_menu">
                    <li><a href="index.php?boardNum=<?php echo $boardNum?>">목록</a></li>
                    <?php
                    if($_SESSION['NickName'] == $data['name']) {
                    ?>
                    <li><a href="#">수정</a></li>
                    <li><a href="#">삭제</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="board_comments">
            <?php 
                $db2 = new instance_DB();
                $querys = "select * from board_comment where boardN='{$boardNum}' and boardidx='{$idx}'";
                $result = $db2->DownloadBoardPage($querys);
                while($data = $result->fetch_assoc()) {               
            ?>
                <div style="width:100%;height:50px;">
                    <p class="repy_writer"><?php echo $data['name']?></p>
                    <p class="repy_date"><?php echo $data['date']?></p>
                </div>
                <div>
                    <div style="padding-left:2%;"><?php echo $data['content']?></div>
            <?php 
                if($_SESSION['NickName'] == $data['name']) {
            ?>
                    <div style="margin: 20px 0 30px 5%">
                        <button class="opt_write_com">수정</button>
                        <button class="opt_write_com">삭제</button>
                    </div>
            <?php
                }
            }
            ?>
                </div>
            </div>
            <?php 
            if($_SESSION['LoginStatus'] == "OK") {
            ?>
            <div class="reply_input">
                <p class="reply_writer"><?php echo $_SESSION['NickName']; ?></p>
                <textarea class="reply_content" placeholder="댓글을 남겨보세요." id="re_content" name="re_content"></textarea>
                <button class="reply_btn" type="button" onclick="submit_comment()">등록</button>
            </div>
            <br><br><br>
            <?php }  ?>
        </div>
    </div>
</body>
</html>
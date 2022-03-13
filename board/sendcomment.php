<?php
	require_once("../config/lib.php");
    require_once("../config/dbcon.php");
    
    if($_SESSION['LoginStatus'] != "OK") {
        echo "<script>alert('정상적인 접근이 아닙니다.');</script>";
        echo "<script>history.back();</script>";
    }
        
    $comment = $_POST['comment'];
    $writer = $_SESSION['NickName'];
    $date = date("Y-m-d H:i");

    
    $db_conn = mysqli_connect('localhost','webuser','1234','userDB');
    $query = "insert into board_comment(boardN,boardidx,content,date,name) values('{$_GET['boardNum']}','{$_GET['idx']}','{$comment}','{$date}','{$writer}')";
    $stmt = mysqli_prepare($db_conn, $query);
    $exec = mysqli_stmt_execute($stmt);

    header("Location: ./index.php?boardNum={$_GET['boardNum']}&idx={$_GET['idx']}");
    
?>
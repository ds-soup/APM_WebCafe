<?php
    require_once("../config/dbcon.php");
    $conn = new instance_DB();
    
    $uid= $_GET["userid"];  //GET으로 넘긴 userid
    // 아이디가 존재하는지 확인.
    if(!$conn->IsUserCheck($uid)){
        echo "<span style='color:blue;'>사용 가능한 아이디입니다.";
        echo '<input type="button" value="현재창 닫기" onClick="window.close()" style="margin-left:50px;margin-top:15px;">';
    } else {
        echo "<span style='color:red;'>중복된 아이디입니다.";
        echo '<input type="button" value="현재창 닫기" onClick="window.close()" style="margin-left:50px;margin-top:15px;">';
    }
?>
<?php

    require_once("../config/lib.php");
    require_once('../config/dbcon.php');

    $db = new instance_DB();

    if(!isset($_POST['id']) || !isset($_POST['passwd'])) {
    
        echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
        
    } else {
        $id = $_POST['id'];
        $passwd = $_POST['passwd'];
        
        if($nickname = $db->IsUserAdmin($id, $passwd)) {
            // 관리자 세션 값 부여
            $_SESSION['LoginStatus'] = "OK";
            $_SESSION['AdminUser'] = "Y";
            $_SESSION['NickName'] = $nickname;
            header("Location: ../index.php");
        } else {
            if($nickname = $db->IsLoginValid($id, $passwd)) {
            // 일반사용자 세션부여
            $_SESSION['LoginStatus'] = "OK";
            $_SESSION['NickName'] = $nickname;
            header("Location: ../index.php");
            } else {
                echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.');";
                echo "location.href='../account.php?tmpCMD=login'</script>";
            }
        }
        
    } 
?>
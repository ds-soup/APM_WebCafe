<?php
    
    require_once('../config/dbcon.php');    

    $id = $_POST['id'];
    $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
    $passwdchk = $_POST['passwd_chk'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $db = new instance_DB();
    
    // 사용자가 존재하는지 다시 확인


    if(!$db->EnrollUser($id, $passwd, $email, $name)) {
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    } else {
        if($db->IsUserCheck($id)) {
        echo "<script>alert('회원가입이 완료되었습니다.');location.href='../index.php';</script>";
        } else {
            echo "<script>alert('문제가 발생했습니다.\n관리자에게 문의해주세요.');location.href='index.php';</script>";
        }
    }


?>
<?php
    require_once("../config/lib.php");
    require_once("../config/dbcon.php");
    require_once("boardinfo.php");
    


    if(!isset($_GET['boardNum'])) {
        echo "<script>alert('잘못된 접근입니다.');";
        echo "window.location.href='../index.php';</script>";
    } else {
        $boardNum = $_GET['boardNum'];
    }


    $db = new instance_DB();
    
    if(!isset($_SESSION['NickName'])) {
        echo "<script>alert('로그인 후 이용해주세요.');";
        echo "location.href='../index.php'</script>";
    }
    $boardUpload = array (
        'title' => $_POST['title'],
        'name' => $_SESSION['NickName'],
        'date' => date("Y-m-d H:i"),
        'content' => $_POST['content']
    );

    $result = $db->UploadBoards($boardMenuTableN[$boardNum], $boardUpload['title'],$boardUpload['name'],$boardUpload['date'],$boardUpload['content']);

    if($result) {
?>
    <script>window.location.href='index.php?boardNum=<?php echo $boardNum; ?>';</script>
    <?php
    }
?>
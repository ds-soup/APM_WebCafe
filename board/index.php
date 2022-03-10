<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" 
          content="width=device-width, height=device-height, 
                     minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/board.css">
	<title>I eat Food two times in a day</title>
	<script 
		src="https://kit.fontawesome.com/cd1b4c31a5.js" 
		crossorigin="anonymous"
	></script>
</head>
<body class="parent">
    <?php
        require_once("../config/lib.php");
        require_once("boardinfo.php");
        
        if(!isset($_GET['boardNum'])) {
            $boardNum = '1';
        }
        elseif(is_int(!$_GET['boardNum'])) {
    ?> 
        <scirpt>alert("정상적인 접근이 아닙니다.");</scirpt>
    <?php
        header("Location: ../index.php");
        } else {
            $boardNum = $_GET['boardNum'];
        }
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
        <h2 class="board_title" style="border-bottom:none;text-align:left;">
            <?php echo $boardMenu[$boardNum]; ?>
        </h2>
        <p class="board_subtitle"><?php echo $boardSubtitle[$boardNum]; ?></p>
        <div class="bbs_search" style="margin:30px 0px;">
            <fieldset style="padding:1.5rem 2rem; text-align:center;margin-left:10%;border:1px sold #333;">
                <label class="blind" for="SearchType">검색 옵션</label>
                <select name="searchType" id="searchType" title="검색 옵션">
                    <option value="all">제목 + 내용</option>
                    <option value="tt">제목</option>
                    <option value="cn">내용</option>
                </select>
                <label class="blind" for="searchValue">검색어</label>
                <input name="searchValue" id="searchValue" placeholder="검색어를 입력하세요" class="inpTxt" type="text" value>
                <button title="검색" class="btnSearch" onclick="javascript:searchEvent()">
                    검색
                </button>
            </fieldset>
        </div>
    <?php
	    include "../config/dbcon.php";
    ?>

        <table style="width:100%;font-family:'LeeSeoyun';" class="board_container">
            <tr>
                <th>No </th>
                <th class="in_board_title">제목 </th>
                <th>작성자 </th>
                <th>날짜 </th>
            </tr>

    <?php
    $db = new instance_DB();
    $result = $db->DownloadBoard($boardMenuTableN[$boardNum]);
    $total_record = $result->num_rows; // 총 row 수
            
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }   

    $list = 7; // 한 페이지에 보여줄 게시물 개수
    $block_cnt = 5; //하단에 표시할 블록 당 페이지 개수
    $block_num = ceil($page / $block_cnt); // 현재 페이지 블록
    $block_start = (($block_num - 1) * $block_cnt) + 1;
    $block_end = $block_start + $block_cnt + 1;

    $total_page = ceil($total_record / $list); // 페이징한 페이지 수
    if($block_end > $total_page) {
        $block_end = $total_page;
    }
    $total_block = ceil($total_page / $block_cnt);
    $page_start = ($page-1) * $list;
    
    $query = "select idx, title, name,date from {$boardMenuTableN[$boardNum]} where title != '' limit {$page_start},{$list}";
    $db2 = new instance_DB();
    $PageResult = $db->DownloadBoardPage($query);
    while($data=$PageResult->fetch_assoc()) {
    ?>

            <tr>
                <td> <?php echo $data['idx']; ?> </td>
                <td style="text-align:left;"><a href="read.php?boardNum=<?php echo $boardNum; ?>&idx=<?php echo $data['idx'];?>" class="title_link"><?php echo $data['title']; ?></a></td>
                <td> <?php echo $data['name']; ?> </td>
                <td> <?php echo $data['date']; ?> </td>
            </tr>
<?php
    }
?>
        </table>
        
        
        <?php 
        if($boardNum == 1) {
            if(isset($_SESSION['AdminUser']) && $_SESSION['AdminUser'] == "Y") {
        ?>
                <a class="link_writePage" href="write.php?boardNum=<?php echo $boardNum; ?>" style="right:0;">글쓰기</a>
        <?php
            }
        } else {
        ?>
            <a class="link_writePage" href="write.php?boardNum=<?php echo $boardNum; ?>" style="right:0;">글쓰기</a>
        <?php
        }
        ?>
        
        <nav aria-labe="Page navigation" class="boardPaging_navbar">
            <ul class="pagination">
                <?php
                if($page <=1) {
                    // empty
                } else {
                    $pre = $page -1;
                    echo "<li class='page-item'><a class='page-link' href='index.php?boardNum={$boardNum}&page=1' aria-label='Previous'>Fisrt</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?boardNum={$boardNum}&page={$pre}'>Prev</a></li>";
                }
                
                for($i=$block_start; $i<=$block_end; $i++) {
                    if($page == $i) {
                        echo "<li class='page-item'><a class='page-link' disabled><b style='color: #3f63bf;font-weight:bold;'> {$i} </b></a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='index.php?boardNum={$boardNum}&page={$i}'> {$i} </a></li>";
                    }
                }
                if($page >= $total_page) {
                    // empty
                } else {
                    echo "<li class='page-item'><a class='page-link' href='index.php?boardNum={$boardNum}&page={$total_page}'>Last</a></li>";
                }
                
                ?>
            </ul>
        </nav>        
    </div>
    
</body>
</html>
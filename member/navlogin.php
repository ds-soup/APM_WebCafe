<?php 
    if(isset($_SESSION['AdminUser'])) {
        ?>
        <ul class="login_btn">
            <li><p> <?php echo $_SESSION['NickName']; ?>님 어서오세요.</p></li>
            <li><a href="#">Admin Page</a></li>
            <li><a href="https://privateweb-apm-jejab.run.goorm.io/PrivateWEB_APM/member/logout.php">Logout</a></li>
        </ul>
    <?php
    } else {
        if(!isset($_SESSION['LoginStatus'])) {
            ?>   
            <ul class="login_btn">
                <li><p>Welcome!</p></li>
                <li><a href="https://privateweb-apm-jejab.run.goorm.io/PrivateWEB_APM/account.php?tmpCMD=login">Sign in</a></li>
                <li><a href="https://privateweb-apm-jejab.run.goorm.io/PrivateWEB_APM/account.php?tmpCMD=register">Sign up</a></li>                    
            </ul>
            <?php
        }else {
            ?>
            <ul class="login_btn">
                <li><p><?php echo $_SESSION['NickName']; ?>님 어서오세요.</p></li>
                <li><a href="https://privateweb-apm-jejab.run.goorm.io/PrivateWEB_APM/account.php?tmpCMD=modify">Modify</a></li>
                <li><a href="https://privateweb-apm-jejab.run.goorm.io/PrivateWEB_APM/member/logout.php">Logout</a></li>
            </ul>
        <?php
        }
    }
?>
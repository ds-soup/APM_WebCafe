<?php

    $TmpCMD = $_GET['tmpCMD'];
    if($TmpCMD == "login") {
        $page = <<<HTML
        <form action="./member/login.php" accept-charset="utf-8" name="sign_in" method="post" id="login_form">
                <fieldset style="margin:150 150 0 200;vertical-align:middle;border-radius:5px;">
                    <legend style="color:black;font-weight:bold;text-align:left;margin-left:50px;font-family:IM_Hyemin-Bold;font-size:20px;">
                        Login
                    </legend>
                    <div style="width:70%; text-align:right;">
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">ID  <input class="input_box" type="text" name="id" placeholder="id" id="login_id" required style="border-radius:15px;" ></p>
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">PW  <input class="input_box" type="password" name="passwd" placeholder="password" id="login_pwd" required style="border-radius:15px;" ></p>
                        <p style="margin-top:40px;"><button type="button" class ="sign_btn" onclick="checkLogin()"><p style="font-family:IM_Hyemin-Bold;margin:0 0;">Login</p></button></p>
                        <p style="margin-top:30px;"><button class="cancel_btn" onclick='history.back(); return false;'><p style="font-family:IM_Hyemin-Bold;margin:0 0;">Cancel</p></button></p>
                    </div>
                </fieldset>
            </form>
        HTML;
    }
    elseif($TmpCMD == "register") {
        $page = <<<HTML
        <form action="./member/memberSave.php" accept-charset="utf-8" name="sign_in" method="post" id="sign_in">
                <fieldset style="margin:150 150 0 200;vertical-align:middle;border-radius:5px;">    
                    <legend style="color:black;font-weight:bold;text-align:left;margin-left:50px;font-family:IM_Hyemin-Bold;font-size:20px;">
                        Sign-Up
                    </legend>
                    <div style="width:70%;text-align:right;float:left">
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">ID  <input class="input_box" type="text" name="id" placeholder="id" value="" id="id" required style="border-radius:15px;" ></p>
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">PW  <input class="input_box" type="password" name="passwd" autocomplete="off" placeholder="password" id="pwd" required style="border-radius:15px;"></p>
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">Re <input class="input_box" type="password" name="passwd_chk" autocomplete="off" placeholder="confirm password" id="confirm" required style="border-radius:15px;"></p>
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">Email  <input class="input_box" type="text" name="email" placeholder="email" value="" id="email" required style="border-radius:15px;" ></p>
                        <p style="margin-top:40px;color:black;font-family : IM_Hyemin-Bold;">Name  <input class="input_box" type="text" name="name" placeholder="email" value="" id="name" required style="border-radius:15px;" ></p>
                        <p style="margin-top:40px;"><button type="button" class = "sign_btn" onclick="check_enroll()"><p style="font-family:IM_Hyemin-Bold;margin:0 0;">Sign up</p></button></p>
                        <p style="margin-top:30px;"><button class = "cancel_btn" onclick='history.back(); return false;'><p style="font-family:IM_Hyemin-Bold;margin:0 0;">Cancel</p></button></p>
                    </div>
                    <div style="width:27%; float:right;padding-top:47px;">
                        <input type="button" class="check_user" id="check_button" value="중복 검사" onclick="checkid();">
                    </div>
                </fieldset>
            </form>
        HTML;
    }
    else {
        $page = <<<HTML
        <p style="text-align:center;margin-top:50px;">잘못된 요청입니다.</p>
        HTML;
    }
    echo $page;
?>
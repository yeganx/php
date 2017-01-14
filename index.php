

<?php
require 'headerx.php';
require "db.php";
$user= new user();
ini_set('display_errors',1);
print ($_SERVER['SERVER_NAME']);

//echo $dbx->login($_POST['username'], $_POST['password']);
switch (strtolower($_GET['action'])) {
    case 'reg':
        if ($_POST['username'] && $_POST['mail']&& $_POST['tel']) {
            $x=$user->add_user($_POST['username'],$_POST['mail'],$_POST['tel']);
            echo $x;
            echo gethostname().'\n';
            print_r($_SERVER['SERVER_NAME']);
           // $url="http://api.kavenegar.com/v1/434D457061732B317A325568383277597A51617944513D3D/sms/send.json?receptor=09363032775&sender=10004346&message=hi";
            $curl=curl_init($url);
        //   curl_setopt($curl,CURLOPT_POST,$url);

           $result=curl_exec($curl);
           curl_close($curl);
           print_r($result);
           // file_get_contents("www.google.com");

       }
       break;
    case 'logout':
        header("Location: logout.php");
        break;

}




?>

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
        <div></div>
        <form class="form-signin" method="post" action="index.php?action=reg">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" class="form-control" name="username" placeholder="username" required
                   autofocus>
                <input type="email"  id="inputPassword" class="form-control" name="mail" placeholder="mail
                   required">
            <input type="tel" id="inputPassword" class="form-control" name="tel" placeholder="phonenumber"
                   required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">

        </form><!-- /form -->

    </div><!-- /card-container -->
</div><!-- /container -->

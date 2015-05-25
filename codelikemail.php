<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $subject = "【お問い合わせHP】";
    $subject .= $_POST["subject"];
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $message = $_POST["message"];
    $mail_message = "";

    if($subject != '' && $name != '' && $mail != ''  && $message != '')
    {
        //メール送信開始
        if (mail("hirano@codelike.info", $subject, "お名前：".$name."\n\n".$message, $mail)) 
        {
            //メール送信成功
            $mail_message = "メールを送信しました。<br />お問い合わせありがとうございました。";
        }
        else
        {
            //メール送信失敗
            $mail_message = "メールを送信に失敗しました。<br />申し訳ありませんが、他の方法にて連絡お願い致します。";
        }
    }
    else
    {
        //メール送信失敗
        $mail_message = "メールを送信に失敗しました。<br />すべての項目を入力し、送信をお願いします。";
    
    }
?>
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>CodeLike</title>
        <script type="text/JavaScript">
        <!--
        function jumpUrl(){
            location.href="http://codelike.info";
        }
        //-->
        </script>
    </head>
    <body onLoad="setTimeout('jumpUrl()',10000)">
        <?php echo $mail_message ?><br /><br />
        10秒後にトップページに移動します。
    </body>
</html>

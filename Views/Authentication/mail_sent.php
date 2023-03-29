<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Sent</title>
    <link rel="stylesheet" type="text/css" href="../../static/Authentication/password/mail_sent.css">
</head>
<body>
    <div class="header">
        <?php
        if($block=='token')
        {
            
            echo "<h1>Invalid User</h1>";
            
        }
        else
        {
            $text=<<<TEXT

            <h1>E-mail has been sent to your email</h1>
            <p>If already activated press the below button for login</p>
            <br>
            <br>
            <a href="/login" class="submit" style="text-decoration: none;">HOME</a>
            TEXT;
            echo $text;
        }
        ?>
</div>
    </body>
</html>
<?php
    $pass = 'ashish';

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    echo $hash;


    $enterPass = 'ashish';

    $pwdCheck = password_verify($enterPass, $hash);
echo '<br>';

    if($pwdCheck){
        echo 'valid password';
    }else{
        echo 'invalid password';
    }


?>
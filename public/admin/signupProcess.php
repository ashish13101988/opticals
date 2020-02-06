<?php

    require_once($_SERVER["DOCUMENT_ROOT"].'opticals/resources/templates/config.php');
    
    if(isset($_POST['signup'])):
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $rpwd = $_POST['repeat-pwd'];

        $error   = [];
        
        if(empty($email) || empty($pwd) || empty($rpwd)):
            $error['email'] = $email;
            $error['empty'] = 'empty fields';      
            $error = url_encode($error);
           
             header("location:createUser.php?error=$error");
            exit;
            
            elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)):
                $error['invaildEmail'] = 'Please write valid email';
                $error = url_encode($error);
                header("location:createUser.php?error=$error");
                exit; 
                
            
            elseif($pwd !== $rpwd):
                $error['email'] = $email;
                $error['pwdErr'] = 'Both Password should be same';
                $error = url_encode($error);
                header("location:createUser.php?error=$error");
                exit;
            else:
                
                $sql = "SELECT `email` FROM `users` WHERE `email` = ?";
                $stmt = $db->prepare($sql);
                $stmt->bind_param('s',$email);
                $stmt->execute();
                $stmt->store_result();
                $result = $stmt->num_rows();

                if($result > 0):
                    $error['email'] = $email;
                    $error['invaildEmail'] = 'This email already exist.';
                    $error = url_encode($error);
                    header("location:createUser.php?error=$error");
                    exit;
                else:
                    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                    
                    $sql = "INSERT INTO `users` (`email`,`password`) VALUES( ?, ?)";
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('ss',$email,$hashPwd);
                    $stmt->execute();
                    echo $stmt->error ? $stmt->error : null;
                        if($stmt->affected_rows > 0 ):
                            $error['invaildEmail'] = 'User Created successfully';
                            $error['class'] = 'errSuccess';
                            $error = url_encode($error);
                            header("location:createUser.php?error=$error");
                        endif;
                    
                    
                    
                endif;
                        
                
        endif;

       


    endif;
?>
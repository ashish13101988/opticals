<?php
    require_once($_SERVER["DOCUMENT_ROOT"].'opticals/resources/templates/config.php'); 
    
    if(isset($_POST['loginSubmit'])){
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        if(empty($email) || empty($password)){
            $error['email'] = $email;
            $error['empty'] = 'all fields are requied';
            $error = url_encode($error);
            header("location:user-login.php?error=$error");
            exit;
            
         }


        //checking existing email
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        
        $stmt =  $db->prepare($sql);
         
        $stmt->bind_param('s',$email);
        $stmt->execute();
       
        $result = $stmt->get_result(); // get the mysqli result

            if($result->num_rows > 0){
                $user = $result->fetch_assoc(); // fetch data 
                $pwdCheck = password_verify($password, $user['password']);
               
                if($pwdCheck){
                    $_SESSION['id']     = $user['id'];
                    $_SESSION['email']  = $user['email'];
                    $_SESSION['username']  = $user['name'];

                    if($user['role'] == 'admin'){
                        echo 'admin';
                    }else{
                        echo 'user';
                        header('location:index.php');
                    }
                    
                }else{
                    $error['email'] = $email;
                    $error['pwd'] = "Password didn't match";
                    $error = url_encode($error);
                    header("location:user-login.php?error=$error");
                    exit;
                }
                
                 

           
            }else{
                $error['email'] = $email;
                $error['user'] = "user doesn't exist";
                $error = url_encode($error);
                header("location:user-login.php?error=$error");
                exit;
            }
        
       

        };











?>
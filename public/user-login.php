 <?php require_once('../resources/templates/config.php');?>
 <?php include_once(TEMPLATE_FRONT.DS.'header.php');?>  
 <?php include_once(TEMPLATE_FRONT.DS.'loginProcess.php');?>  

<?php 

 isLogIn('user-login.php');
        if(isset($_GET['error'])):
        $error =  url_decode($_GET['error']);
        // print_r($error);
        endif;


?>  


<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 d-none d-lg-block d-md-block container_login_img"></div>

        <div class="col-md-5 container_login_content">
                <div class="login_avatar"> 
<!--                    <img src="img/login_avatar.jpg" alt="">-->
                </div>
                <div class="display-4 text-center col-md-12 text-dark"><i class="fas fa-users fa-3x"></i></div>
                <div><h2 class="text-center">User Login</h2></div>
<!-- login form -->
                    <form action="signInProcess.php" method="POST">
                            <div class="error text-center"> 
                                <?php 
                                echo $error['empty'] ?? $error['empty'] ?? null ;
                                echo $error['user'] ?? $error['user'] ?? null ;
                                
                                ?>
                            </div>
                          <div class="row">
                            
                             <div class="form-group mt-4 offset-md-2 col-md-8">
                                
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= $error['email'] ?? $error['email'] ?? null;?>">
                            </div>
                            
                            <div class="form-group mt-2 offset-md-2 col-md-8">
                                <div class="error"> 
                                <?php echo $error['pwd'] ?? $error['pwd'] ?? null ;?>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>

                            <div class="my-2 offset-md-2 col-md-8">
                                <input type="checkbox" class="mr-2 "><span class="text-secondary">Remember me</span>
                                <a href="" class="float-right text-danger">forgot password?</a>
                            </div>

                            <div class="form-group offset-md-2 col-md-8">
                                <div class="">
                                    
                                    <button type="submit" class="btn btn-primary btn-block" name="loginSubmit">LOGIN <i class="fas fa-unlock-alt"></i></button>
                                </div>
                            </div>
                        </div>   
                    </form>
                 
           </div> 
        
    </div>
</div>

<!-- footer -->

<?php require_once(TEMPLATE_FRONT.DS.'footer.php');?>
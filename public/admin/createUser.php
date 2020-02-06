<?php require_once('../../resources/templates/config.php');?>
<?php include_once(TEMPLATE_BACK.DS.'header.php');?>  
<?php 
    if(isset($_GET['error'])):
       $error =  url_decode($_GET['error']);
      //echo $error['class'] ?? $errClass ='error' ?? $error['class'];
           
    endif;


?>  

<!-- navbar -->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="signupProcess.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="<?= $error['class'] ?? 'error' ?? $error['class'] ?>">
                        <?php echo $error['invaildEmail'] ??  $error['invaildEmail'] ?? null ;?>
                    </div>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $error['email'] ??  $error['email'] ?? null ;?>">
                    
                </div>
                <div class="error">
                        <?php echo $error['pwdErr'] ??  $error['pwdErr'] ?? null ;?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" id="InputPassword1" placeholder="Password" name="pwd">
                </div>

                <div class="error">
                        <?php echo $error['pwdErr'] ??  $error['pwdErr'] ?? null ;?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confrim Password</label>
                    <input type="text" class="form-control" id="InputPassword2" placeholder="Password" name="repeat-pwd">
                </div>
                
                <button type="submit" class="btn btn-primary" name="signup">Submit</button>
                </form>
        </div>
    </div>
</div>


<!-- footer -->

<?php require_once(TEMPLATE_BACK.DS.'footer.php');?>
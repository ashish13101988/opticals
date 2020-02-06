<?php 

    if(isset($_POST['submit'])){

        require_once('../resources/templates/config.php');

       //echo date('ymd');

      $orderId =  $_SESSION['orderId'];

      $fullAdd = $_POST['add1'].$_POST['add2'];

      print_r($_POST);

      


      $sql = "INSERT INTO `customers` (`user_id`,`title` ,`name`,`phone`,`email`, `address`, `pincode`, `city`, `age`, `sex`,`state`, `description`, `remark`, `prescribedby`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

     
    
      $stmt = $db->prepare($sql);
      //$stmt = $db->prepare($sqlLens);

        if($db->error){
            echo $db->error;
            die;
        }

       $stmt->bind_param('ssssssssssssss', $_SESSION['id'], $_POST['title'], $_POST['cusname'],$_POST['contact'],$_POST['email'],$fullAdd, $_POST['zip'],$_POST['city'],$_POST['cusage'],$_POST['sex'],$_POST['state'],$_POST['desc'],$_POST['remark'],$_POST['prescribedBy']);
       
       $stmt->execute();

       if($stmt->affected_rows > 0 ):

           $sql =  "SELECT MAX(customer_id) FROM `customers` WHERE `user_id` = ?";
           $stmt = $db->prepare($sql);

                if($db->error){
                    echo $db->error;
                    die;
                }else{
                    $stmt->bind_param('i', $_SESSION['id']);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $row =  $result->fetch_assoc();
                    $customer_id =  $row['MAX(customer_id)'];
                    $stmt->close();
                    print_r($row);


                            $rSph   = $_POST['DVrsph'].'~'.$_POST['NVrsph'];
                            $rCyl   = $_POST['DVrcyl'].'~'.$_POST['NVrcyl'];
                            $rAxi   = $_POST['DVraxi'].'~'.$_POST['NVraxi'];
                            $rPsm   = $_POST['DVrpsm'].'~'.$_POST['NVrpsm'];
                            $rVn    = $_POST['DVrvn'].'~'.$_POST['NVrvn'];

                            $lSph   = $_POST['DVlsph'].'~'.$_POST['NVlsph'];
                            $lCyl   = $_POST['DVlcyl'].'~'.$_POST['NVlcyl'];
                            $lAxi   = $_POST['DVlaxi'].'~'.$_POST['NVlaxi'];
                            $lPsm   = $_POST['DVlpsm'].'~'.$_POST['NVlpsm'];
                            $lVn    = $_POST['DVlvn'].'~'.$_POST['NVlvn'];

                            $ipd    = $_POST['DVipd'].'~'.$_POST['NVipd'];

                            $sqlLens = "INSERT INTO `lens` (`customer_id`,`prescno`,`rSph`,`rCyl`,`rAxi`,`rPsm`,`rVn`,`lSph`,`lCyl`,`lAxi`,`lPsm`,`lvn`,`IPD`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            
                            $stmt = $db->prepare( $sqlLens);
                                if($db->error){
                                    echo $db->error;
                                    die;
                                }

                            $stmt->bind_param('issssssssssss',$customer_id,$orderId,$rSph,$rCyl,$rAxi,$rPsm,$rVn,$lSph,$rCyl,$lAxi,$lPsm,$lVn,$ipd);
                            
                            $stmt->execute();

                             if($stmt->affected_rows > 0 ){
                                 echo "data Saved Successfullly";
                                 $stmt->close();
                             }else{
                                print_r($stmt);
                             }

                }

            

        endif;
        
       
        
       

       

    }


?>
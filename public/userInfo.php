<?php require_once('../resources/templates/config.php');?>
<?php include_once(TEMPLATE_FRONT.DS.'header.php');?>  
<!-- navbar -->
<?php include_once(TEMPLATE_FRONT.DS.'nav.php');?>  
<?php isLogIn();?>


<?php 
    // fetching user details
     
    $_SESSION['orderId'] = date('dmyHis');

    $sql = "SELECT * FROM `users` WHERE `id` = ?";

    $stmt =  $db->prepare($sql);
  
    $stmt->bind_param('i',$_SESSION['id']);
    $stmt->execute();
    

    $result = $stmt->get_result();
    $row =  $result->fetch_assoc();
    $stmt->close();

?>

<section class="company-div">
    <div class="container">
        <div class="row justify-content-md-center pt-5">
            <div class="text-center">
                <h1 class="brand_name"><?php echo ucfirst($row['shop']);?></h1>
                <h4 class="company_address"><?php echo ucfirst($row['address']).', '.ucfirst($row['state']).'-'.ucfirst($row['pincode'])?></h4>
                <h4 class="company_contact"><?php echo ucfirst($row['shopContact'])?></h4>
            </div>
            
        </div>
        <hr>
        <div class="row pl-3">
            <div class="col">
           <form action="userInfoProcess.php" method="POST">

                <div class="form-row">
                    <div class="col-md-2 form-group">
                        <label for="prescNo">Presc No.</label>
                        <input type="text" class="form-control form-control-sm" id="prescNo"value="<?= $_SESSION['orderId'];?>" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control form-control-sm" id="date" name="date" value="<?php echo date('d/m/Y')?>" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="title">Title</label>
                        <select id="title" class="form-control form-control-sm" name="title">
                            <option selected value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss.">Miss.</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="cusname">Name</label>
                        <input type="text" class="form-control form-control-sm" id="cusname" name="cusname">
                    </div>
                    <div class="col-md-1 form-group">
                        <label for="cusage">Age</label>
                        <input type="number" class="form-control form-control-sm" id="cusname" name="cusage">
                    </div>
                    <div class="col-md-1 form-group">
                         <label for="sex">Sex</label>
                        <select id="title" class="form-control form-control-sm" name="sex">
                            <option selected value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="transgender">Transgender</option>
                        </select>
                    </div>
                    

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="cusContact">Contact</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Mobile No" name="contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="add1">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="add2">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="state">
                        <option selected>Choose...</option>
                        <option value="delhi">Delhi</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name='zip'>
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="desc">Descriptions</label>
                    <textarea class="form-control" id="desc" rows="2" name="desc"></textarea>
                </div>
<!-- opticals des row col -->

                <!--ends optical des row col  -->

                <div class='form-row'>
                    <div class="col">
                        <table class="table table-sm table-responsive-sm">
                            <tr class="table-dark">
                                <td colspan="6" class="text-center"><h3>Right</h3></td>
                                <td colspan="6" class="text-center"><h3>Left</h3></td>
                            </tr>
                            <tr>
                                <th></th>
                                <?php 
                                    foreach($lensInfo as $name){
                                        echo "<th>".ucfirst($name)."</th>";
                                    }

                                     foreach($lensInfo as $name){
                                        echo "<th>".ucfirst($name)."</th>";
                                    }
                                ?>
                               
                                <th class="ipd">IPD</th>
                            </tr>
                            <tr>
                                <th>DV</th>

                                <?php 
                                    foreach($lensInfo as $name){
                                        echo  "<td><input type='text' name='DVr$name' class='form-control form-control-sm' </td>";
                                    }
                                    foreach($lensInfo as $name){
                                        echo  "<td><input type='text' name='DVl$name' class='form-control form-control-sm' </td>";
                                    }

                                     
                                ?>
                               
                                <td class="ipd"><input type="text" name="DVipd" id="" class="form-control form-control-sm"></td>
                                
                            </tr>
                            <tr>
                                <th>NV</th>
                                 <?php 
                                    foreach($lensInfo as $name){
                                        echo  "<td><input type='text' name='NVr$name' class='form-control form-control-sm' ></td>";
                                    }
                                    foreach($lensInfo as $name){
                                        echo  "<td><input type='text' name='NVl$name' class='form-control form-control-sm'></td>";
                                    }

                                     
                                ?>
                                <td class="ipd"><input type="text" name="NVipd" id="" class="form-control form-control-sm"></td>
                            </tr>
                           
                        </table>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remark" id="remarks" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prescribedBy">Prescribed By</label>
                        <input type="text" name="prescribedBy" id="prescribedBy" class="form-control">
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name='submit'>Save</button>
                </form>

                </div>
            
        </div>
    </div>


    <form action=""></form>
</section>


<?php require_once(TEMPLATE_FRONT.DS.'footer.php');?>
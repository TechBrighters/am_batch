<?php 

$connection = mysqli_connect('localhost','root','','database_tutorial');
if(!empty($_GET) && isset($_GET['id'])){
    $selctQry = "SELECT * FROM customer WHERE id = ".$_GET['id'];
    $records = mysqli_query($connection,$selctQry) or die(mysqli_error($connection));
    $customerData = mysqli_fetch_assoc($records);
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $insertQry = "INSERT INTO customer (name,email,phone) VALUES ('".$name."','".$email."','".$phone."')";
    // mysqli_query($connection,$insertQry) or die(mysqli_error($connection));
    //header('location:customer_data.php');
}
include('header.php');?>

      <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Cutomer Update</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="main_form" method="get" action="customer_update.php">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Name : <input type="text" value="<?php if(isset($customerData['name'])) { echo $customerData['name']; }?>" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <input type="hidden" name="hdn_id" value="<?php echo $_GET['id'];?>">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Email : <input type="text" value="<?php if(isset($customerData['email'])) { echo $customerData['email']; }?>" name="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Phone : <input type="text" value="<?php if(isset($customerData['phone'])) { echo $customerData['phone']; }?>" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Profile Photo: <input type="file" name="profile" class="form-control" value="<?php if(isset($customerData['photo'])) { echo $customerData['photo']; }?>">
                                <?php if(isset($customerData['photo']) && !empty($customerData['photo'])){?>
                                    <img src="uploads/<?php echo $customerData['photo'];?>">
                                <?php }else {?>
                                        <img src="">
                                <?php } ?>
                            </div>
                            <div class=" col-md-12">
                                <button type="submit" class="send">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- <form class="main_form">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Your name" type="text" name="Your Name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Email" type="text" name="Email">
                            </div>
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message"></textarea>
                            </div>
                            <div class=" col-md-12">
                                <button class="send">Send</button>
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
   <?php include('footer.php');?>
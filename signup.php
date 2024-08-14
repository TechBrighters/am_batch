<?php 

$connection = mysqli_connect('localhost','root','','database_tutorial');
if(!empty($_POST)){
    echo "<pre>";print_r($_POST);
    print_r($_FILES);
    if(move_uploaded_file($_FILES['profile']['tmp_name'],"uploads/".$_FILES['profile']['name'])){
        $image = $_FILES['profile']['name'];
    }else{
        $image = '';
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $insertQry = "INSERT INTO customer (name,email,phone,photo) VALUES ('".$name."','".$email."','".$phone."','".$image."')";
    mysqli_query($connection,$insertQry) or die(mysqli_error($connection));
    header('location:customer_data.php');
}
include('header.php');?>

      <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Sign Up</h2>
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
                    <form class="main_form" method="post" action="signup.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Name : <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Email : <input type="text" name="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Phone : <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                Profile Photo: <input type="file" name="profile" class="form-control">
                            </div>
                            <div class=" col-md-12">
                                <button type="button" class="send">Sign Up</button>
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
   <script>
    $('.send').on('click',function(){
        console.log($('.main_form').serialize())
        $.ajax({
            type:'post',
            data:$('.main_form').serialize(),
            dataType:'json',
            url:'ajax_request.php',
            success:function(response){
                console.log(response)
                if(response.msg == 'success'){
                    alert('Form submitted')
                }
            },
            error:function(){

            }
        })
    })
    </script>
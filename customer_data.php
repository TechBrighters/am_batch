<?php 


$connection = mysqli_connect('localhost','root','','database_tutorial');
if(isset($_GET['id']) && !empty($_GET['id'])){
    $delQry = "DELETE FROM customer WHERE id=".base64_decode($_GET['id']);
    //$delQry = "UPDATE customer set is_deleted = 1 WHERE id=".base64_decode($_GET['id']);
    mysqli_query($connection,$delQry) or die(mysqli_error($con));
    header('location:customer_data.php');
}
$selectQry = "SELECT * FROM customer WHERE is_deleted = 0";
$selectRows = mysqli_query($connection,$selectQry) or die(mysqli_error($connection));
include('header.php');?>
      <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Customer Data</h2>
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
                    <table border="1" align="center">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        <?php while($res = mysqli_fetch_array($selectRows)){?>
                            <tr>
                                <td><?php echo $res['name'];?></td>
                                <td><?php echo $res['email'];?></td>
                                <td><?php echo $res['phone'];?></td>
                                <td><a href="update_data.php?id=<?php echo $res['id'];?>">Edit</a> | <a href="customer_data.php?id=<?php echo base64_encode($res['id']);?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
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
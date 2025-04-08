<?php 
session_start();

include('includes/header.php');
// include('middleware/adminmiddleware.php')
// include('../middleware/adminmiddleware.php');
// include('../middleware/adminmiddleware.php');
include('../admin/config/dbcon.php');

?>
<?php
$id=$_GET['id'];
$query = "SELECT c.id as cid, c.prod_id, c.order_id, c.order_status, c.qty, c.cart_total, c.size , p.id as pid, p.name as product_name, p.image, a.id as aid, a.name as address_name, a.number, a.place , a.pincode, a.city
FROM order_items c, products p, address a WHERE  c.id='$id' AND c.prod_id=p.id AND a.id=c.order_id ORDER BY c.id DESC";
$query_run = mysqli_query($con, $query);
// $items = getorderItems();
?>

<div class="container">
    <div class="row">   
        <div class="col-md-12">
            <?php
                if(mysqli_num_rows($query_run ) > 0) {
                    while($citem=mysqli_fetch_assoc($query_run)) { 
            
                        ?>
                          <div class="card">
                     <div class="card-header">
                         <h4>Edit Products
                          <a href="orders.php" class="btn btn-primary float-end">Back</a>
                         </h4>
                     </div>
                     <div class="card-body">
                         <form action="orderupdate.php" method="POST" enctype="multipart/form-data">
                         <div class="row">
                            <h5>Address details</h5>
                             <div class=" form-control mb-2">
                                  <p><b><?= $citem['address_name'];?></b></p>
                                  <p><b><?= $citem['number'];?></b></p>
                                  <p><b><?= $citem['place'];?></b></p>
                                  <p><b><?= $citem['pincode'];?></b></p>
                                  <p><b><?= $citem['city'];?></b></p>
                                </div>
                             <div class="col-md-12">
                            <h5>Product details</h5>
                             </div>

                             <div class="col-md-6">
                               <label class="mb-0">Name</label>
                               <input type="text" name="name" class="form-control mb-2" value="<?= $citem['product_name'];?>" placeholder="Enter Category Name">
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Selling Price</label>
                               <input type="text" name="selling_price" class="form-control mb-2" value="<?= $citem['cart_total'];?>" placeholder="Enter Selling Price">
                               <input type="hidden" name="id" value="<?=$citem['cid']; ?>">
                             </div>
                             
                             <div class="col-md-12">
                             <img src="../uploads/<?=$citem['image']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>">
                             </div>
                             <div class="row">
                             <div class="col-md-6">
                               <label class="mb-0">Quantity</label>
                               <input type="number" name="qty" value="<?= $citem['qty'];?>" class="form-control mb-2" >
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Size</label>
                               <input value="<?= $citem['size'];?>" class="form-control mb-2" >
                             </div>
                             <div class="col-md-12">
                               <label for="">order status</label><br>
                               <select name="order_status" id="order_status"  value="<?=$citem['order_status'] ?>" required style="height:30px">
                               <option value=""><?=$citem['order_status'] ?></option>
                               <option value="shipped">Shipped</option>
                               <option value="out for delivery">Out for Delivery</option>
                               <option value="delivered">Delivered</option>
                               </select>
                             </div>
                             <div class="col-md-12">
                             <br>
                             <button type="submit" class="btn btn-primary" name="update">Update</button>
                             </div>
                         </div>
                         </form>
                         
                     </div>
                          </div>
                          <?php
                }
            } else {
                echo "No data available";
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
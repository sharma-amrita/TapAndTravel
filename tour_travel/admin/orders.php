<?php 
session_start();
include('functions/authentication.php');
include('includes/header.php');
include('functions/authcode.php');
include('functions/myfunction.php')

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
             <div class="card-header">
                <h4>Products</h4>
             </div>
               <div class="card-body" id="products_table">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Address_Id</th>
                        <th>Product_Id</th>
                        <!-- <th>Image</th> -->
                        <th>Status</th>
                        <th>update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $order_items = getAll("order_items");

                      if(mysqli_num_rows($order_items) > 0)
                      {
                        foreach($order_items as $item)
                        {
                            ?>
                            <form action="#" method="POST" enctype="multipart/form-data">
                              <tr>
                               <td><?=$item['order_id']; ?></td>
                               <input type="hidden" name="id" value="<?=$item['id'] ?>">
                               <td><?=$item['prod_id']; ?></td>
                                <!-- <td> -->
                                    <!-- <img src="../uploads/<?=$item['image']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>"> -->
                               <!-- </td> -->
                               <td>
                               <?=$item['order_status'] ?>
                               </td>
                               <td>
                               <a href="edit-order-staus.php?id=<?=$item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                               <!-- <button type="submit" class="btn btn-primary" name="update">Update</button>                                 -->
                               </td>
                               </tr> 
                               </form>
                           <?php

                        }
                      }
                      else{
                        echo"No Result Found";
                      }
                    ?>
                  
                  </tbody>
               </table>
               </div>
           </div>
         </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- <script src="./assests/js/custom.js"></script> -->

<?php include('includes/footer.php'); ?>
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
                <h4>Manage City Details</h4>
             </div>
               <div class="card-body" id="products_table">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>id</th>
                        <!-- <th>city id</th> -->
                        <th>Name</th>  <!-- its a city name  -->
                        <th>Location</th>
                        <th>Price</th>                     
                        <th>Image1</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $products = getAll("add_city");

                      if(mysqli_num_rows($products) > 0)
                      {
                        foreach($products as $item)
                        {
                            ?>
                              <tr>
                               <td><?=$item['city_id']; ?></td>
                               <!-- <td><?=$item['city_id']; ?></td> -->
                               <td><?=$item['city_name']; ?></td>
                               <td><?=$item['location']; ?></td>
                               <!-- <td><?=$item['package_type']; ?></td> -->
                               <td><?=$item['price']; ?></td>
                               
                               <td>
                                    <img src="../uploads/<?=$item['image1']; ?> " width="50px" height="50px" alt="<?=$item['city_name'];?>">
                                </td>
                               <!-- <td>
                                    <img src="../uploads/<?=$item['image2']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>">
                                </td>
                               <td>
                                    <img src="../uploads/<?=$item['image3']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>">
                                </td>
                               <td>
                                    <img src="../uploads/<?=$item['image4']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>">
                                </td> -->
                              
                                
                              
                               <!-- <td><?=$item['status'] == '0'? "visible":"hidden" ?></td> -->
                               <td>
                                 <a href="edit_city.php?city_id=<?=$item['city_id']; ?>" class="btn btn-sm btn-primary">view details</a>                                
                                </td>
                                <td>
                                <!-- <form action="code.php" method="POST">
                                  <input type="hidden" name="product_id" value=""> -->
                                  <button type="button" class="btn btn-sm btn-danger delete-product-btn" value="<?= $item['city_id']; ?>" >Delete</button>
                                  <!-- </form> -->
                                </td>
                               </tr>
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
<script>
  // alert("working");
  $(document).ready(function (){ 

   $(document).on( 'click' , '.delete-city-btn' , function(e){
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
                $.ajax({
                method:"POST",
                url: "code.php",
                data: {
                   'city_id':id,
                   'delete-city-btn':true
                },
                success : function (response){
                  console.log(response);
                   if(response == 200)
                   {
                    swal("success!", "city deleted Sucessfully!", "success");
                      $("#city_table").load(location.href +  " #city_table");
                    }
                   else if( response == 500)
                   {
                    swal("Error!" , "Something went wrong" , "error");
                   }
                }
               });
        } 
      });
});
});
</script>
<?php include('includes/footer.php'); ?>
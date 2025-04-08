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
            <?php
                if(isset($_GET['city_id']))
                {
                    $city_id = $_GET['city_id'];
                    $product = getByID("add_city" , $city_id);
                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        ?>
                          <div class="card">
                     <div class="card-header">
                         <h4>Edit city details
                          <a href="city.php" class="btn btn-primary float-end">Back</a>
                         </h4>
                     </div>
                     <div class="card-body">
                         <form action="code.php" method="POST" enctype="multipart/form-data">
                         <div class="row">
                         <div class="col-md-12">
                               <label for="">Select country</label>
                               <select name="id" class="form-select mb-2">
                               <option selected>Select city</option>
                                 <?php
                                 $categories = getAll("add_country");
     
                                 if(mysqli_num_rows($categories) > 0)
                                 {
                                     foreach ($categories as $item){
                                         ?>
                                          <option value="<?= $item['id']; ?>" <?= $data['id'] ==$item['id']?'selected':'' ?> ><?= $item['location']; ?></option>
                                         <?php
                                     }
                                 }
                                else{
                                 echo" No City Available";
                                }
     
                                 ?>
                                 
                                
                                 
                                 </select>
                             </div>
                             <input type="hidden" name="city_id"value="<?= $data['city_id'];?>" >
                             <div class="col-md-6">
                               <label class="mb-0">Name</label>
                               <input type="text" name="city_name" class="form-control mb-2" value="<?= $data['city_name'];?>" placeholder="Enter Category Name">
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Slug</label>
                               <input type="text" name="slug" class="form-control mb-2" value="<?= $data['slug'];?>" placeholder="Enter Slug">
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0">Heading</label>
                               <input type="text" name="heading" value="<?= $data['heading'];?>" class="form-control mb-2" placeholder="Enter heading">
                              </div>
                             <div class="col-md-12">
                               <label class="mb-0">Description</label>
                               <textarea rows="3" name="description" class="form-control mb-2" placeholder="Enter Description"><?= $data['description'];?></textarea>
                             </div>
                             <div class="col-md-6">
                          <label class="mb-0">Location</label>
                          <input type="text" name="location" class="form-control mb-2" placeholder="Enter location">
                        </div>
                            <div class="col-md-6">
                               <label class="mb-0"> Package Type</label>
                               <textarea rows="1" name="package_type" class="form-control mb-2" placeholder="Enter package type"><?= $data['package_type'];?></textarea>
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Price</label>
                               <input type="text" name="price" class="form-control mb-2" value="<?= $data['price'];?>" placeholder="Enter Price">
                              </div> 
                             
                              <div class="col-md-6">
                               <label class="mb-0">Upload Image</label>
                               <input type="file" name="image1" class="form-control mb-2" >
  
                               <label for="mb-0">Current Image</label>
                               <input type="hidden" name="old_image1" value="<?= $data['image1'];?>">
                               <img src="../uploads/<?= $data['image1'];?>" alt="" height="50px" width="50px">
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Upload Image</label>
                               <input type="file" name="image2" class="form-control mb-2" >
  
                               <label for="mb-0">Current Image</label>
                               <input type="hidden" name="old_image2" value="<?= $data['image2'];?>">
                               <img src="../uploads/<?= $data['image2'];?> " alt="" height="50px" width="50px">
                             </div>
                             
                             <div class="col-md-6">
                               <label class="mb-0">Upload Image</label>
                               <input type="file" name="image3" class="form-control mb-2" >
  
                               <label for="mb-0">Current Image</label>
                               <input type="hidden" name="old_image3" value="<?= $data['image3'];?>">
                               <img src="../uploads/<?= $data['image3'];?> " alt="" height="50px" width="50px">
                             </div>

                             <div class="col-md-6">
                               <label class="mb-0">Upload Image</label>
                               <input type="file" name="image4" class="form-control mb-2" >
  
                               <label for="mb-0">Current Image</label>"
                               <input type="hidden" name="old_image4" value="<?= $data['image4'];?>">
                               <img src="../uploads/<?= $data['image4'];?>  " alt="" height="50px" width="50px">
                             </div>
                        
                        <div class="col-md-6">
                               <label class="mb-0">Detail1</label>
                               <textarea rows="1" name="detail1"  class="form-control mb-2" placeholder="Enter Meta Keywords"><?= $data['detail1'];?></textarea>
                        </div>
                        <div class="col-md-6">
                               <label class="mb-0">Detail2</label>
                               <textarea rows="1" name="detail2" class="form-control mb-2" placeholder="Enter Meta Description"><?= $data['detail2'];?></textarea>
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">detail3</label>
                          <input type="text" name="detail3" value="<?= $data['detail3'];?>" class="form-control mb-2" placeholder="Enter detail">
                        </div>
                        
                        <div class="col-md-6">
                          <label class="mb-0">Iterat1</label>
                          <input type="text" name="Iterat1" value="<?= $data['Iterat1'];?>" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat2</label>
                          <input type="text" name="Iterat2" value="<?= $data['Iterat2'];?>" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat3</label>
                          <input type="text" name="Iterat3" value="<?= $data['Iterat3'];?>" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat4</label>
                          <input type="text" name="Iterat4" value="<?= $data['Iterat4'];?>" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat5</label>
                          <input type="text" name="Iterat5" value="<?= $data['Iterat5'];?>" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                            
                             <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary" name="update-city-btn">Update</button>
                             </div>
                             
                             
                         </div>
                         </form>
                         
                     </div>
                          </div>
                        <?php
                    }
                    else
                    {
                     echo "Product Not Found for given id" ;
                    }
                }
                else
                {
                 echo "Id missing from url" ;
                }
             ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
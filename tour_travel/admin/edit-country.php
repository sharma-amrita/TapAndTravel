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
            if(isset($_GET['id']))
            {
              $id = $_GET['id'];
              $category =  getByCountryID("add_country" , $id);
             
             if(mysqli_num_rows($category) > 0)
             {
                $data = mysqli_fetch_array($category);
                ?>
                 <div class="card">
                <div class="card-header">
                    <h4>Edit Country 
                      <a href="country.php" class="btn btn-primary float-end">Back</a>
                    </h4> 
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                          <input type="hidden" name="id" value="<?=$data['id'] ?>">
                          <label for="">Name</label>
                          <input type="text" name="name"  value="<?=$data['name']?>" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-12">
                          <label for="">Upload Image</label>
                          <input type="file" name="image" class="form-control" >
                          <label for="">Current Image</label>
                          <input type="hidden" name="old_image" value="<?=$data['image']?>">
                          <img src="../uploads/<?=$data['image'] ?>" height="50px" width="50px" alt="">
                        </div>
                        <div class="col-md-6">
                          <input type="hidden" name="id" value="<?=$data['id'] ?>">
                          <label for="">Type of trip</label>
                          <input type="text" name="Type_of_trip"  value="<?=$data['Type_of_trip']?>" class="form-control" placeholder="Enter type of trip">
                        </div>
                        <div class="col-md-12">
                          <label for="">Starting Price<Title></Title></label>
                          <input type="text" name="price" class="form-control" value="<?=$data['price']?>" placeholder="Enter price">
                        </div>
                        <div class="col-md-12">
                          <label for="">Location</label>
                          <textarea rows="3" name="location" class="form-control" placeholder="Enter Meta-Description"><?=$data['location']?></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="">Slug</label>
                          <input type="text" name="slug" value="<?=$data['slug']?>" class="form-control" placeholder="Enter Slug">
                        </div>
                        <div class="col-md-12">
                          <label for="">Heading</label>
                          <textarea rows="3" name="heading" class="form-control" placeholder="Enter heading"><?=$data['heading']?></textarea>
                        </div>

                        <div class="col-md-12">
                          <label for="">Upload Image</label>
                          <input type="file" name="explore_image" class="form-control" >
                          <label for="">Current Image</label>
                          <input type="hidden" name="old_explore_image" value="<?=$data['explore_image']?>">
                          <img src="../uploads/<?=$data['explore_image'] ?>" height="50px" width="50px" alt="">
                        </div>

                        <div class="col-md-12">
                          <label for="">Meta Description</label>
                          <textarea rows="3" name="meta_description" class="form-control" placeholder="Enter meta_description"><?=$data['meta_description']?></textarea>
                        </div>
                       
                       
                        <!-- <div class="col-md-6">
                          <label for="">Status</label>
                          <input type="checkbox"  <?=$data['status'] ? "checked":""?> name="status">
                        </div>
                        <div class="col-md-6">
                          <label for="">Popular</label>
                          <input type="checkbox"  <?=$data['popular']? "checked":""?> name="popular" >
                        </div>
                        <div class="col-md-6">
                          <label for="">New Arrival</label>
                          <input type="checkbox"  <?=$data['new_arrival']? "checked":""?> name="new_arrival" >
                        </div> -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="Update-country-btn">Update</button>
                        </div>
                        
                        
                    </div>
                    </form>
                    
                </div>
                 </div>
                <?php
             }
             else
             {
              echo "Category not found";
             }
            }
             else
              {
               echo "Id missing from url";
              }
              ?>
          
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
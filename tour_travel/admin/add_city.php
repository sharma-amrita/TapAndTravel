<?php 
session_start();
include('functions/authentication.php');
include('includes/header.php');
include('functions/authcode.php');
include('functions/myfunction.php')

?>

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add City Details</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-12">
                          <egor for="">Select Country</label>
                          <select name="id" class="form-select">
                          <option selected>Select country</option>
                            <?php
                            $add_country = getAll("add_country");

                            if(mysqli_num_rows($add_country) > 0)
                            {
                                foreach ($add_country as $item){
                                    ?>
                                     <option value="<?= $item['id']; ?>"><?= $item['location']; ?></option>
                                    <?php
                                }
                            }
                           else{
                            echo" No Country Available";
                           }

                            ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">City Name</label>
                          <input type="text" name="city_name" class="form-control mb-2" placeholder="Enter City Name">
                        </div>
                      
                        <!-- <div class="col-md-6">
                          <label class="mb-0">Package Name</label>
                          <textarea rows="1" name="package_name" class="form-control mb-2" placeholder="Enter package name"></textarea>
                        </div> -->
                        <div class="col-md-6">
                          <label class="mb-0">Package Type</label>
                          <textarea rows="1" name="package_type" class="form-control mb-2" placeholder="Enter package type"></textarea>
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Price</label>
                          <textarea rows="1" name="price" class="form-control mb-2" placeholder="Enter price"></textarea>
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Slug</label>
                          <input type="text" name="slug" class="form-control mb-2" placeholder="Enter Slug">
                        </div>
                        <div class="col-md-12">
                          <label class="mb-0">Heading</label>
                          <textarea rows="1" name="heading" class="form-control mb-2" placeholder="Enter heading"></textarea>
                        </div>
                        <div class="col-md-12">
                          <label class="mb-0">Description</label>
                          <textarea rows="2" name="description" class="form-control mb-2" placeholder="Enter Description"></textarea>
                        </div>
                        
                        <!-- <div class="col-md-6">
                          <label class="mb-0">Duration</label>
                          <textarea rows="1" name="duration" class="form-control mb-2" placeholder="Enter duration"></textarea>
                        </div> -->
                        <div class="col-md-6">
                          <label class="mb-0">Upload Image</label>
                          <input type="file" name="image1" class="form-control mb-2" >
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Upload Image</label>
                          <input type="file" name="image2" class="form-control mb-2" >
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Upload Image</label>
                          <input type="file" name="image3" class="form-control mb-2" >
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Upload Image</label>
                          <input type="file" name="image4" class="form-control mb-2" >
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Location</label>
                          <input type="text" name="location" class="form-control mb-2" placeholder="Enter location">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">detail1</label>
                          <input type="text" name="detail1" class="form-control mb-2" placeholder="Enter detail">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">detail2</label>
                          <input type="text" name="detail2" class="form-control mb-2" placeholder="Enter detail">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">detail3</label>
                          <input type="text" name="detail3" class="form-control mb-2" placeholder="Enter detail">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat1</label>
                          <input type="text" name="Iterat1" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat2</label>
                          <input type="text" name="Iterat2" class="form-control mb-2" placeholder="Enter detail">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat3</label>
                          <input type="text" name="Iterat3" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat4</label>
                          <input type="text" name="Iterat4" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                        <div class="col-md-6">
                          <label class="mb-0">Iterat5</label>
                          <input type="text" name="Iterat5" class="form-control mb-2" placeholder="Enter Iteration">
                        </div>
                                             
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add-city-btn">Save</button>
                        </div>
                      
                        
                        
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
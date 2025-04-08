<?php 
session_start();
include('functions/authentication.php');
include('includes/header.php');
include('functions/authcode.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Country Details </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-12">
                          <label for="">Upload Image</label>
                          <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="col-md-12">
                          <label for="">Location<Title></Title></label>
                          <input type="text" name="location" class="form-control" placeholder="Enter Location">
                        </div>
                        <div class="col-md-6">
                          <label for="">Type of trip</label>
                          <input type="text" name="Type_of_trip" class="form-control" placeholder="Enter trip type">
                        </div>
                        <div class="col-md-6">
                          <label for="">Slug</label>
                          <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                        </div>
                        <div class="col-md-12">
                          <label for="">Starting Price</label>
                          <textarea rows="3" name="price" class="form-control" placeholder="Enter price"></textarea>
                        </div>
                       
                        
                        <div class="col-md-12">
                          <label for="">Heading</label>
                          <textarea rows="3" name="heading" class="form-control" placeholder="Enter Heading"></textarea>
                        </div>
                        <div class="col-md-12">
                          <label for="">Upload Image</label>
                          <input type="file" name="explore_image" class="form-control" >
                        </div>
                       
                        <div class="col-md-12">
                          <label for="">Meta Descrption</label>
                          <textarea rows="3" name="meta_description" class="form-control" placeholder="Enter Meta-Description"></textarea>
                        </div>
                        <!-- <div class="col-md-12">
                          <label for="">Creation date</label>
                          <textarea rows="3" name="creation_date" class="form-control" placeholder="Enter creation date"></textarea>
                        </div> -->
                      
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add-category-btn">Save</button>
                        </div>
                        <!-- <div class="col-md-6">
                          <label for="">creation date</label>
                          <input type="text" name="creation_date" class="form-control" placeholder="Enter creation date">
                        </div> -->
                        
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
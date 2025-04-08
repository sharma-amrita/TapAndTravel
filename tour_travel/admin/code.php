<?php

include('config/dbcon.php');
include('functions/myfunction.php');

if (isset($_POST['add-category-btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $price = $_POST['price']; // Ensure this matches the form field name
    $location = $_POST['location'];
    $meta_description = $_POST['meta_description']; 
    $heading = $_POST['heading'];
    $Type_of_trip = $_POST['Type_of_trip'];
    $image = $_FILES['image']['name'];
    $explore_image = $_FILES['explore_image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $explore_image_ext = pathinfo($explore_image, PATHINFO_EXTENSION);
    $filenames = time() . '1.' . $explore_image_ext; // Differentiate filenames

    $cate_query = "INSERT INTO add_country
    (name, slug, price, location, meta_description, Type_of_trip,heading, image, explore_image)
    VALUES ('$name', '$slug', '$price', '$location', '$meta_description','$Type_of_trip', '$heading', '$filename', '$filenames')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        move_uploaded_file($_FILES['explore_image']['tmp_name'], $path . '/' . $filenames);
        redirect("add_country.php", "Country Added Successfully");
    } else {
        die("Query Failed: " . mysqli_error($con));
    }
}

else if (isset($_POST['Update-country-btn'])) {
    $id = $_POST['id']; // Ensure ID is retrieved from the form
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $meta_description = $_POST['meta_description'];
    $heading = $_POST['heading'];
    $Type_of_trip = $_POST['Type_of_trip'];
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $new_explore_image = $_FILES['explore_image']['name'];
    $old_explore_image = $_POST['old_explore_image'];

    $path = "../uploads";

    // Handle the new image file
    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    // Handle the new explore image file
    if ($new_explore_image != "") {
        $explore_image_ext = pathinfo($new_explore_image, PATHINFO_EXTENSION);
        $update_filenames = time() . '1.' . $explore_image_ext; // Differentiate filenames
    } else {
        $update_filenames = $old_explore_image;
    }

    // Update query
    $update_query = "UPDATE add_country 
                     SET name='$name', slug='$slug', location='$location', heading='$heading', Type_of_trip='$Type_of_trip',
                         price='$price', meta_description='$meta_description', 
                         image='$update_filename', explore_image='$update_filenames' 
                     WHERE id='$id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        // Move new image file & delete old one
        if ($new_image != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists($path . '/' . $old_image)) {
                unlink($path . '/' . $old_image);
            }
        }

        // Move new explore image file & delete old one
        if ($new_explore_image != "") {
            move_uploaded_file($_FILES['explore_image']['tmp_name'], $path . '/' . $update_filenames);
            if (file_exists($path . '/' . $old_explore_image)) {
                unlink($path . '/' . $old_explore_image);
            }
        }

        redirect("edit-country.php?id=$id", "Country Updated Successfully");
    } else {
        die("Query Failed: " . mysqli_error($con)); // Debugging
    }
}

else if (isset($_POST['delete-country-btn']))
{
    $category_id = mysqli_real_escape_string($con , $_POST['id']);

     $category_query = "SELECT * FROM country WHERE id='$id'";
     $category_query_run = mysqli_query($con, $category_query);
     $category_data = mysqli_fetch_array($category_query_run);
     $image = $category_data['image'];

    $delete_query = "DELETE FROM country WHERE id='$id'";
    $delete_query_run = mysqli_query($con , $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        // redirect("category.php" , "Category Deleted Sucessfully");
        echo 200;
    }
    else{
        // redirect("category.php" , "Something Went Wrong");
        echo 500;
    }
}
else if (isset($_POST['add-city-btn'])) {
    $id = $_POST['id'];
    $city_name = mysqli_real_escape_string($con, $_POST['city_name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $package_type = mysqli_real_escape_string($con, $_POST['package_type']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $detail1 = mysqli_real_escape_string($con, $_POST['detail1']);
    $detail2 = mysqli_real_escape_string($con, $_POST['detail2']);
    $detail3 = mysqli_real_escape_string($con, $_POST['detail3']);
    $Iterat1 = mysqli_real_escape_string($con, $_POST['Iterat1']);
    $Iterat2 = mysqli_real_escape_string($con, $_POST['Iterat2']);
    $Iterat3 = mysqli_real_escape_string($con, $_POST['Iterat3']);
    $Iterat4 = mysqli_real_escape_string($con, $_POST['Iterat4']);
    $Iterat5 = mysqli_real_escape_string($con, $_POST['Iterat5']);

    // File upload handling
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];

    $path = "../uploads";

    $image_ext1 = pathinfo($image1, PATHINFO_EXTENSION);
    $filename1 = time() . '.' . $image_ext1;
    $image_ext2 = pathinfo($image2, PATHINFO_EXTENSION);
    $filename2 = time() . '.1' . $image_ext2;
    $image_ext3 = pathinfo($image3, PATHINFO_EXTENSION);
    $filename3 = time() . '.2' . $image_ext3;
    $image_ext4 = pathinfo($image4, PATHINFO_EXTENSION);
    $filename4 = time() . '.3' . $image_ext4;

    // Ensure required fields are not empty
    if ($city_name != "" && $description != "") {
        $product_query = "INSERT INTO add_city (id, city_name, slug, package_type, heading, price, description, image1, image2, image3, image4, location, detail1, detail2, detail3, Iterat1,  Iterat2, Iterat3, Iterat4 , Iterat5)
                          VALUES ('$id', '$city_name', '$slug', '$package_type', '$heading', '$price', '$description', '$filename1', '$filename2', '$filename3', '$filename4','$location', '$detail1', '$detail2', '$detail3','$Iterat1','$Iterat2','$Iterat3','$Iterat4','$Iterat5')";

        $product_query_run = mysqli_query($con, $product_query);

        if ($product_query_run) {
            move_uploaded_file($_FILES['image1']['tmp_name'], $path . '/' . $filename1);
            move_uploaded_file($_FILES['image2']['tmp_name'], $path . '/' . $filename2);
            move_uploaded_file($_FILES['image3']['tmp_name'], $path . '/' . $filename3);
            move_uploaded_file($_FILES['image4']['tmp_name'], $path . '/' . $filename4);
            redirect("add_city.php", "City details added successfully.");
        } else {
            echo "Error: " . mysqli_error($con);
            redirect("index.php", "Something went wrong.");
        }
    } else {
        redirect("city.php", "All fields are mandatory.");
    }
}

else if(isset($_POST['update-city-btn']))
{
    $city_id = $_POST['city_id'];
    $id = $_POST['id'];

    $city_name = mysqli_real_escape_string($con, $_POST['city_name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $package_type = mysqli_real_escape_string($con, $_POST['package_type']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $detail1 = mysqli_real_escape_string($con, $_POST['detail1']);
    $detail2 = mysqli_real_escape_string($con, $_POST['detail2']);
    $detail3 = mysqli_real_escape_string($con, $_POST['detail3']);
    $Iterat1 = mysqli_real_escape_string($con, $_POST['Iterat1']);
    $Iterat2 = mysqli_real_escape_string($con, $_POST['Iterat2']);
    $Iterat3 = mysqli_real_escape_string($con, $_POST['Iterat3']);
    $Iterat4 = mysqli_real_escape_string($con, $_POST['Iterat4']);
    $Iterat5 = mysqli_real_escape_string($con, $_POST['Iterat5']);
    $path = "../uploads/";

    // Image handling
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];

    $old_image1 = $_POST['old_image1'];
    $old_image2 = $_POST['old_image2'];
    $old_image3 = $_POST['old_image3'];
    $old_image4 = $_POST['old_image4'];

    // Function to handle image upload
    function handleImageUpload($imageField, $old_image)
    {
        global $path;
        if (!empty($_FILES[$imageField]['name'])) {
            $image_ext = pathinfo($_FILES[$imageField]['name'], PATHINFO_EXTENSION);
            $update_filename = time() . rand(1000, 9999) . '.' . $image_ext;
            
            if (move_uploaded_file($_FILES[$imageField]['tmp_name'], $path . $update_filename)) {
                if (!empty($old_image) && file_exists($path . $old_image)) {
                    unlink($path . $old_image);
                }
                return $update_filename;
            }
        }
        return $old_image;
    }

    // Process images
    $update_filename1 = handleImageUpload('image1', $old_image1);
    $update_filename2 = handleImageUpload('image2', $old_image2);
    $update_filename3 = handleImageUpload('image3', $old_image3);
    $update_filename4 = handleImageUpload('image4', $old_image4);

    // Update Query (Fixed)
    $update_product_query = "UPDATE add_city SET 
        city_id='$city_id',
        city_name='$city_name', 
        slug='$slug', 
        heading='$heading', 
        description='$description', 
          location='$location',
        package_type='$package_type', 
        price='$price', 
        image1='$update_filename1',
        image2='$update_filename2',
        image3='$update_filename3',
        image4='$update_filename4',
      
        detail1='$detail1',  
        detail2='$detail2',  
        detail3='$detail3' ,

        Iterat1 = '$Iterat1', 
        Iterat2 = '$Iterat2', 
        Iterat3 = '$Iterat3', 
        Iterat4 = '$Iterat4',  
        Iterat5 = '$Iterat5'

        WHERE city_id='$city_id'"; // Fixed extra comma issue

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run) {
        redirect("edit_city.php?city_id=$city_id", "City Updated Successfully");
    } else {
        echo "Error: " . mysqli_error($con);
        redirect("edit_city.php?city_id=$city_id", "Something Went Wrong");
    }
}



else if(isset($_POST['delete-product-btn']))
{
    $product_id = mysqli_real_escape_string($con , $_POST['product_id']);

     $product_query = "SELECT * FROM products WHERE id='$product_id'";
     $product_query_run = mysqli_query($con, $product_query);
     $product_data = mysqli_fetch_array($product_query_run);
     $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con , $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        // redirect("products.php" , "product Deleted Sucessfully");
        echo 200;
        
    }
    else{
        // redirect("products.php" , "Something Went Wrong");
        echo 500;
    }
}
else
{
  header('Location: ../index.php');
}
?>
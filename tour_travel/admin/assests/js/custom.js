
$(document).ready(function (){

    $('.addtocartbtn').click(function (e) {
      e.preventDefault();
      alert(working);
   
   var qty = $(this).closest('#product_data').find('.input-qty').val();
   var prod_id = $(this).val();
   
   alert(prod_id);
   
   $.ajax({
    method: "POST",
    url: "./admin/functions/handlecart.php",
    data: {
      "prod_id": prod_id,
      "prod_qty": qty,
      "scope": "add"
    },
    success: function (response){
      alert("response");
       if(response == 201) 
       {
        alertify.success("Product added to cart");
       } 
       else if(response == "existing") 
       {
        alertify.success("Product already in cart");
       }
       else if(response == 401)
       {   
        alertify.success("login to continue");
       }
       else if(response == 500)
       {
        alertify.success("Something went wrong");
       }
    }
   });
  });
  
  
    $('.quantity-right-plus').click(function (e) {
      e.preventDefault();
  
      var qty = $(this).closest('#product_data').find('.input-qty').val();
  
      var value = parseInt(qty, 10);
      value = isNaN(value) ? 0 : value;
      if(value < 10)
      {
        value++;
        $('.input-qty').val(value);
        $(this).closest('#product_data').find('.input-qty').val(value);
      }
    });
  
    $('.quantity-left-minus').click(function (e) {
      e.preventDefault();
  
      var qty = $(this).closest('#product_data').find('.input-qty').val();
  
      var value = parseInt(qty, 10);
      value = isNaN(value) ? 0 : value;
      if(value > 1)
      {
        value--;
        $('.input-qty').val(value);
        $(this).closest('#product_data').find('.input-qty').val(value);
      }
    });
  
  //       A D D   T O     C A R T     B U T T O N S
  
  
  
  });
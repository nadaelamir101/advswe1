
//etrieve data from the server without reloading the whole page
function showProductItems(){  
    // Sends an AJAX request to fetch and display all products by calling the viewAllProducts.php 
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCategory(){  
    //Sends an AJAX request to fetch and display all categories by calling the `viewCategories.php` file.
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showSizes(){  
    //Sends an AJAX request to fetch and display all categories by calling the viewSizes.php file.
    $.ajax({
        url:"./adminView/viewSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProductSizes(){  
    $.ajax({
        url:"./adminView/viewProductSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

// function ChangePay(id){
//     $.ajax({
//        url:"./controller/updatePayStatus.php",
//        method:"post",
//        data:{record:id},
//        success:function(data){
//            alert('Payment Status updated successfully');
//            $('form').trigger('reset');
//            showOrders();
//        }
//    });
// }


//add product data
//Gathers form data and sends an AJAX request 
function addItems(){
    // var ___ are assigned the values of corresponding input fields i the form
    var p_name=$('#p_name').val();
    var p_desc=$('#p_desc').val();
    var p_price=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    // FormData object-> to handle file uploads
    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//delete product data
function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
// function cartDelete(id){
//     $.ajax({
//         url:"./controller/deleteCartController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Cart Item Successfully deleted');
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }

// function eachDetailsForm(id){
//     $.ajax({
//         url:"./view/viewEachDetails.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function sizeDelete(id){
    $.ajax({
        url:"./controller/deleteSizeController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function variationDelete(id){
    $.ajax({
        url:"./controller/deleteVariationController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
//Sends an AJAX request to fetch and display an edit form
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations(){
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      //btt2ked eno post
      method:'post',
      //the data property is set to  fd object , which contains form data
      data:fd,
      // processData: false =>to prevent to prevent
      // jquery from automatically process the data

      processData: false,
//contentt=>false 3shan tkhle l browser y3rf el 
//appropriate cotent type for the request
      contentType: false,
      //callback fun to be executed if the req is successful
      //byreset el form
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showProductSizes();
      }
    });
}
// function search(id){
//     $.ajax({
//         url:"./controller/searchController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('.eachCategoryProducts').html(data);
//         }
//     });
// }


// function quantityPlus(id){ 
//     $.ajax({
//         url:"./controller/addQuantityController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }
// function quantityMinus(id){
//     $.ajax({
//         url:"./controller/subQuantityController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }

// function checkout(){
//     $.ajax({
//         url:"./view/viewCheckout.php",
//         method:"post",
//         data:{record:1},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }


// function removeFromWish(id){
//     $.ajax({
//         url:"./controller/removeFromWishlist.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Removed from wishlist');
//         }
//     });
// }


// function addToWish(id){
//     $.ajax({
//         url:"./controller/addToWishlist.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Added to wishlist');        
//         }
//     });
// }
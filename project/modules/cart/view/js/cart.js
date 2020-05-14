////////////////////
///ADD TO CART
//////////////////////
var addselected = function(id) {
    return new Promise(function(resolve) {
        $.ajax({
            type: "POST",
            url: "?module=cart&function=addproduct",
            dataType: "JSON",
            data: {'id':id, 'token':localStorage.getItem('id_token')}
        })
        .done(function( data, textStatus, jqXHR ) {
            resolve(data);
        })
    });
}


function tocart(){
    $('body').on("click", ".addtocart", function() {
        var id = this.getAttribute('id');

        if(localStorage.getItem('id_token')){
// ADD TO DATABASE(USER LOGED)   
            addselected(id)
            .then(function(data){
                if(data==="exists"){
                    toastr["error"]("You already have this product in your cart", "ERROR");
                }else{
                    toastr["success"]("Product added successfully to cart", "PRODUCT ADDED");
                }
            })
        }else{
// ADD TO LOCALSTORAGE(USER NOT LOGED)
            if(!localStorage.getItem('cart')){
                var arrcart = [];
                var objcart = {id: id, quantity: 1};

                arrcart.push(objcart);

                var JSONcart = JSON.stringify(arrcart);
                localStorage.setItem('cart', JSONcart);

                toastr["success"]("Product added successfully to cart", "PRODUCT ADDED");
            }else{
                var repeat = "false";
                var arrcart = JSON.parse(localStorage['cart']);

                for(var i=0; i<arrcart.length; i++){
                    if(arrcart[i].id===id){
                        repeat="true";
                    }
                }

                if(repeat==="true"){
                    toastr["error"]("You already have this product in your cart", "ERROR");
                }else{
                    var objcart = {id: id, quantity: 1};
                    arrcart.push(objcart);

                    var JSONcart = JSON.stringify(arrcart);
                    localStorage.setItem('cart', JSONcart);

                    toastr["success"]("Product added successfully to cart", "PRODUCT ADDED");
                }
            }
        }
    })
}



$(document).ready(function () {

    tocart();

})
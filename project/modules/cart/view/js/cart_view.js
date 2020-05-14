
//////////////////
////////"GO TO SHOP" BUTTON
//////////////////
function gotoshop(){
    $('body').on("click", "#gotoshop", function() {
        setTimeout('window.location.href = "?module=shop&function=list_shop",1000');
    })

}




/////////////////
/////CHECK USER'S CART
/////////////////////

// DATABASE
var cartdb = function() {
    return new Promise(function(resolve) {
        $.ajax({
            type: "POST",
            url: "?module=cart&function=showcart",
            data: {'token':localStorage.getItem('id_token')},
            dataType: "JSON"
        })
          .done(function( cart, textStatus, jqXHR ) {
              resolve(cart);
          })
    });
}

// LOCALSTORAGE
var localcart = function(id) {
    return new Promise(function(resolve) {
        $.ajax({
            type: "GET",
            url: "?module=cart&function=showlocalcart&id="+id,
            dataType: "JSON"
        })
        .done(function( cart, textStatus, jqXHR ) {
            resolve(cart);
        })
    });
}



////////////////////
///LOCAL TO DB
//////////////////////
var localtodb = function(id) {
    return new Promise(function(resolve) {
        $.ajax({
            type: "POST",
            url: "?module=cart&function=localdb",
            data: {'id':id, 'token':localStorage.getItem('id_token')},
        })
    });
}




/////////////////
/////PUT LOCALSTORAGE (if exists) INTO DB (if user is loged)
/////////////////////
function fromlocaltodb(){
    if(localStorage.getItem('cart')){
        if(localStorage.getItem('id_token')){
            var JSONcart = JSON.parse(localStorage.getItem('cart'));

            for(var i=0; i<JSONcart.length; i++){
                localtodb(JSONcart[i].id)
            }
            
            localStorage.removeItem('cart');
            localStorage.removeItem('cart2');
        }
    }
}





/////////////////
/////SHOW CART
/////////////////////
function showcart(){
    if(localStorage.getItem('id_token')){
// LOGED
        cartdb()
        .then(function(cart){
            if(cart.length===0){
// LOGED AND NO CART
                $('.cart').empty();
                $('<div></div>').attr('id','cartdetails').appendTo('.cart');

                $("#cartdetails").html(
                        '<p class="emptycart"><b>CART IS EMPTY</b></p>'+
                        '<div class="gotoshop"><input type="button" id="gotoshop" value="GO TO SHOP"></div>'
                );

            }else{
// LOGED AND CART
                $('.cart').empty();
                $('<div></div>').attr('id','leftcart').appendTo('.cart');
                $('<div></div>').attr('id','rightcart').appendTo('.cart');

                var showcart = "";
                var totalcart = 0;

                for(var i=0; i<cart.length; i++){
                    showcart+="<div class='cartrow'><table class='tablecart'>"+
                    "<tr><td><img class='imgcart' id='"+cart[i].idproduct+"' src='"+cart[i].img+"'/></td>"+
                    "<td><b>"+cart[i].product+" - "+cart[i].brand+"</b><br><br>"+cart[i].kg+"Kg "+cart[i].flavour+"<br>Preferred consumption: "+cart[i].datecaducity+"<br><br><b>"+cart[i].price+"€</b><br><input type='button' class='deletefromcart' id='"+cart[i].idproduct+"' value='DELETE FROM CART'/></td>"+
                    "<td><b>"+cart[i].total+"€</b><br><input type='number' class='changeq' id='"+cart[i].idproduct+"' min='1' max='99' style='width: 7em' value='"+cart[i].quantity+"'/></td></tr>"+
                    "</table></div>";
                    
                    totalcart+=parseInt(cart[i].total);
                }

                $('#leftcart').html(
                    showcart
                );

                $('#rightcart').html(
                    "<div class='totalcart'><table class='tabletotal'"+
                    "<tr><td>Subtotal: "+totalcart+"€</td></tr>"+
                    "<tr><td><b>Total: "+totalcart+"€</b></td></tr>"+
                    "<tr><td><input type='button' class='finishorder' value='FINISH ORDER'/></td></tr>"+
                    "</table></div>"
                );
            }
        })
    }else{
// NOT LOGED
        if(!localStorage.getItem('cart')){
// NOT LOGED AND NO LOCALSTORAGE
            $('.cart').empty();      
            $('<div></div>').attr('id','cartdetails').appendTo('.cart');

            $("#cartdetails").html(
                '<p class="emptycart"><b>CART IS EMPTY</b></p>'+
                '<div class="gotoshop"><input type="button" id="gotoshop" value="GO TO SHOP"></div>'
            );

        }else{
// NOT LOGED AND LOCALSTORAGE
            var JSONcart = JSON.parse(localStorage.getItem('cart'));

            // Meter la info de los productos en un array en localstorage
            for(var i=0; i<JSONcart.length; i++){
                // localStorage.setItem('quantity', JSONcart[i].quantity);

                localcart(JSONcart[i].id)
                .then(function(cart){
                    if(!localStorage.getItem('cart2')){
                        var arrcart2=[];
                        arrcart2.push(cart);
                        var JSONcart2 = JSON.stringify(arrcart2);

                        localStorage.setItem('cart2', JSONcart2);
                    }else{
                        var arrcart2 = JSON.parse(localStorage.getItem('cart2'));
                        arrcart2.push(cart);
                        var JSONcart2 = JSON.stringify(arrcart2);

                        localStorage.setItem('cart2', JSONcart2);
                    }
                })
            }

            var cart = JSON.parse(localStorage.getItem('cart2'));

            $('.cart').empty();
            $('<div></div>').attr('id','leftcart').appendTo('.cart');
            $('<div></div>').attr('id','rightcart').appendTo('.cart');

            var showcart = "";
            var totalcart = 0;

            for(var i=0; i<cart.length; i++){
                showcart+="<div class='cartrow'><table class='tablecart'>"+
                "<tr><td><img class='imgcart' id='"+cart[i].idproduct+"' src='"+cart[i].img+"'/></td>"+
                "<td><b>"+cart[i].product+" - "+cart[i].brand+"</b><br><br>"+cart[i].kg+"Kg "+cart[i].flavour+"<br>Preferred consumption: "+cart[i].datecaducity+"<br><br><b>"+cart[i].price+"€</b><br><input type='button' class='deletefromcart' id='"+cart[i].idproduct+"' value='DELETE FROM CART'/></td>"+
                "<td><b>"+cart[i].price+"€</b><br><input type='number' class='changeq' id='"+cart[i].idproduct+"' min='1' max='99' style='width: 7em' value='1'/></td></tr>"+
                "</table></div>";
                
                totalcart+=parseInt(cart[i].price);
            }

            $('#leftcart').html(
                showcart
            );

            $('#rightcart').html(
                "<div class='totalcart'><table class='tabletotal'"+
                "<tr><td>Subtotal: "+totalcart+"€</td></tr>"+
                "<tr><td><b>Total: "+totalcart+"€</b></td></tr>"+
                "<tr><td><input type='button' class='finishorder' value='FINISH ORDER'/></td></tr>"+
                "</table></div>"
            );

        }

        localStorage.removeItem('cart2');
    }
}




////////////////
////DELETE FROM CART
///////////////////////
function deletefromcart(){
    $('body').on("click", ".deletefromcart", function() {
        var id = this.getAttribute('id');

        if(localStorage.getItem('id_token')){
// DELETE FOR LOGED USER
            $.ajax({
                type: "POST",
                url: "?module=cart&function=delete",
                data: {'token':localStorage.getItem('id_token'), 'id':id}
            })
            .done(function() {
                showcart();
            })

        }else{
// DELETE FOR NOT LOGED USER
            var arrcart = JSON.parse(localStorage['cart']);

            for(var i=0; i<arrcart.length; i++){
                if(arrcart[i].id===id){
                    var del = i;
                    i=arrcart.length-1;
                }
            }

            if(arrcart.length===1){
                localStorage.removeItem('cart');
            }else{
                arrcart.splice(del, 1);

                var JSONcart = JSON.stringify(arrcart);
                console.log(JSONcart);
                localStorage.setItem('cart', JSONcart);
            }

            // setTimeout(function() {
            //     window.location.href = "?module=cart&function=list_cart"
            // }, 1000);

            showcart();
        }
    })
}





/////////////////
//////UPDATE QUANTITY
////////////////////
function quantity(){
    $('body').on("keyup", ".changeq", function() {
        var auto=$(this).val();
        var id = this.getAttribute('id');

        if(localStorage.getItem('id_token')){
// LOGED USER CHANGE QUANTITY
            $.ajax({
                type: "POST",
                url: "?module=cart&function=changequ",
                data: {'num':auto, 'id':id, 'token':localStorage.getItem('id_token')}
            })
            showcart();
        }else{
// NOT LOGED USER CHANGE QUANTITY
            toastr["info"]("You need to log in to continue shopping", "LOG IN");
            setTimeout(function() {
                window.location.href = "?module=login&function=list_login&purch=on"
            }, 2000);
        }
    })
    
    
    $('body').on("change", ".changeq", function() {
        var auto=$(this).val();
        var id = this.getAttribute('id');
        
        if(localStorage.getItem('id_token')){
// LOGED USER CHANGE QUANTITY
            $.ajax({
                type: "GET",
                url: "?module=cart&function=changequ",
                data: {'num':auto, 'id':id, 'token':localStorage.getItem('id_token')}
            })
            showcart();
        }else{
// NOT LOGED USER CHANGE QUANTITY
            toastr["info"]("You need to log in to continue shopping", "LOG IN");
            setTimeout(function() {
                window.location.href = "?module=contact&function=list_login&purch=on"
            }, 2000);
        }
    })
}





/////////////////
/////CHECK-OUT
///////////////////
function checkout(){
    $('body').on("click", ".finishorder", function() {
        if(localStorage.getItem('id_token')){
// CHECKOUT FOR LOGED USER
            toastr["success"]("Products purchased", "SUCCESS");

            $.ajax({
                type: "POST",
                url: "?module=cart&function=checkout",
                data: {'token':localStorage.getItem('id_token')}
            })
            setTimeout(function() {
                window.location.href = "?module=cart&function=list_cart"
            }, 2000);
        }else{
// CHECKOUT FOR NOT LOGED USER
            toastr["info"]("Log in to purchase your orded", "LOG IN");
            setTimeout(function() {
                window.location.href = "?module=login&function=list_login&purch=on"
            }, 2000);
        }
    })
}




$(document).ready(function () {

    gotoshop();
    fromlocaltodb();
    showcart();
    deletefromcart();
    quantity();
    checkout();

})
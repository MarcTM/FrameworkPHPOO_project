
////////////////////
///CHECK IF USER IS LOGED
//////////////////////
var logedornot = function() {
    return new Promise(function(resolve) {
        $.ajax({
            type: "GET",
            url: "?module=cart&function=logincart",
        })
          .done(function( loged, textStatus, jqXHR ) {
              resolve(loged);
          })
          .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "La solicitud ha fallado: " +  textStatus);
            }
       });
    });
}




////////////////////
///LOCAL TO DB
//////////////////////
var localtodb = function(id) {
    return new Promise(function(resolve) {
        $.ajax({
            type: "GET",
            url: "?module=cart&function=localdb&id="+id,
        })
    });
}




/////////////////
/////PUT LOCALSTORAGE (if exists) INTO DB (if user is loged)
/////////////////////
function fromlocaltodb(){
    if(localStorage.getItem('cart')){
        logedornot()
        .then(function(loged){
            if(loged==="true"){
                var JSONcart = JSON.parse(localStorage.getItem('cart'));

                for(var i=0; i<JSONcart.length; i++){
                    localtodb(JSONcart[i].id)
                }

                localStorage.removeItem('cart');
                localStorage.removeItem('cart2');
            }
        })
    }
}




////////////////
//CAROUSEL
//////////
function carousel() {
    $.ajax({
        url: "?module=home&function=carousel",
        type: "GET",
        dataType: "JSON",
    })
    .done(function(data) {
        console.log(data);
        console.log(data[1].url);
        var img = "";
        for (var i=0; i<data.length; i++ ){
            img += '<div id="s2"><img class="clickcar" id="'+data[i].id+'" src="'+data[i].url+'"></div>'
        }

        $('.slider').empty();
        $('.slider').html(
            img
        );

        $('.slider').bxSlider({
            mode: 'fade',
            captions: true,
            adaptiveHeight: true,
            speed: 400,
            auto: true,
            infiniteLoop: true
        });
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
             console.log( "La solicitud ha fallado: " +  textStatus);
         }
    });
}

function click_carousel(){
    $('body').on('click', '.clickcar', function() {
        localStorage.removeItem('province');
        localStorage.removeItem('shop');
        localStorage.removeItem('val');
        localStorage.removeItem('category');

        var car = this.getAttribute('id');
        console.log(car);
    
        localStorage.setItem('carousel', car);

        setTimeout('window.location.href = "?module=shop&function=list_shop",1000');
    });
}




////////////////
//CATEGORIES
///////////
function ajaxForSearch(offset){
    $.ajax({
        url: "?module=home&function=category&offset="+offset,
        type: "GET",
        dataType: "JSON",
    })
    .done(function(data) {  
        var cate = "";
        for (var i=0; i<data.length; i++ ){
            cate += '<div class="col-lg-4"><img class="img-responsive" id="'+data[i].id+'" src="'+data[i].url+'"/><p><b>'+data[i].cat+'</b></p></div>'
        }

        $('.cate').html(
            '<div class="bx-controls-direction">'+
            '<a class="prev">Prev</a> | '+
            '<a class="next">Next</a>'+
            '</div><br><br>'+
            cate
        );
     })
};

function category() {
    $.ajax({
        url: "?module=home&function=count_cat",
        type: "GET",
        dataType: "JSON",
    })
    .done(function(data) {
        var cuenta = data.cuenta;
        var offset = 0;

        ajaxForSearch(offset);
    
        $(document).on("click", ".next", function() {
           offset += 4;
           if(offset>=cuenta){
               offset -= 4;
           }
           ajaxForSearch(offset);
        });
    
        $(document).on("click", ".prev", function() {
            offset -= 4;
            if(offset<0){
                offset += 4;
            }
            ajaxForSearch(offset);
        });
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud ha fallado: " +  textStatus);
        }
   });
}

function select_cat() {
    $('.cate').on("click", ".img-responsive", function() {
        localStorage.removeItem('carousel');
        localStorage.removeItem('province');
        localStorage.removeItem('shop');
        localStorage.removeItem('val');
        
        var cat = this.getAttribute('id');

        $.ajax({
            url: "?module=home&function=cat_views&cat="+cat,
            type: "GET",
            dataType: "JSON",
        })

        localStorage.setItem('category', cat);

        setTimeout('window.location.href = "?module=shop&function=list_shop",1000');
    });
}





////////////////////
//MORE VISITED
///////////////
function byviews(offset) {
    $.ajax({
           url: "?module=home&function=views&offset="+offset,
           type: "GET",
           dataType: "JSON",
       })
       .done(function(data) {//CHECK SESSION AND DRAWS FAVORITES
            var vvv="";

            if(!localStorage.getItem('id_token')){
                for (var i=0; i<data.length; i++ ){
                    vvv += '<div class="col-lg-4"><img class="img-responsive" id="'+data[i].idproduct+'" src="'+data[i].img+'"/><img id="'+data[i].idproduct+'" class="favorites" src="view/assets/img/favorites/corazonblanco.png"/><p>'+data[i].product+' - '+data[i].kg+'KG<br>'+data[i].brand+'<br>'+data[i].price+'€</p><input type="button" class="addtocart" name="addtocart" id="'+data[i].idproduct+'" value="ADD TO CART"/></div>'
                }

                $('.byviews').html(
                    '<div class="bx-controls-direction">'+
                    '<a class="prev2">Prev</a> | '+
                    '<a class="next2">Next</a>'+
                    '</div><br><br>'+
                    vvv
                );
            }else{
                for (var i=0; i<data.length; i++ ){
                    vvv += '<div class="col-lg-4"><img class="img-responsive" id="'+data[i].idproduct+'" src="'+data[i].img+'"/><img id="'+data[i].idproduct+'" class="favorites" src="view/assets/img/favorites/corazonblanco.png"/><p>'+data[i].product+' - '+data[i].kg+'KG<br>'+data[i].brand+'<br>'+data[i].price+'€</p><input type="button" class="addtocart" name="addtocart" id="'+data[i].idproduct+'" value="ADD TO CART"/></div>'
                }

                $('.byviews').html(
                    '<div class="bx-controls-direction">'+
                    '<a class="prev2">Prev</a> | '+
                    '<a class="next2">Next</a>'+
                    '</div><br><br>'+
                    vvv
                );

                favuser() //favuser.js
                .then(function(data){
                    for(var i=0; i<data.length; i++){
                        $(".favorites[id="+data[i].prod+"]").attr("src", "view/assets/img/favorites/corazonrojo.png");
                    }
                })
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "La solicitud ha fallado: " +  textStatus);
            }
       });
   
}

function prods_views() {
    $.ajax({
        url: "?module=home&function=count_prods",
        type: "GET",
        dataType: "JSON",
    })
    .done(function(data) {
        var cuenta = data.cuenta;
        var offset = 0;

        byviews(offset);

        $(document).on("click", ".next2", function() {
            offset += 4;
            if(offset>=cuenta){
                offset -= 4;
            }
            byviews(offset);
        });

        $(document).on("click", ".prev2", function() {
            offset -= 4;
            if(offset<0){
                offset += 4;
            }
            byviews(offset);
        });
    })
}

    

function read_prod() {
    $('.byviews').on("click", ".img-responsive", function() {

        var id = this.getAttribute('id');
        localStorage.setItem('infoprod', id);

        setTimeout('window.location.href = "?module=details&function=list_details",1000');
    })
}



////////////////////
//APIs
///////////////
var get_apibooks = function() {
    return new Promise(function(resolve, reject) {
     $.ajax({ 
              type: 'GET', 
              url: "https://www.googleapis.com/books/v1/volumes?q=nutrition", 
              dataType: 'JSON',
          })
          .done(function( data, textStatus, jqXHR ) {
              resolve(data);
          })
          .fail(function( jqXHR, textStatus, errorThrown ) {
              if ( console && console.log ) {
                  console.log( "La solicitud ha fallado: " +  textStatus);
                  reject("Error");
              }
          });
    });
}


function apibooks(){
    get_apibooks()
    .then(function(data){
         var api = "";
         for (var i=0; i<4; i++ ){
            var check = "false";
            var random = Math.floor(Math.random() * data.items.length) + 0;
            if (i === 0){
                var arr = [];
                arr.push(random); 

                var link = data.items[random].volumeInfo.infoLink;
                var title = data.items[random].volumeInfo.title;
                var img = data.items[random].volumeInfo.imageLinks.smallThumbnail;
                api += '<div class="col-lg-4"><a href="'+link+'" target="_blank"><img src="'+img+'"/><p><b>"'+title+'"</b></p><a/></div>'
            }else{
                for (var i=0; i<arr.length; i++){
                    if (random === arr[i]){
                        check = "true";
                    }
                }
            
                if (check === "true"){
                    i -= 1;
                }else{
                    arr.push(random);            

                    var link = data.items[random].volumeInfo.infoLink;
                    var title = data.items[random].volumeInfo.title;
                    var img = data.items[random].volumeInfo.imageLinks.smallThumbnail;
                    api += '<div class="col-lg-4"><a href="'+link+'" target="_blank"><img src="'+img+'"/><p><b>"'+title+'"</b></p><a/></div>'
                }
            }
         }
         
         $('.books').html(
             api
         );
    })
    .catch(function(data){
        console.log( "La solicitud ha fallado");
    });
}




///////////////////////
        ////DELETE LOCAL STORAGE FOR SHOP
//////////////////////
function dellocalstorage(){
    $('body').on('click', '#localdel', function() {
        localStorage.removeItem('province');
        localStorage.removeItem('shop');
        localStorage.removeItem('val');
        localStorage.removeItem('category');
        localStorage.removeItem('carousel');
    });
}





$(document).ready(function () {

    // fromlocaltodb();
    carousel();
    click_carousel()
    category();
    select_cat();
    prods_views();
    read_prod();
    apibooks();
    dellocalstorage();

});
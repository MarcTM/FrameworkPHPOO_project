// Promise used in shop.js
var favuser = function() {
    return new Promise(function(resolve) {
        $.ajax({ 
            type: 'POST', 
            url: "?module=favorites&function=checkfav",
            dataType: "JSON",
            data: {'token':localStorage.getItem('id_token')}
        })
        .done(function(data, textStatus, jqXHR) {
            resolve(data);
        })
    });
}




///////////////
/// ADD TO FAVORITES(CLICK)
///////////////////
function tofav(){
    $('body').on("click", ".favorites", function() {
        var id = this.getAttribute('id');
        var estado = this.getAttribute('src');

        if(estado==="view/assets/img/favorites/corazonblanco.png"){
            $(this).attr("src", "view/assets/img/favorites/corazonrojo.png");
        }else{
            $(this).attr("src", "view/assets/img/favorites/corazonblanco.png");
        }


        if(localStorage.getItem('id_token')){
            if(estado==="view/assets/img/favorites/corazonblanco.png"){
                $.ajax({
                    type: "POST",
                    url: "?module=favorites&function=addfav",
                    data: {'id':id, 'token':localStorage.getItem('id_token')}
                })
            }else{
                $.ajax({
                    type: "POST",
                    url: "?module=favorites&function=delfav",
                    data: {'id':id, 'token':localStorage.getItem('id_token')}
                })
            }
        }else{
            toastr["error"]("You must be loged to add to favorites", "LOG IN");
            setTimeout(function() {
                window.location.href = "?module=login&function=list_login"
            }, 2000);
        }
    })
}





$(document).ready(function(){

    tofav();

})
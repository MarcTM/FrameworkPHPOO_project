
function firstslot(){
    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "?module=search&function=prov" 
    })
    .done(function( data, textStatus, jqXHR ) {
        var $drop = $("#province");
        $drop.empty();

        $.each(data, function(i, item) {
            $drop.append("<option>" + item.city + "</option>")        
        });
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
            console.log( "La solicitud ha fallado: " +  textStatus);
    });
}


function secondslot(){
    $("#province").on("change", function () {
        var province = $(this).val();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "?module=search&function=firstdrop&prov=" + province, 
        })
        .done(function( data, textStatus, jqXHR ) {
            var $drop2 = $("#shop");
            $drop2.empty();
            $drop2.append("<option value=\"\">" + "[Select shop]" + "</option>");

            $.each(data, function(i, item) {
                $drop2.append("<option>" + item.name + "</option>")
            });
        });
    });
}


function autocomplete(){
    $("#autocom").on("keyup", function () {
        var auto=$(this).val();
        var shop=$("#shop").val();
        var autCom = {auto: auto, shop: shop}; 
        $.ajax({
            type: "POST",
            url: "?module=search&function=autocomplete",  
            data: autCom,
        })
        .done(function( data, textStatus, jqXHR ) {
            $('#optionsauto').fadeIn(1000).html(data);// se ve
            ///si selecciono valor
            $('.autoelement').on('click', function(){
                var id = $(this).children('a').attr('id');
                console.log(id);
                $('#autocom').val(id);
                
                $('#optionsauto').fadeOut(1000);
            });
        });
    });
}


function searchbutton(){
    $("#searchlist").on("click", function (){
        localStorage.removeItem('carousel');
        localStorage.removeItem('category');
        
        var province = $("#province").val();
        var shop=$("#shop").val();
        var auto=$("#autocom").val();

        console.log(province);
        console.log(shop);
        console.log(auto);

        localStorage.setItem('province', province);
        localStorage.setItem('shop', shop);
        localStorage.setItem('val', auto);

        if((province=="")||(shop=="")||(auto==="")){
            toastr["warning"]("Enter all search fields", "COMPLETE ALL FIELDS");
        }else{
            window.location.href = '?module=shop&function=list_shop';
        }
    });
}


$(document).ready(function () {

    firstslot();
    secondslot();
    autocomplete();
    searchbutton();

});
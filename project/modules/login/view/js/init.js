$(document).ready(function(){
    var token = localStorage.getItem("id_token");
    if (token) {
        
        $('.options2').css("visibility", "visible"); 

        //console.log(token);
        // $.post('../../login/typeuser/',{'token':token},function(data){
        //     if (data != 'false') {
        //         var type = JSON.parse(data);
        //         if (type[0].type === 'admin') {
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=dogs&funciton=create_dogs') + '">Perros</a></li>');
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=ubication&funciton=list_ubication') + '">Ubicacion</a></li>');
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=profile_list') + '">Profile</a></li>');
        //         }
        //         if (type[0].type === 'user') {
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=dogs&funciton=create_dogs') + '">Perros</a></li>');
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=ubication&funciton=list_ubication') + '">Ubicacion</a></li>');
        //             $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=profile_list') + '">Profile</a></li>');
        //         }
        //     }else{
        //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=list_login') + '">Iniciar Sesion</a></li>');        
        //     }
        // });
    }else{
        
        $('.options1').css("visibility", "visible"); 

        // $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=list_login') + '">Iniciar Sesion</a></li>');
    }
});

function socialloginconf(){
    var config = {
        apiKey: apikey_firebase,
        authDomain: "social-login-d7b12.firebaseapp.com",
        databaseURL: "https://social-login-d7b12.firebaseio.com",
        projectId: "social-login-d7b12",
        storageBucket: "social-login-d7b12.appspot.com",
        messagingSenderId: "580198600095"
    };
     
    firebase.initializeApp(config);
}


/////////////
/// SOCIAL LOGIN GOOGLE
/////////////////
function sl_google(){
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.addScope('email');

    var authService = firebase.auth();

    $('body').on("click", "#log_in_google", function() {
      authService.signInWithPopup(provider)
        .then(function(result) {
            // console.log(result.user.displayName);
            // console.log(result.user.email);
            // console.log(result.user.photoURL);
            // console.log(result.user.uid);

            $.ajax({
                url: "?module=login&function=check_user_social",
                type: "POST",
                data: {'user':result.user.displayName, 'avatar':result.user.photoURL, 'iduser':result.user.uid},
                dataType: "JSON"
            })
            .done(function(user){
                if(user==="no"){
                    $.ajax({
                        url: "?module=login&function=insert_user_social",
                        type: "POST",
                        data: {'user':result.user.displayName, 'email':result.user.email, 'avatar':result.user.photoURL, 'iduser':result.user.uid},
                        dataType: "JSON"
                    })
                    .done(function(data){
                        localStorage.setItem('id_token', data);
                        setTimeout('window.location.href = "?module=home&function=list_home", 3000');
                    })
                    .catch(function(error) {
                        toastr["error"]("An error was found while accessing your account", "ERROR");
                    });
                }else{
                    localStorage.setItem('id_token', user.token);
                    setTimeout('window.location.href = "?module=home&function=list_home", 3000');
                }
            })

        });
    });
}




/////////////
/// SOCIAL LOGIN GITHUB
/////////////////
function sl_github(){
      var provider2 = new firebase.auth.GithubAuthProvider();
      var authService = firebase.auth();
    
      $('body').on("click", "#log_in_github", function() {
          authService.signInWithPopup(provider2)
          .then(function(result) {
            //   console.log(result.additionalUserInfo.username);
            //   console.log(result.user.email);
            //   console.log(result.user.photoURL);

            $.ajax({
                url: "?module=login&function=check_user_social",
                type: "POST",
                data: {'user':result.additionalUserInfo.username, 'email':result.user.email, 'avatar':result.user.photoURL, 'iduser':result.additionalUserInfo.username},
                dataType: "JSON"
            })
            .done(function(user){
                if(user==="no"){
                    $.ajax({
                        url: "?module=login&function=insert_user_social",
                        type: "POST",
                        data: {'user':result.additionalUserInfo.username, 'email':result.user.email, 'avatar':result.user.photoURL, 'iduser':result.additionalUserInfo.username},
                        dataType: "JSON"
                    })
                    .done(function(data){
                        localStorage.setItem('id_token', data);
                        setTimeout('window.location.href = "?module=home&function=list_home", 3000');
                    })
                    .catch(function(error) {
                        toastr["error"]("An error was found while accessing your account", "ERROR");
                    });
                }else{
                    localStorage.setItem('id_token', user.token);
                    setTimeout('window.location.href = "?module=home&function=list_home", 3000');
                }
            })
          }).catch(function(error) {
                //   console.log(error);
                toastr["error"]("Couldn't acces your account", "ERROR");
          });
      })
}



$(document).ready(function () {

    socialloginconf();
    sl_google();
    sl_github();

});
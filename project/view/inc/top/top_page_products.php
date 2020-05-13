<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Stanley - Bootstrap Freelancer Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <!-- MAIN JS AMIGABLE -->
    <script src="<?php echo SITE_PATH ?>view/js/main.js"></script>

    <!-- Bootstrap CSS File -->
    <link href="<?php echo SITE_PATH ?>view/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo SITE_PATH ?>view/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php echo SITE_PATH ?>view/assets/css/style.css" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="<?php echo SITE_PATH ?>view/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo SITE_PATH ?>view/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo SITE_PATH ?>view/lib/php-mail-form/validate.js"></script>
    <script src="<?php echo SITE_PATH ?>view/lib/easing/easing.min.js"></script>



    <!-- LLIBRERIES MEUES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- INIT.JS -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>modules/login/view/js/init.js"></script>
    
    <!-- MODAL .DIALOG -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

    <!-- DATEPICKER -->
    <script type="text/javascript">
    $(function() {
        $('#datecaducity').datepicker({
            dateFormat: 'dd/mm/yy', 
            changeMonth: true, 
            changeYear: true, 
            yearRange: '1900:2016',
            onSelect: function(selectedDate) {
            }
        });
    });
    </script>

    <!-- SCRIPTS -->
    <script src="<?php echo SITE_PATH ?>module/product/model/validate_product_create.js"></script>
    <script src="<?php echo SITE_PATH ?>module/product/model/validate_product_update.js"></script>
    <script src="<?php echo SITE_PATH ?>module/product/model/validate_delmult.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH ?>view/lang/translate.js"></script>
    <script src="<?php echo SITE_PATH ?>module/product/model/modal.js"></script>

    <!-- SEARCH -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>view/inc/search/view/search.js"></script>

    <!-- CHECK SESSION -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>view/assets/js/checksession.js"></script>
    
    <!-- LOGIN -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>module/login/model/login.js"></script>

    <!-- ACTIVITY LOGIN -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>module/login/model/activity.js"></script>
        
    <!-- FAVORITES -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>module/favorites/view/fav.js"></script>

    <!-- CART -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>module/cart/view/cart.js"></script>

    <!-- TOASTR -->
    <script type="text/javascript" src="<?php echo SITE_PATH ?>view/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH ?>view/toastr/toastroptions.js"></script>
    <link href="<?php echo SITE_PATH ?>view/toastr/toastr.min.css" rel="stylesheet">

</head>

<body>
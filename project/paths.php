<?php
    define('PROJECT', '/FrameworkPHP_Marc/project/');

    //SITE_ROOT
    define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);
    
    //SITE_PATH
    define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

    //CSS
    // define('CSS_PATH', SITE_PATH . 'view/css/');
    
    //JS
    define('JS_PATH', SITE_PATH . 'view/js/');
    
    //VENDOR
    // define('VENDOR_PATH', SITE_PATH . 'view/vendor/');
    
    //IMG
    define('IMG_PATH', SITE_PATH . 'view/img/');
    
    //PRODUCTION
    define('PRODUCTION', true);
    
    //MODEL
    define('MODEL_PATH', SITE_ROOT . 'model/');
    
    //MODULES
    define('MODULES_PATH', SITE_ROOT . 'modules/');
    
    //VIEW
    define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
    
    //RESOURCES
    define('RESOURCES', SITE_ROOT . 'resources/');
    
    //MEDIA
    define('MEDIA_PATH',SITE_ROOT . '/media/');
    
    //UTILS
    define('UTILS', SITE_ROOT . 'utils/');
    
    //MODEL_HOME
    define('UTILS_HOME', SITE_ROOT . 'modules/home/utils/');
    define('MODEL_PATH_HOME', SITE_ROOT . 'modules/home/model/');
    define('DAO_HOME', SITE_ROOT . 'modules/home/model/DAO/');
    define('BLL_HOME', SITE_ROOT . 'modules/home/model/BLL/');
    define('MODEL_HOME', SITE_ROOT . 'modules/home/model/model/');
    define('JS_VIEW_HOME', SITE_PATH . 'modules/home/view/js/');
    
    // MODEL FAVORITES
    define('UTILS_FAVORITES', SITE_ROOT . 'modules/favorites/utils/');
    define('MODEL_PATH_FAVORITES', SITE_ROOT . 'modules/favorites/model/');
    define('DAO_FAVORITES', SITE_ROOT . 'modules/favorites/model/DAO/');
    define('BLL_FAVORITES', SITE_ROOT . 'modules/favorites/model/BLL/');
    define('MODEL_FAVORITES', SITE_ROOT . 'modules/favorites/model/model/');
    define('JS_VIEW_FAVORITES', SITE_PATH . 'modules/favorites/view/js/');

    // MODEL DETAILS
    define('UTILS_DETAILS', SITE_ROOT . 'modules/details/utils/');
    define('MODEL_PATH_DETAILS', SITE_ROOT . 'modules/details/model/');
    define('DAO_DETAILS', SITE_ROOT . 'modules/details/model/DAO/');
    define('BLL_DETAILS', SITE_ROOT . 'modules/details/model/BLL/');
    define('MODEL_DETAILS', SITE_ROOT . 'modules/details/model/model/');
    define('JS_VIEW_DETAILS', SITE_PATH . 'modules/details/view/js/');

    // MODEL SHOP
    define('UTILS_SHOP', SITE_ROOT . 'modules/shop/utils/');
    define('MODEL_PATH_SHOP', SITE_ROOT . 'modules/shop/model/');
    define('DAO_SHOP', SITE_ROOT . 'modules/shop/model/DAO/');
    define('BLL_SHOP', SITE_ROOT . 'modules/shop/model/BLL/');
    define('MODEL_SHOP', SITE_ROOT . 'modules/shop/model/model/');
    define('JS_VIEW_SHOP', SITE_PATH . 'modules/shop/view/js/');

    // MODEL SEARCH
    define('UTILS_SEARCH', SITE_ROOT . 'modules/search/utils/');
    define('MODEL_PATH_SEARCH', SITE_ROOT . 'modules/search/model/');
    define('DAO_SEARCH', SITE_ROOT . 'modules/search/model/DAO/');
    define('BLL_SEARCH', SITE_ROOT . 'modules/search/model/BLL/');
    define('MODEL_SEARCH', SITE_ROOT . 'modules/search/model/model/');
    define('JS_VIEW_SEARCH', SITE_PATH . 'modules/search/view/js/');
    
    //MODEL_CONTACT
    define('UTILS_CONTACT', SITE_ROOT . 'modules/contact/utils/');
    define('MODEL_PATH_CONTACT', SITE_ROOT . 'modules/contact/model/');
    define('DAO_CONTACT', SITE_ROOT . 'modules/contact/model/DAO/');
    define('BLL_CONTACT', SITE_ROOT . 'modules/contact/model/BLL/');
    define('MODEL_CONTACT', SITE_ROOT . 'modules/contact/model/model/');
    define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');
    
    //MODEL_LOGIN
    define('UTILS_LOGIN', SITE_ROOT . 'modules/login/utils/');
    define('MODEL_PATH_LOGIN', SITE_ROOT . 'modules/login/model/');
    define('DAO_LOGIN', SITE_ROOT . 'modules/login/model/DAO/');
    define('BLL_LOGIN', SITE_ROOT . 'modules/login/model/BLL/');
    define('MODEL_LOGIN', SITE_ROOT . 'modules/login/model/model/');
    define('JS_VIEW_LOGIN', SITE_PATH . 'modules/login/view/js/');
    
    //amigables
    define('URL_AMIGABLES', FALSE);

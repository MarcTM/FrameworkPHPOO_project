<div class="toplogin">
  <div class="options1" style="visibility: hidden;"><a id="login_html" data-tr="LOG IN">LOG IN</a>&nbsp;&nbsp;&nbsp;<a id="register_html" data-tr="REGISTER">REGISTER</a> <br><br><a id="cart" href="<?php amigable('?module=cart&function=list_cart'); ?>">Cart</a></div>
  <div class="language">
    <form>
        <select name="idiom" id="idiom">
            <option value="en" data-tr="English" id="btn-en">English</option>
            <option value="es" data-tr="Spanish" id="btn-es">Spanish</option>
            <option value="va" data-tr="Valencian" id="btn-va">Valencian</option>
        </select>
    </form>
  </div>
  <div class="options2" style="visibility: hidden;">Hola <?php echo $_SESSION['user']?> &nbsp;&nbsp;&nbsp; <img id="imgprofile" src="<?php echo $_SESSION['avatar'] ?>"/> &nbsp;&nbsp;&nbsp; <a id="logout_html" data-tr="LOG OUT">LOG OUT</a> <br><a id="cart" href="?module=cart&function=list_cart">Cart</a></div>
</div>

<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php amigable('?module=home&function=list_home'); ?>" data-tr="HOMEPAGE">HOMEPAGE</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="localdel" href="<?php amigable('?module=shop&function=list_shop'); ?>" data-tr="SHOP">SHOP</a></li>
          <li><a href="<?php amigable('?module=services&function=list_services'); ?>" data-tr="SERVICES">SERVICES</a></li>
		      <li><a href="<?php amigable('?module=aboutus&function=list_aboutus'); ?>" data-tr="MEET US">MEET US</a></li>
          <li><a href="<?php amigable('?module=contact&function=list_contact'); ?>" data-tr="CONTACT">CONTACT US</a></li>
        </ul>
      </div>
</div>

</div>
<div class="navbar navbar-inverse navbar-static-top cosarara">
  <form class="search">


    <div class="grr"> 
      <select id="province">
        <option value="">[Select province]</option>
      </select>


      <select id="shop">
        <option value="">[Select shop]</option>
      </select>
      </div>


    <div class="autocomplete"> 
       <input id="autocom" type="text"/>
       <div id="optionsauto"></div> 
    </div>
	
     
    <div class="elbuscar">
      <a id="searchlist">SEARCH</a>
    </div>   

  </form>
</div>
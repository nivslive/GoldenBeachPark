  <style>
#mobile-demo{
  z-index:9999;
}
  </style>

<header>

      <nav class="white">
        <div class="nav-wrapper container-fluid">
          <a href="" type="button" class="brand-logo"><img class="image-logo-menu" src="public/site/img/logo.png"  alt=""></a>

           <a  href="" type="button" data-activates="mobile-demo" class="button-collapse orange-text prevent_default" >
             <i class="material-icons">menu</i>
          </a>


          <ul id="nav-mobile" class="right hide-on-med-and-down black-text">
                        <?php require __DIR__.DIRECTORY_SEPARATOR.'OptionsMenu.php'  ?>
          </ul>


           <ul class="side-nav" id="mobile-demo">
           <?php require __DIR__.DIRECTORY_SEPARATOR.'OptionsMenu.php'  ?>
          </ul>
        </div>
      </nav>
  </header>

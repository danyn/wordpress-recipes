<header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left"><a href="<? echo site_url()?>"><strong>Fictional</strong> University</a></h1>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
          
          <nav class="main-navigation">
            <?php wp_nav_menu(['theme_location' => 'mainMenu']) ?>
          </nav>

        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
</header>
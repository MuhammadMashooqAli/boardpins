<header id="header" class="header-section white-scroll bg-tra tra-menu navbar-light sticky-header-off">
  <div class="header-wrapper ">
    <div class="wsmobileheader clearfix">
       <a href="{{url('/')}}" class="logo-black">
              <img src="wp-content/themes/martex/assets/images/logo.png" alt="Martex &#8211;  Landing Page" width="163" />      </a>

 <a href="{{url('/')}}" class="logo-white">
              <img src="https://jthemes.net/themes/wp/martex/wp-content/themes/martex/assets/images/logo-white.png" alt="Martex &#8211;  Landing Page" width="163" />      </a>      <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
    </div>

    <div class="wsmainfull menu clearfix ">
      <div class="wsmainwp  clearfix">
        <!-- HEADER BLACK LOGO -->

        <div class="desktoplogo">
           <a href="{{url('/')}}" class="logo-black">
              <img src="https://jthemes.net/themes/wp/martex/wp-content/themes/martex/assets/images/logo.png" alt="Martex &#8211;  Landing Page" width="163" />      </a>

 <a href="{{url('/')}}" class="logo-white">
              <img src="https://jthemes.net/themes/wp/martex/wp-content/themes/martex/assets/images/logo.png" alt="Martex &#8211;  Landing Page" width="163" />      </a>        </div>

        <div class="wsmenu clearfix "><ul id="menu-main-menu" class="wsmenu-list nav-theme"><li id="menu-item-37" class="mg_link column-4 menu-item menu-item-type-post_type menu-item-object-page current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-37"><a href="{{url('/')}}" class="h-link">Home</a>
</li>
<li id="menu-item-41" class="mg_link column-4 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-41"><a href="#" class="h-link">Generate Pins<span class="wsarrow"></span></a>
<ul class="sub-menu martex-menu">
	<li id="menu-item-682" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-682"><a href="{{url('/generate')}}" class="h-link">Generate</a></li>
	<li id="menu-item-677" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-677"><a href="{{url('/scheduling')}}" class="h-link">Schedule</a></li>
	<li id="menu-item-672" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-672"><a href="{{url('/pins-history')}}" class="h-link">Pin History</a></li>
	<li id="menu-item-668" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-668"><a href="{{url('/')}}" class="h-link">Profile</a></li>
</ul>
</li>
<li id="menu-item-5425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5425"><a href="#!" class="h-link">Pricing</a></li>
<li id="menu-item-10551" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10551"><a href="{{url('/contact-us')}}" class="h-link">Contact Us</a></li>
@guest
<li class="nl-simple reg-fst-link mobile-last-link">
    <a class="h-link" href="{{url('/login')}}">SignIn</a>
</li>

<li class="nl-simple">
    <a class="btn r-04 btn--theme hover--theme last-link" href="{{url('/register')}}">SignUp</a>
</li>
@else
<li class="nl-simple reg-fst-link mobile-last-link">
    <a class="h-link" href="{{url('/home')}}">Dashboard</a>
</li>
@endguest

</ul></div>      </div>
    </div>
  </div>
</header>
	<!-- PAGE CONTENT  -->
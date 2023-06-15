<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <!-- Title-->
      @stack('title')
      <!-- Favicon-->
      <link rel="icon" href="{{asset('frontend/image/favicon.jpg')}}" type="image/x-icon">
      <!-- Stylesheets-->
      <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
   </head>
   <body>
      <!-- SECTION 0 NAV -->
      <header class="themelazer_main_header">
         
         <div class="themelazer_middle_header white_bg">
            <div class="container clearfix">
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_promomenu_wrapper">
                        <div class="themelazer_header_social_icons">
                           <a href="{{route('login')}}" target="__blank" class="btn btn-success btn-sm">Login</a>
                        </div>
                        <div class="themelazer_mobile_logo ">
                           <a href="index.html"><img src="{{asset('frontend/image/relovan.png')}}" alt="" title=""></a>
                        </div>
                        <div class="themelazer-nav clearfix">
                           <!-- Main Menu -->
                           <div class="themelazer-navigation">
                              <ul class="menu black_color">
                                 <li class="menu-item">
                                    <a href="{{route('frontend.index')}}">Home</a>
                                 </li>
                                 <li><a href="{{route('frontend.contact')}}">Contact</a></li>
                              </ul>
                           </div>
                           <!-- Main Menu End-->
                        </div>
                        <ul class="header-s-m black_color">
                           <li class="nav-search">
                              <a href="#search_popup" class="toggle-search-box">
                               <i class="ti-search"></i>
                              </a>
                           </li>
                           <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="themelazer_search_wrapper">
   <button type="button" class="close"><i class="ti-close"></i></button>
   <form role="search" class="form-search" method="get" id="s" action="#" >
      <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="Search..." />
   </form>
    <p>Type above and press Enter to search. Press Esc to cancel.</p> 
    <div class="themelazer_category_list"> 
   <div class="category_header_search"><div class="themelazer_post_categories_search_form"><a href="#">beauty( 28 )</a><a href="#">fashion( 5 )</a><a href="#">lifestyle( 4 )</a><a href="#">story( 5 )</a></div></div>   </div>
         </div>
</div>         
         <!--Header Top-->   
         <div id="themelazer_top_bar">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_logo_header2">
                        <a href="{{route('frontend.index')}}"><img src="{{asset('frontend/image/relovan.png')}}" alt="" title=""></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Header Top -->
      </header>
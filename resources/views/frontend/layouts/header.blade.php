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
                           <ul class="themelazer_social_wrapper">
                              <li><a href="#"><i class="ti-facebook"></i></a></li>
                              <li><a href="#"><i class="ti-pinterest-alt"></i></a></li>
                              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                           </ul>
                        </div>
                        <div class="themelazer_mobile_logo ">
                           <a href="index.html"><img src="{{asset('frontend/image/relovan.png')}}" alt="" title=""></a>
                        </div>
                        <div class="themelazer-nav clearfix">
                           <!-- Main Menu -->
                           <div class="themelazer-navigation">
                              <ul class="menu black_color">
                                 <li class="menu-item">
                                    <a href="index.html">Home</a>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="#">Post Feature</a>
                                    <ul>
                                       <li><a href="single-post-standard.html">Post standard</a></li>
                                       <li><a href="single-post-full.html">Post Full width</a></li>
                                       
                                       <li><a href="single-post-left-sidebar.html">Post left sidebar</a></li>
                                       
                                       <li><a href="post-gallery.html">Post Gallery</a></li>
                                       <li><a href="post-audio.html">Post Audio</a></li>
                                       <li><a href="post-video.html">Post Video </a></li>
                                       <li><a href="post-quate.html">Post Quote</a></li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul>
                                       
                                       <li><a href="page-archive.html">archive page</a></li>
                                       <li><a href="page-author.html">author page</a></li>
                                       <li><a href="page-category.html">category page</a></li>
                                       <li><a href="page-search.html">search page</a></li>
                                       <li><a href="page-error.html">error</a></li>
                                    </ul>
                                 </li>
                                
                                 <li><a href="about.html">About Me</a></li>
                                 <li><a href="contact.html">Contact</a></li>
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
                        <a href="index.html"><img src="{{asset('frontend/image/relovan.png')}}" alt="" title=""></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Header Top -->
      </header>
@extends('frontend.layouts.main')
@push('title')
    <title>Search || Blogs</title>
@endpush
@section("main-container")
<div class="themelazer-blog-body">
<div class="container">
    <div class="row">
        <div class="col-md-8 themelazer_content">
            <div class="row">
                <div class="col-md-12">
           <div class="themelazer_title_p themelazer_title_search">
              <h2>Search For: {{ $search_text }}</h2>
            <div class="sidebar">
                <div class="single-sidebar search-widget">
                    <form action="{{route('frontend.search')}}" class="search-form seach-page" method="get">
                        <input type="text" name="search_text" placeholder="Search for...." value="{{ $search_text }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
    </div>
            </div>
            </div>
            </div>
                 @if($posts->count()>0)
                 <div class="row">
                    @foreach($posts as $post)            
                       <div class="col-md-6">
                          <div class=" blog-style-one themelazer_card">
                             <div class="single-blog-style-one">
                                <div class="img-box themelazer_card">
                                      <img src="{{asset('storage/uploads/'.$post->image)}}" alt="Awesome Image">
                                </div>                      
                                <div class="text-box themelazer_card"> 
                                      <div class="themelazer_post_categories">
                                               <a href="{{route('frontend.showPost', ['category'=> $post->category->id])}}">{{$post->category->name}}</a>
                                      </div>                  
                                
                                      <h3>
                                         <a href="{{route('frontend.postDetail',['post'=>$post->id])}}">{{ $post->title }}</a>
                                      </h3>
                                      <div class="meta-info">
                                               <ul>
                                                  <li class="post-author"> <a href="#" tabindex="0">
                                                     <img src="{{asset('frontend/image/blog/author3.jpg')}}" alt="Amelia">Amelia</a>
                                                  </li>
                                                  <li class="post-date">{{ dateFormat($post->published_at) }}</li>
                                                  <li class="post-view">50K Views</li>
                                               </ul>
                                      </div>                       
                                      <p>{{$post->description}}</p> 
                                      <div class="footer-meta-info">                            
                                         <a class="themelazer_more_themelazern" href="#">Read More</a>                            
                                      </div>
                                      
                                </div>
                             </div>
                          </div> 
                       </div>
                    @endforeach
                 </div>     
                 {{$posts->appends(['search'=>$search_text])->links()}}
              @else
                 <h4>No Post Found</h4>   
              @endif

           </div>
           <div class="col-md-4 themelazer_sidebar">
              <div class="sidebar">
                 <!--<div class="themelazer-widget-author">
                    <div class="author-container">
                       <h5 class="themelazer-author-title">About Me</h5>
                       <div class="themelazer-author-avatar">
                          <div class="themlazer-background-author"><img alt="About me" src="{{asset('frontend/image/15.jpg')}}"> 
                          </div>
                          <a href="#" rel="author"><img alt="" src="{{asset('frontend/image/blog/author3.jpg')}}" class="avatar avatar-80 photo"> </a>
                       </div>
                       <h5 class="themelazer-author-title"> <a href="#" rel="author">Jennifer</a></h5>
                       <div class="themelazer-author-data">
                          <div class="author-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do   eiusmod tempor.
                          </div>
                          <div class="themelazer-autograph-about">
                             <img src="{{asset('frontend/image/sign_relovan.png')}}"  alt="">
                          </div>
                          <div class="themelazer-author-social-links">
                             <div class="themelazer-social-links-items">
                                <div class="themelazer-social-links-item">
                                   <a href="#" class="themelazer-social-links-link themelazer-facebook" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                                </div>
                                <div class="themelazer-social-links-item">
                                   <a href="#" class="themelazer-social-links-link  themelazer-twitter" target="_blank"> <i class="fab fa-twitter"></i> </a>
                                </div>
                                <div class="themelazer-social-links-item">
                                   <a href="#" class="themelazer-social-links-link themelazer-youtube" target="_blank"> <i class="fab fa-youtube"></i> </a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>-->
                 <div class="single-sidebar recent-post-widget">
                    <!--<div class="title">
                       <h3>Recent Post</h3>
                    </div>
                    <div class="recent-post-wrapper">
                       <div class="themelazer_article_list">
                          <div class="post-outer">
                             <div class="post-inner">
                                <div class="post-thumbnail sidebar"> <img src="{{asset('frontend/image/small_list93.jpg')}}" alt="image">  
                                   <span class="themelazer_site_count">1</span>
                                   <a href="#"></a>
                                </div>
                             </div>
                             <div class="post-inner">
                                <div class="entry-header">
                                   <div class="themelazer_post_categories">
                                      <a href="#">Travel</a>
                                   </div>
                                   <h2 class="entry-title"> <a href="#">The inspirational Instagram accounts you can check</a></h2>
                                   <div class="meta-info">
                                      <ul>
                                         <li class="post-date">July 09 2020</li>
                                         <li class="post-view">89K Views</li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="themelazer_article_list">
                          <div class="post-outer">
                             <div class="post-inner">
                                <div class="post-thumbnail sidebar"> <img src="{{asset('frontend/image/small_list92.jpg')}}" alt="image">
                                   <span class="themelazer_site_count">2</span>
                                   <a href="#"></a>
                                </div>
                             </div>
                             <div class="post-inner">
                                <div class="entry-header">
                                   <div class="themelazer_post_categories">
                                      <a href="#">Fashion</a>
                                   </div>
                                   <h2 class="entry-title"> <a href="#">The most stylish photo to add to your winter</a></h2>
                                   <div class="meta-info">
                                      <ul>
                                         <li class="post-date">July 09 2020</li>
                                         <li class="post-view">89K Views</li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="themelazer_article_list">
                          <div class="post-outer">
                             <div class="post-inner">
                                <div class="post-thumbnail sidebar"> <img src="{{asset('frontend/image/small_list91.jpg')}}" alt="image">
                                   <span class="themelazer_site_count">3</span>
                                   <a href="#"></a>
                                </div>
                             </div>
                             <div class="post-inner">
                                <div class="entry-header">
                                   <div class="themelazer_post_categories">
                                      <a href="#">Beauty Fashion</a>
                                   </div>
                                   <h2 class="entry-title"> <a href="#">This is what the second largest thing in the world</a></h2>
                                   <div class="meta-info">
                                      <ul>
                                         <li class="post-date">July 09 2020</li>
                                         <li class="post-view">89K Views</li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="themelazer_article_list">
                          <div class="post-outer">
                             <div class="post-inner">
                                <div class="post-thumbnail sidebar"> <img src="{{asset('frontend/image/small_list90.jpg')}}" alt="image">
                                   <span class="themelazer_site_count">4</span>
                                   <a href="#"></a>
                                </div>
                             </div>
                             <div class="post-inner">
                                <div class="entry-header">
                                   <div class="themelazer_post_categories">
                                      <a href="#">Fashion Story</a>
                                   </div>
                                   <h2 class="entry-title"> <a href="#">This is what the second largest thing in the world</a></h2>
                                   <div class="meta-info">
                                      <ul>
                                         <li class="post-date">July 09 2020</li>
                                         <li class="post-view">89K Views</li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>-->
                    <div class="title">
                       <h3>Category</h3>
                    </div>
                    <div class="themelazer_widget_categories">
                       <ul>
                          @foreach($categories as $category)
                             <li><a href="{{ route("frontend.showPost",['category'=>$category->id]) }}">{{$category->name}}<span>{{$category->post()->count()}}</span></a></li>
                          @endforeach
                       </ul>
                    </div>
                    <!--<div class="title">
                       <h3>Advertisement</h3>
                    </div>
                    <div class="themelazer_banner_spot">
                       <div class="themelazer_content_banner">
                          <div class="themelazer_bg_image_banner">
                             <a href=""> <img src="{{asset('frontend/image/blog/ads.jpg')}}" alt=""></a>
                          </div>
                       </div>
                    </div>-->
                    <div class="title">
                       <h3>Tags</h3>
                    </div>
                    <div class="themelazer_widget_content">
                       <div class="themelazer_tagcloud">
                          @foreach($tags as $tag)
                             <a href="#" class="tag-cloud-link">{{$tag->name}}</a>
                          @endforeach
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
@endsection
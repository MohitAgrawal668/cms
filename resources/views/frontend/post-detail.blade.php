    @extends('frontend.layouts.main')
    @push('title')
        <title>{{$post->title}}</title>
    @endpush
    @section("main-container")
      <div class="themelazer-blog-body themelazer-content-area">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="single_header_wrapper">
                     <div class="themelazer_post_categories">
                        <a href="#">{{$post->category->name}}</a>
                     </div>
                     <h1>
                        {{$post->title}}
                     </h1>
                     <div class="meta-info">
                        <ul>
                           <li class="post-author"> <a href="#" tabindex="0">
                              <img src="image/blog/author3.jpg" alt="Amelia">Amelia</a>
                           </li>
                           <li class="post-date">{{dateFormat($post->published_at)}}</li>
                           <li class="post-view">50K Views</li>
                           <li class="post-comment">4 Comments</li>
                        </ul>
                     </div>
                  </div>
                  <div class="themelazer_single_feature">
                     <img src="{{asset('storage/uploads/'.$post->image)}}" alt="image">
                  </div>
                  <div class="themelazer_single_content">
                        {!! $post->content !!}
                    </div>
                  <div class="themelazer_tag_share">
                     <div class="blog-tags">
                        @foreach($post->tags as $tag)
                            <a href="#">{{$tag->name}}</a>
                        @endforeach
                        </div>
                     <div class="blog-social-list  padding-sm-tb-20">
                        <a href="#" class="facebook-bg">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="twitter-bg">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="pinterest-bg">
                        <i class="fab fa-pinterest-p"></i>
                        </a>
                     </div>
                  </div>
                  <div class="postnav_left">
                        <div class="single_post_arrow_content">   
                            <div class="single_thumnail_next_prev">   
                            <div class="post-outer">  
                            <div class="post-inner">  
                                <img src="image/small_list90.jpg" class="attachment-relovan_small_feature size-relovan_small_feature wp-post-image" alt="" loading="lazy" srcset="" sizes="(max-width: 120px) 100vw, 120px"> 
                            </div>
                                                    
                            
                            <div class="post-inner">
                                <div class="entry-header">
                                <span class="lz_post_nav_left">Previous post</span>   
                            <a href="#" id="prepost">
                                
                                It’s Easier To Ask Forgiveness Than It Is To Get Permission                                    </a>
                            </div>
                            </div>  
                        </div>
                            </div>  
                        </div>
                    </div>
                  <div class="postnav_right">
                        <div class="single_post_arrow_content"> 
                            <div class="single_thumnail_next">   
                            <div class="post-outer">  
                            
                            <div class="post-inner">
                                <div class="entry-header">                                
                            <span class="lz_post_nav_right">Next post</span>
                            <a href="#" id="nextpost">
                                
                                Design Is Not A Single Object. Design Is Messy And Complex                                    </a>
                            </div>
                            </div>  
                            <div class="post-inner">     
                                <img src="image/small_list93.jpg" class="attachment-relovan_small_feature size-relovan_small_feature wp-post-image" alt="" loading="lazy" srcset="" sizes="(max-width: 120px) 100vw, 120px"> 
                            </div>
                            </div>  
                            </div>     
                        </div>
                    </div>
                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                        this.page.url = "{{config('app.url').'/postDetail/'.$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://relovan.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>          
                </div>
               
               <div class="col-md-4 themelazer_sidebar">
                  <div class="sidebar">
                     <div class="single-sidebar recent-post-widget">
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


      
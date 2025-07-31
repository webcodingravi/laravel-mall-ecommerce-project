 <aside class="col-lg-3">
     <div class="sidebar">
         <div class="widget widget-search">
             <h3 class="widget-title">Search</h3>

             <form action="{{ route('blog') }}" method="get">
                 <label for="ws" class="sr-only">Search in blog</label>
                 <input type="search" name="search" value="{{ Request::get('search') }}" class="form-control"
                     id="ws" placeholder="Search in blog">
                 <button type="submit" class="btn"><i class="icon-search"></i><span
                         class="sr-only">Search</span></button>

             </form>
         </div>

         <div class="widget widget-cats">
             <h3 class="widget-title">Categories</h3>

             <ul>
                 @foreach ($getBlogCategory as $blogCategory)
                     <li><a
                             href="{{ route('blog_category', $blogCategory->slug) }}">{{ $blogCategory->name }}<span>{{ $blogCategory->getCountBlog() }}</span></a>
                     </li>
                 @endforeach
             </ul>
         </div>

         <div class="widget">
             <h3 class="widget-title">Popular Posts</h3>

             <ul class="posts-list">
                 @foreach ($getPopular as $PopularPost)
                     <li>
                         <figure>
                             <a href="{{ route('blog_detail', $PopularPost->slug) }}">
                                 <img src="{{ asset('uploads/blogs/' . $PopularPost->image) }}" alt="post">
                             </a>
                         </figure>

                         <div>
                             <span>{{ Carbon\Carbon::parse($PopularPost->created_at)->format('d M,Y') }}</span>
                             <h4><a href="{{ route('blog_detail', $PopularPost->slug) }}">{{ $PopularPost->title }}</a>
                             </h4>
                         </div>
                     </li>
                 @endforeach

             </ul>
         </div>

     </div>
 </aside>

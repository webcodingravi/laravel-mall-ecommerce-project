  <div class="entry-container max-col-2" data-layout="fitRows">
      @if ($getBlog->isNotEmpty())
          @foreach ($getBlog as $blog)
              <div class="entry-item col-sm-6">
                  <article class="entry entry-grid">
                      <figure class="entry-media">
                          <a href="{{ route('blog', $blog->slug) }}">
                              <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                  style="height: 300px; width:100%; object-fit:cover;" alt="{{ $blog->title }}">
                          </a>
                      </figure>

                      <div class="entry-body">
                          <div class="entry-meta">
                              <a href="#">{{ Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</a>
                              <span class="meta-separator">|</span>
                              <a href="#">{{ $blog->getCommentCount() }} Comments</a>
                          </div>

                          <h2 class="entry-title">
                              <a href="{{ route('blog_detail', $blog->slug) }}">{{ $blog->title }}.</a>
                          </h2>

                      </div>

                      <div class="entry-content">
                          <p>{{ $blog->short_description }}</p>
                          <a href="{{ route('blog_detail', $blog->slug) }}" class="read-more">Continue Reading</a>
                      </div>
                  </article>
              </div>
          @endforeach
      @else
          <h3>No Record Found
          </h3>
      @endif

  </div>

<aside id="sidebar" class="overflow-auto sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'dashboard' ? 'collapsed' : ''}}" href="{{route('dashboard')}}">
          <i class="bi bi-grid" style="color: #cc9966;"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'admin' ? 'collapsed' : ''}}" href="{{route('admin.list')}}">
          <i class="bi bi-person" style="color: #cc9966;"></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'customer' ? 'collapsed' : ''}}" href="{{route('customer.list')}}">
          <i class="bi bi-person" style="color: #cc9966;"></i>
          <span>Customer</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'category' ? 'collapsed' : ''}}" href="{{route('category.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Category</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'sub-category' ? 'collapsed' : ''}}" href="{{route('sub-category.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Sub Category</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'brand' ? 'collapsed' : ''}}" href="{{route('brand.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Brand</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'color' ? 'collapsed' : ''}}" href="{{route('color.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Color</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'product' ? 'collapsed' : ''}}" href="{{route('product.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Product</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'discount' ? 'collapsed' : ''}}" href="{{route('discount.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Discount Code</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'shipping' ? 'collapsed' : ''}}" href="{{route('shipping.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Shipping Charge</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'orders' ? 'collapsed' : ''}}" href="{{route('orders.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Orders</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'page' ? 'collapsed' : ''}}" href="{{route('page.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Pages</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'slider' ? 'collapsed' : ''}}" href="{{route('slider.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Slider</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'partner' ? 'collapsed' : ''}}" href="{{route('partner.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Partner Logo</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'contact-us' ? 'collapsed' : ''}}" href="{{route('contact.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Contact Us</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'faq' ? 'collapsed' : ''}}" href="{{route('faq.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>FAQ</span>
        </a>
      </li>

        <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'blog-category' ? 'collapsed' : ''}}" href="{{route('BlogCategory.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Blog Categroy</span>
        </a>
      </li>

           <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'blog' ? 'collapsed' : ''}}" href="{{route('blog.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Blog</span>
        </a>
      </li>




      <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(2) != 'setting' ? 'collapsed' : ''}}" href="{{route('SystemSetting')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Setting</span>
        </a>
      </li>

    </ul>

  </aside>

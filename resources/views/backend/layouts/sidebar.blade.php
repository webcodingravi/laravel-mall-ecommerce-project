<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'dashboard' ? 'collapsed' : ''}}" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'admin' ? 'collapsed' : ''}}" href="{{route('admin.list')}}">
          <i class="bi bi-person"></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'category' ? 'collapsed' : ''}}" href="{{route('category.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Category</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'sub-category' ? 'collapsed' : ''}}" href="{{route('sub-category.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Sub Category</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'brand' ? 'collapsed' : ''}}" href="{{route('brand.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Brand</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'color' ? 'collapsed' : ''}}" href="{{route('color.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Color</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'product' ? 'collapsed' : ''}}" href="{{route('product.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Product</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'discount' ? 'collapsed' : ''}}" href="{{route('discount.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Discount Code</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link {{Request::segment(2) != 'shipping' ? 'collapsed' : ''}}" href="{{route('shipping.list')}}">
            <i class="bx bxs-spreadsheet"></i>
          <span>Shipping Charge</span>
        </a>
      </li>

    </ul>

  </aside>

<aside id="sidebar" class="overflow-auto sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'dashboard' ? 'collapsed' : '' }}"
                href="{{ route('dashboard') }}">
                <i class="bi bi-grid" style="color: #cc9966;"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'admin' ? 'collapsed' : '' }}"
                href="{{ route('admin.list') }}">
                <i class="bi bi-person" style="color: #cc9966;"></i>
                <span>Admin</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'customer' ? 'collapsed' : '' }}"
                href="{{ route('customer.list') }}">
                <i class="bi bi-person" style="color: #cc9966;"></i>
                <span>Customer</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i>
                <span>Products</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>


            <ul id="products" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'product' ? '' : 'active' }}"
                        href="{{ route('product.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Product List</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('category.list') }}"
                        class="{{ Request::segment(2) != 'category' ? '' : 'active' }}">
                        <i class="bi bi-circle"></i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'sub-category' ? '' : 'active' }}"
                        href="{{ route('sub-category.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Sub Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'brand' ? '' : 'active' }}" href="{{ route('brand.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Brand</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'color' ? '' : 'active' }}" href="{{ route('color.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Color</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'discount' ? '' : 'active' }}"
                        href="{{ route('discount.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Discount Code</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'shipping' ? '' : 'active' }}"
                        href="{{ route('shipping.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Shipping Charges</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="{{ Request::segment(2) != 'orders' ? '' : 'active' }}"
                        href="{{ route('orders.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Orders</span>
                    </a>
                </li>



            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) != 'blog' ? 'collapsed' : '' }}" data-bs-target="#blogs2"
                data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Articles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blogs2" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ Request::segment(2) != 'blog' ? '' : 'active' }}" href="{{ route('blog.list') }}">
                        <i class="bi bi-circle"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('BlogCategory.list') }}"
                        class="{{ Request::segment(2) != 'blog-category' ? '' : 'active' }}">
                        <i class="bi bi-circle"></i>
                        <span>Blog Category</span>
                    </a>
                </li>

            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'page' ? 'collapsed' : '' }}"
                href="{{ route('page.list') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>Pages</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'slider' ? 'collapsed' : '' }}"
                href="{{ route('slider.list') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>Slider</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'partner' ? 'collapsed' : '' }}"
                href="{{ route('partner.list') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>Partner Logo</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'contact-us' ? 'collapsed' : '' }}"
                href="{{ route('contact.list') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>Contact Us</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'faq' ? 'collapsed' : '' }}"
                href="{{ route('faq.list') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>FAQ</span>
            </a>
        </li>





        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::segment(2) != 'setting' ? 'collapsed' : '' }}"
                href="{{ route('SystemSetting') }}">
                <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
                <span>Setting</span>
            </a>
        </li>

    </ul>

</aside>

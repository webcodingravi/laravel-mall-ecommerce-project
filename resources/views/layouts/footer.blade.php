<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        {{-- <img src="{{asset('assets/images/logo-footer.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25"> --}}
                        <p>{{getSystemSetting()->footer_description}}</p>

                        <div class="social-icons">
                            @if (!empty(getSystemSetting()->facebook_link))
                            <a href="{{getSystemSetting()->facebook_link}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            @endif
                         @if (!empty(getSystemSetting()->twitter_link))
                         <a href="{{getSystemSetting()->twitter_link}}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                         @endif
                         @if (getSystemSetting()->instagram_link)
                         <a href="{{getSystemSetting()->instagram_link}}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                         @endif

                         @if (!empty(getSystemSetting()->youtube_link))
                         <a href="{{getSystemSetting()->youtube_link}}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                         @endif

                         @if (!empty(getSystemSetting()->pinterest_link))
                         <a href="{{getSystemSetting()->pinterest_link}}" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                         @endif

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="widget-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li><a href="{{route('contact')}}">Contact us</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="widget-list">
                            <li><a href="{{route('PaymentMethod')}}">Payment Methods</a></li>
                            <li><a href="{{route('MoneyBack')}}">Money-back guarantee!</a></li>
                            <li><a href="{{route('Returns')}}">Returns</a></li>
                            <li><a href="{{route('Shipping')}}">Shipping</a></li>
                            <li><a href="{{route('TermsConditions')}}">Terms and conditions</a></li>
                            <li><a href="{{route('PrivacyPolicy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-list">
                            <li><a href="{{route('cart')}}">View Cart</a></li>
                            <li><a href="{{route('checkout')}}">Checkout</a></li>
                            <li><a href="#">Track My Order</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © {{date('Y')}} {{getSystemSetting()->website_name}}. All Rights Reserved.</p>
            @if (!empty(getSystemSetting()->payment_icon))
            <figure class="footer-payments">
                <img src="{{asset('uploads/setting/payment-icon/'.getSystemSetting()->payment_icon)}}" alt="Payment methods" width="272" height="20">
            </figure>
            @endif

        </div>
    </div>
</footer>

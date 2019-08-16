{{--<!-- START: header -->--}}
<header role="banner" class="probootstrap-header">
    <div class="full-screen">

        <a href="{{ url('/') }}" class="probootstrap-logo">
            {{--<img src="{{ url('/custom/images/logo-white.png') }}" alt="苏州怡赛德" style="height:40px;margin-top:-4px;">--}}
            <img src="{{ url('templates/themes/metinfo/img/logo_esard.png') }}" alt="苏州怡赛德" style="height:32px;margin-left:4px;margin-top:-4px;">
            <span class="hidden-xs" style="margin-left:12px;">{{ trans('custom.info.short_name1') }}</span>
        </a>

        <a href="javascript:void(0);" rel="nofollow" class="probootstrap-burger-menu visible-xs visible-sm"><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs hidden-sm">
            <ul class="probootstrap-main-nav">
                <li class="{{ $header_home_active or '' }}"><a href="{{ url('/') }}">{{ trans('custom.text.header_home') }}</a></li>
                <li class="{{ $header_about_active or '' }}"><a href="{{ url('/about_us') }}">{{ trans('custom.text.header_about') }}</a></li>
                <li class="{{ $header_service_active or '' }}"><a href="{{ url('/services') }}">{{ trans('custom.text.header_service') }}</a></li>
                <li class="{{ $header_contact_active or '' }}"><a href="{{ url('/contact') }}">{{ trans('custom.text.header_contact') }}</a></li>
                <li class="header-phone">
                    <a href="tel:{{ config('company.info.telephone') }}">
                        <i class="fa fa-mobile-phone"></i>
                        <strong>{{ config('company.info.telephone') }}</strong>
                    </a>
                </li>
                <li class="header-quote _none"><a href="{{ url('/quote') }}" style="color:#fff">{{ trans('custom.text.get_quote') }}</a></li>

                <li class="header-wechat" role="button">
                    <a href="javascript:void(0);" rel="nofollow" style="color:#fff"><i class="fa fa-weixin"></i> <b>{{ trans('custom.text.header_wechat') }}</b></a>
                    <span class="image-box">
{{--                        <img src="{{ url('/custom/images/wechat_online.jpeg') }}" alt="">--}}
                        <img src="{{ url('/custom/images/wechat_qrcode.jpeg') }}" alt="">
                    </span>
                </li>

                <li class="header-quote" style="display:none">
                    @if(App::isLocale('en'))
                        <a href="{{ url('/custom/files/KERON2018_en.pdf') }}" target="_blank" style="color:#fff">PDF</a>
                    @else
                        <a href="{{ url('/custom/files/KERON2018_zh.pdf') }}" target="_blank" style="color:#fff">PDF</a>
                    @endif
                </li>
                <li class="header-language" id="change-language" role="button">
                    @if(App::isLocale('en'))
                        <a href="javascript:void(0);" rel="nofollow" title="切换到中文">
                            <span class="{{ $english_active or '_none' }}"><b>EN</b>/中文</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" rel="nofollow" title="Switch languages to English">
                            <span class="{{ $chinese_active or '_none' }}"><b>中文</b>/EN</span>
                            {{--<span class="{{ $english_active or '_none' }}" title="切换到中文"><b>EN</b>/中文</span>--}}
                        </a>
                    @endif
                </li>
            </ul>
            <div class="extra-text visible-xs visible-sm">
                <a href="javascript:void(0);" rel="nofollow" class="probootstrap-burger-menu"><i>Menu</i></a>
                <h5 class="mb20">{{ trans('custom.text.footer_focus_title') }}</h5>
                <ul class="social-buttons header-social">
                    <li><a target="_blank" href="http://www.wechat.com">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-wechat.png') }}" alt="WeChat Logo">
                    </a></li>
                    <li><a target="_blank" href="http://www.linkedin.com/company/keron-international-relocation-movers/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-linkedin.png') }}" alt="Linkedin Logo">
                    </a></li>
                    <li><a target="_blank" href="https://moveaide.com/movers/keron-international-relocation-shanghai-china-mover-reviews">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-moveaide.png') }}" alt="MoveAide Logo">
                    </a></li>
                    <li><a target="_blank" href="http://www.smartshanghai.com/venue/15561/keron_international_relocation_and_movers_zhongshan_bei_lu">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-smart.png') }}" alt="Instagram Logo">
                    </a></li>
                    <li><a target="_blank" href="http://www.thatsmags.com/shanghai">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-thats.png') }}" alt="Instagram Logo">
                    </a></li>
                    <li><a target="_blank" href="{{ trans('custom.text.video_url') }}">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-youku.png') }}" alt="Instagram Logo">
                    </a></li>
                    <li><a target="_blank" href="https://www.baidu.com/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-baidu.png') }}" alt="Instagram Logo">
                    </a></li>
                    <li><a target="_blank" href="https://plus.google.com/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-google.png') }}" alt="Google Plus Logo">
                    </a></li>
                    <li style="display: none;"><a target="_blank" href="https://www.facebook.com/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-facebook.png') }}" alt="Facebook Logo">
                    </a></li>
                    <li style="display: none;"><a target="_blank" href="https://twitter.com/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-twitter.png') }}" alt="Twitter Logo">
                    </a></li>
                    <li style="display: none;"><a target="_blank" href="https://instagram.com/">
                        <img src="{{ asset('/common/images/logo-icon/icon-logo-instagram.png') }}" alt="Instagram Logo">
                    </a></li>
                </ul>
                <p><small>&copy; Copyright©2018. KERON All Rights Reserved.</small></p>
            </div>
        </nav>

    </div>
</header>
{{--<!-- END: header -->--}}
{{--<!-- START: banner -->--}}
<section class="probootstrap-intro banner-for-root" data-stellar-background-ratio="0.5">
    <div class="block-fill">
        <div class="block-fill">

            <div class="slide-container swiper-container">
                <div class="swiper-wrapper">
                    @if(!empty($info->custom3))
                        @foreach($info->custom3 as $img)
                            <div class="swiper-slide box1"><img src="{{ url(config('common.host.'.env('APP_ENV').'.cdn').'/'.$img->img) }}" alt="湖州怡赛德电梯有限公司 Banner Image {{ $loop->index + 1 }}"></div>
                        @endforeach
                    @endif
                </div>
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination"></div>

                <!-- 如果需要导航按钮 -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            <!-- 如果需要滚动条 -->
                <!--<div class="swiper-scrollbar"></div>-->
            </div>

            <div id="slide-container main-slider _none">

                @if(!empty($info->custom3))
                    @foreach($info->custom3 as $img)
                        <div class="slide"><img src="{{ url(config('common.host.'.env('APP_ENV').'.cdn').'/'.$img->img) }}" alt="Slide"></div>
                    @endforeach
                @endif
                {{--<div class="slide"><img src="{{ url('/common/images/banner01.jpeg') }}" alt="Slide"></div>--}}
                {{--<div class="slide"><img src="{{ url('/common/images/banner02.jpeg') }}" alt="Slide"></div>--}}
                {{--<div class="slide"><img src="{{ url('/common/images/banner03.jpeg') }}" alt="Slide"></div>--}}
            </div>

            <div class="probootstrap-intro-text">
                <div class="banner-title-box">
                    <div class="banner-title-bin">
                        {{--<h1 class="banner-title-row probootstrap-animate">{{ trans('custom.info.name') }}</h1>--}}
                        <h1 class="banner-title-row probootstrap-animate">{{ trans('custom.text.banner_root_title') }}</h1>
                        <div style="display:none;">上海一站式搬家、上海厂房搬迁公司、上海仓储物流公司</div>
                        <div class="banner-title-row probootstrap-subtitle probootstrap-animate">
                            <h2 style="margin-bottom:0;">
                                <a href="javascript:void(0);" rel="nofollow" target="_blank">{{ trans('custom.info.slogan') }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                {{--<p class="watch-intro probootstrap-animate"><a href="" class="popup-vimeo">Watch the video <i class="icon-play2"></i></a></p>--}}
            </div>

        </div>
    </div>
    {{--<a class="probootstrap-scroll-down js-next" href="index.html#next-section">Scroll down <i class="icon-chevron-down"></i></a>--}}
</section>
{{--<!-- END: banner -->--}}
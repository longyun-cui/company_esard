{{--<!-- START: module-advantage -->--}}
<section class="probootstrap-section probootstrap-section-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb40 section-heading probootstrap-animate-">
                <h2 class="module-title">品牌优势</h2>
                {{--                <h2 class="module-title">{{ trans('custom.text.advantage_title') }}</h2>--}}
                <p class="module-subtitle lead"><b>{{ trans('custom.text.advantage_subtitle') }}</b></p>
                <p class="module-subtitle lead"><b>{{ trans('custom.text.advantage_subtitle') }}</b></p>
            </div>
        </div>
        <div class="row mb40">

            @foreach($advantages as $v)
                <a href="{{ url('/advantages/'.$v->id) }}">
                    <div class="col-md-4 col-sm-6 probootstrap-animate-">
                        <div class="probootstrap-box">
                            {{--<div class="icon text-center"><i class="icon-desktop"></i></div>--}}

                            <figure class="image-block mb20">
                                <div class="image-container">
                                    <img src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$v->cover_pic }}" alt="{{ $v->$view_title or '' }}">
                                </div>
                            </figure>

                            <h3 class="text-center"><b>{{ $v->$view_title or '' }}</b></h3>
                            {{--<p>{{ $v->$view_subtitle or '' }}</p>--}}
                            <hr>
                            <div class="clearfix like" style="text-align: center">
                                <a class="" href="{{ url('/advantages/'.$v->id) }}">
                                    <span class="btn service-btn">{{ trans('custom.text.view_more') }}</span>
                                </a>
                            </div>
                            <div class="text-left with-icon colored _none">
                                {{--<li><i class="icon-radio-checked"></i> <span>A small river named Duden</span></li>--}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row _none">
            <div class="col-md-4 col-md-offset-4 probootstrap-animate-">
                <p class="text-center">
                    <a href="javascript:void(0);" rel="nofollow" class="btn btn-primary btn-lg btn-block" role="button">View All Services</a>
                </p>
            </div>
        </div>
    </div>
</section>
{{--<!-- END: module-advantage -->--}}
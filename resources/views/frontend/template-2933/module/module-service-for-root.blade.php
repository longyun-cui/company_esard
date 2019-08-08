{{--<!-- START: module-service -->--}}
<section class="probootstrap-section probootstrap-section-colored" id="service-section">
    <div class="container">
        <div class="row mb40">
            <div class="col-lg-12 col-md-12 section-heading probootstrap-animate">
                <h2 class="module-title title-white">我们的产品</h2>
                <p class="module-subtitle lead"><b></b></p>
            </div>
        </div>
        <div class="row mb40">
            @foreach($services as $v)
                <div class="col-md-3 col-sm-6 probootstrap-animate service-item" style="padding:4px 8px;">
                    <div class="probootstrap-block-image">
                        <figure class="image-block">
                            <a href="{{ url('/services/'.$v->id) }}">
                                <div class="image-container">
                                    <img src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$v->cover_pic }}" alt="{{ $v->custom->cover_pic_alt or '' }}">
                                </div>
                            </a>
                        </figure>
                        <div class="text">
                            <h3 class="mb10 title-row"><a href="{{ url('/services/'.$v->id) }}" style="">{{ $v->$view_title or '' }}</a></h3>
                            <p class="dark">{{ $v->$view_subtitle or '' }}</p>
                            <hr>
                            <div class="clearfix like" style="text-align: center">
                                <a class="" href="{{ url('/services/'.$v->id) }}">
                                    <span class="btn service-btn">{{ trans('custom.text.view_more') }}</span>
                                </a>
                            </div>

                            <p class="clearfix like _none">
                                <span class="secondary-color rate">
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-half"></i>
                                </span>
                                <a class="pull-right" href="javascript:void(0);" rel="nofollow"><i class="icon-thumbs-up"></i> 5,216</a>
                                {{--<a class="pull-right" href="javascript:void(0);" rel="nofollow"><i class="icon-thumbs-down"></i> 32</a>--}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4 probootstrap-animate">
                <p class="text-center">
                    @if($page_type == 'root')
                        <a href="{{ url('/quote') }}" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            {{ trans('custom.text.get_quote') }}
                        </a>
                        {{--<a href="{{ url('/quote') }}" class="btn btn-lg btn-block btn-primary" role="button">资讯报价</a>--}}
                    @elseif($page_type == 'list')
                        {{ $services->links() }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>
{{--<!-- END: module-service -->--}}
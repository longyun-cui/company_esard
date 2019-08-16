{{--<!-- START: module-service -->--}}
<section class="probootstrap-section probootstrap-section-colored-" id="service-section">
    <div class="container full-screen-">
        <div class="row _none">
            <div class="col-lg-12 col-md-12 mb70 section-heading probootstrap-animate-">
                <h2 class="module-title"></h2>
                <p class="module-subtitle lead"></p>
            </div>
        </div>
        @if(isset($items))
        @foreach($items as $item)
        <div class="row- mb70">
            <div class="row- mb80">

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb30 section-heading probootstrap-animate-">
                        <h2 class="module-title">{{ $item->$view_title or '' }}</h2>
                        <p class="lead">{{ $item->$view_subtitle or '' }}</p>
                    </div>
                </div>

                @if(isset($item->children))
                @foreach($item->children as $i)
                    <div class="row item-left-right-style">
                        <div class="col-md-6 col-sm-6 image-container">
                            <div class="image-box">
                                <img src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$i->cover_pic }}" alt="Images">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 text-container">
                            <div class="text-box">
                                <h1 class=" color-blue"><b>{{ $i->$view_title or '' }}</b></h1>

                                <div class="withArrow mb20">
                                    {{ $i->$view_subtitle or '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif

            </div>

        </div>
        @endforeach
        @endif
        <div class="row _none">
            <div class="col-md-4 col-md-offset-4 probootstrap-animate">
                <p class="text-center">
                    {{--@if($page_type == 'root')--}}
                        {{--<a href="{{ url('/services') }}" class="btn btn-lg btn-block btn-primary" role="button">更多服务</a>--}}
                    {{--@elseif($page_type == 'list')--}}
                        {{--{{ $services->links() }}--}}
                    {{--@endif--}}
                </p>
            </div>
        </div>
    </div>
</section>
{{--<!-- END: module-service -->--}}
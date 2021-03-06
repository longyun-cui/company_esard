@extends('frontend.template-2933.layout.layout')


{{--html.head--}}
@section('head_title'){{ $activity->$view_title or '' }} | {{ trans('custom.info.short_name') }}@endsection
@section('meta_author')@endsection
@section('meta_title'){{ $activity->$view_title or '' }} | {{ trans('custom.info.short_name') }}@endsection
@section('meta_description'){{ config('common.meta_description') }}@endsection
@section('meta_keywords'){{ config('common.meta_keywords') }}@endsection




{{--header--}}
@section('component-header')
    @include('frontend.template-2933.component.header')
@endsection


{{--footer--}}
@section('component-footer')
    @include('frontend.template-2933.component.footer')
@endsection




{{--banner-image--}}
@section('banner-image')
    @if(!empty($info->custom2->activity_banner)) {{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$info->custom2->activity_banner }}
    @else {{ '/custom/images/banner-activity.jpg' }}
    @endif
@endsection

{{--custom-content--}}
@section('custom-content')

    @include('frontend.template-2933.component.banner-for-page',[
        'banner_page_title'=>trans('custom.text.activity_page_title'),
        'banner_page_background'=>'/custom/images/banner-activity.jpg'
    ])

    @include('frontend.template-2933.module.module-item', ['item'=>$activity])

@endsection

@extends('templates.layouts.index')

@section( 'title', $site_settings->site_name . ' | ' . $info_page->title )

@section('content')

@if($info_page->description != null)
<div class="container-fluid introWrap py-lg-2">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 mx-auto sectionTitle py-lg-0 py-3">
                  @isset( $info_page->title )
                    <h2 class="text-left mb-0">{{ $info_page->title }}</h2>
                  @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid articles">
    <div class="row">
        <div class="container">
            <div class="row article">
                <div class="col-12 col-md-10 mx-auto">
                  @isset( $info_page->description )
                    {!! $info_page->description !!}
                  @endisset
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="container-fluid pageHeader">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col breadCrumb">
              @isset( $info_page->title )
                <h1>{{ $info_page->title }}</h1>
              @endisset
            </div>
        </div>
    </div>
</div>
@endif

<div class="container articleWrap">

  @if ( NULL != $info_page->displayArticles && count( $info_page->displayArticles ) > 0 )
    @each( 'templates.information_pages.article.index', $info_page->displayArticles, 'article' )
  @endif

</div>

@endsection

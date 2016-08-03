@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('navs.faq') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="about-us">
        <div class="container">

            <div class="row">
                <div class="faq col-md-10 col-md-offset-1">
                    <div>
                        <div class="accordion" id="accordion2">
                            @foreach($faqs as $key => $faq)
                                @if($faq->{'content_' . App::getLocale()})
                                @include('partials.faqordion',[
                                'count' => $key,
                                'head' => $faq->{'title_'.App::getLocale()},
                                'content' => $faq->{'content_'.App::getLocale()}
                                ])
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
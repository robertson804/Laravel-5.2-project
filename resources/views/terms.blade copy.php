@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('toc.header') }}</h2>

                </div>
            </div>
        </div>

    </section>
    <div class="about-us">
        <div class="container">

            <div class="row">

                <article class="terms col-md-12">

                    <h2>{{ trans('toc.welcome') }}</h2>

                    <section>

                        <p>{{ trans('toc.body.0') }}</p>
                    </section>

                    <section>

                        <p>{{ trans('toc.body.1') }}</p>
                        <p>{{ trans('toc.body.2') }}</p>
                        <p><b>{{ trans('toc.bold.0') }}</b> {{ trans('toc.body.3') }}</p>
                        <p><b>{{ trans('toc.bold.1') }}</b> {{ trans('toc.body.4') }}</p>
                        <p><b>{{ trans('toc.bold.2') }}</b> {{ trans('toc.body.5') }}</p>
                    </section>

                    <section>
                        <p>{{ trans('toc.body.6') }}</p>
                        <p><b>{{ trans('toc.bold.3') }}</b> {{ trans('toc.body.7') }}</p>
                    </section>

                    <section>
                        <p><b>{{ trans('toc.bold.4') }}</b> {{ trans('toc.body.8') }}</p>
                    </section>

                    <section>
                        <p><b>{{ trans('toc.bold.5') }}</b> {{ trans('toc.body.9') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.6') }}</b> {{ trans('toc.body.10') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.7') }}</b> {{ trans('toc.body.11') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.8') }}</b> {{ trans('toc.body.12') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.9') }}</b> {{ trans('toc.body.13') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.10') }}</b> {{ trans('toc.body.14') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.11') }}</b> {{ trans('toc.body.15') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.12') }}</b> {{ trans('toc.body.16') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.13') }}</b> {{ trans('toc.body.17') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.14') }}</b> {{ trans('toc.body.18') }}</p>
                    </section>
                    <section>
                        <p><b>{{ trans('toc.bold.15') }}</b> {{ trans('toc.body.19') }}</p>
                    </section>
                </article>
            </div>

        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <header>
        <!-- Intro settings -->
        <style>
            /* Default height for small devices */
            #intro-example {
                height: 400px;
            }

            /* Height for devices larger than 992px */
            @media (min-width: 992px) {
                #intro-example {
                    height: 600px;
                }
            }
        </style>


        <!-- Background image -->
        <div
            id="intro-example"
            class="p-5 text-center bg-image"
            style="background-image: url('{{ asset('images/head.jpg') }}');background-repeat: no-repeat;background-size: cover; margin-top: -1.5rem!important;"
        >
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.7); margin-top: 10%">
                <div class="d-flex justify-content-center py-5 align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Movie Channel</h1>
                        <h5 class="mb-4">Best & free guide of Movies</h5>
                        <a
                            class="btn btn-outline-light btn-lg m-2"
                            href="https://www.youtube.com/watch?v=c9B4TPnak1A"
                            role="button"
                            rel="nofollow"
                            target="_blank"
                        >Start tutorial</a
                        >
                        <a
                            class="btn btn-outline-light btn-lg m-2"
                            href="https://mdbootstrap.com/docs/standard/"
                            target="_blank"
                            role="button"
                        >Download MDB UI KIT</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <div class="container " style="margin-top: 50px">
        <div class="row">
            @forelse($response as $resp)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src="{{'https://image.tmdb.org/t/p/w300'.$resp->poster_path}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $resp->original_title }}</h5>
                            <p class="card-text">{{$resp->overview}}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
{{--                {{$resp->links()}}--}}
            @empty
            @endforelse
        </div>

    </div>
@endsection
@push('scripts')

@endpush

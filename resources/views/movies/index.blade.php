@extends('layouts.app')

@section('content')
    <div class="container"
        x-data="{
            search: '',
            page: 1,
            type: 'Popular movies...',
            url: 'https://api.themoviedb.org/3/movie/popular?language=en-US',
            response: {
                results: []
            },
            loading: true,
            movie: {},
            fetchMovies: function() {
                cur = this;
                fetch(this.url, requestOptions)
                .then(response => response.json())
                .then(result => {
                    this.response = result;
                    setTimeout(function(){ cur.loading = false; }, 1000);
                })
                .catch(error => console.log('error', error));
            }
        }"
        x-init="
            fetchMovies();
        ">
        <div class="card">
            <div class="card-header">
                <input type="search" class="form-control" placeholder="Search movie..." x-model="search" x-on:input="
                    loading = true;
                    if(search) {
                        url = `https://api.themoviedb.org/3/search/movie?language=en-US&include_adult=false&query=${search}`;
                        type = 'Search results...';
                    } else {
                        url = 'https://api.themoviedb.org/3/movie/popular?language=en-US'
                        type = 'Popular movies...';
                    }
                    page = 1;
                    fetchMovies();
                ">
            </div>
            <div class="" x-show="loading">
                <div class="d-flex justify-content-center my-5">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card-body" x-show="!loading">
                <h3 x-text="type" class="mb-3"></h3>
                <template x-if="response.results">
                    <div>
                        <div class="row">
                            <template x-for="result of response.results">
                                <div class="col-3 d-flex justify-content-center">
                                    <div class="card mb-3" style="width: 18rem;">
                                        <img :src="result.poster_path ?
                                            `https://image.tmdb.org/t/p/w300${result.poster_path}` :
                                            'https://lh3.googleusercontent.com/proxy/z0iwWermINc-y8FVouoirWya_PjI5fhq5LvEjmCuSHX2KRKtywvSi9M__ilwK93c4xDlhXtTEOSaVG7k5XrMajgNkKeDAMwM05pQnK2In20E5eFviasVfHugDxGVXDeUVABey244Foir8Q'" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" x-text="result.title"></h5>
                                            <p class="">Release Date: <b x-text="result.release_date"></b></p>
                                            <p class="">Popularity: <b x-text="result.popularity"></b></p>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" x-on:click="movie = result">View details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item">
                                        <button class="page-link"
                                            :disabled="page == 1"
                                            x-on:click="
                                                loading = true;
                                                page--;
                                                url += `&page=${page}`;
                                                fetchMovies();
                                        ">
                                            Previous
                                        </button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link"
                                            :disabled="page == response.total_pages"
                                            x-on:click="
                                                loading = true;
                                                page++;
                                                url += `&page=${page}`;
                                                fetchMovies();
                                        ">
                                            Next
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <template x-if="movie">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" x-ref="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" x-text="movie.title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.8/uuid.min.js"
        integrity="sha512-rV0Q1QWodkoLjts/qP2XHtjvUPTmN46k4eH0lzOR3mDui8a0YnL/uqydipXA9mQ2wG6J4imL0BO6/26rcFho7Q=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        var myHeaders = new Headers();
        myHeaders.append("Authorization", "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmNWEyY2Q4NmQ4MzU2NDBkY2Q1ZWVmMDAxOTI2OTdiMyIsInN1YiI6IjYwODNhYmFjOWU0NTg2MDA0MGMyOWE0OCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.YAFzCrOi8BkKFP7vkkA1-CTUxTfSnO57HuQ8b7A7wqo");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container"
        x-data="{
            marla: '',
            kanal: '',
            squareFoot: '',
            squareYard: '',
            squareMeter: ''
        }">
        <div class="card">
            <div class="card-head bg-success text-white text-center text-md-left p-4 mb-2">
                <h1 class="m-0">
                    Area Unit Converter
                </h1>
                <div class="lead">
                    Type a value in any of the fields to convert between Length measurements:
                </div>
            </div>
            <div class="card-body">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marla">Marla</label>
                                <input class="form-control" type="number" x-model="marla"
                                    x-on:keyup="
                                        kanal = marla / 20;
                                        squareFoot = marla * 272;
                                        squareMeter = marla * 25.293;
                                        squareYard = marla * 30.25;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kanal">Kanal</label>
                                <input class="form-control" type="number" x-model="kanal"
                                    x-on:keyup="
                                        marla = kanal * 20;
                                        squareFoot = kanal * 5445;
                                        squareMeter = kanal * 506;
                                        squareYard = kanal * 605;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="square-foot">Square Foot</label>
                                <input class="form-control" type="number" x-model="squareFoot"
                                    x-on:keyup="
                                        marla = squareFoot / 272;
                                        kanal = squareFoot / 5445;
                                        squareMeter = squareFoot / 10.764;
                                        squareYard = squareFoot / 9;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="square-yard">Square Yard</label>
                                <input class="form-control" type="number" x-model="squareYard"
                                    x-on:keyup="
                                        marla = squareYard / 30.25;
                                        kanal = squareYard / 605;
                                        squareFoot = squareYard * 9;
                                        squareMeter = squareYard / 1.196;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="square-meter">Square Meters</label>
                                <input class="form-control" type="number" x-model="squareMeter"
                                    x-on:keyup="
                                        marla = squareMeter / 25.293;
                                        kanal = squareMeter / 506;
                                        squareFoot = squareMeter * 10.764;
                                        squareYard = squareMeter * 1.196;
                                    ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.8/uuid.min.js"
        integrity="sha512-rV0Q1QWodkoLjts/qP2XHtjvUPTmN46k4eH0lzOR3mDui8a0YnL/uqydipXA9mQ2wG6J4imL0BO6/26rcFho7Q=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

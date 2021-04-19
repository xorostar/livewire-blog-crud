@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @livewire('counter') --}}
        {{-- @livewire('posts') --}}
        {{-- @livewire('datatable') --}}
        <div class="card">
            <div class="card-header">
                Area Converter with Alpine js
            </div>
            <div class="card-body">
                <div x-data = '{converter:{marla:0 , kanal:0 , squareFoot:0, squareYard:0,squareMeters:0}}'>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marla">Marla</label>
                                <input type="number" x-model="converter.marla" class="form-control" name="" id="marla" class="form-control" @keyup="
                                converter.kanal = converter.marla / 20;
                                converter.squareFoot = converter.marla * 273;
                                converter.squareYard = converter.marla * 25.293;
                                converter.squareMeters = converter.marla * 30.25" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kanal">Kanal</label>
                                <input type="number" x-model="converter.kanal" class="form-control" name="" id="kanal" class="form-control" placeholder="" @keyup="
                                converter.marla = converter.kanal * 20;
                                converter.squareFoot = converter.kanal * 5445;
                                converter.squareYard = converter.kanal * 506;
                                converter.squareMeters = converter.kanal * 605"
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="square-foot">Square Foot</label>
                                <input type="number" x-model = "converter.squareFoot" class="form-control" name="" id="square-foot" class="form-control" placeholder="" @keyup="
                                converter.marla = converter.squareFoot / 272;
                                converter.kanal = converter.squareFoot / 5445;
                                converter.squareMeters = converter.squareFoot * 10.764;
                                converter.squareYard = converter.squareFoot * 1.196">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="square-yard">Square Yard</label>
                                <input type="number" x-model="converter.squareYard" id="square-yard" class="form-control" name=""class="form-control" placeholder="" @keyup="
                                converter.marla = converter.squareYard / 30.32;
                                converter.kanal = converter.squareYard / 605;
                                converter.squareFoot = converter.squareYard * 9;
                                converter.squareMeters = converter.squareYard * 1.196;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="square-meters">Square Meters</label>
                                <input type="number" x-model="converter.squareMeters" class="form-control" name="" id="square-meters" class="form-control" placeholder="" @keyup="
                                converter.marla = converter.squareMeters / 25.293;
                                converter.kanal = converter.squareMeters / 506;
                                converter.squareFoot = converter.squareMeters * 10.764;
                                converter.squareYard = converter.squareMeters * 1.196;">
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

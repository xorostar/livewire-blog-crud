@extends('layouts.app')

@section('content')
    <div class="container"
        x-data="{
            marla: '',
            kanal: '',
            squareFoot: '',
            squareYard: '',
            squareMeter: '',
            acre: '',
            hectare: '',
            country: 'Pakistan',
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
                        <div class="col-md-12">
                            <select class="form-control mb-3" x-model="country">
                                <option>Pakistan</option>
                                <option>England</option>
                            </select>
                        </div>
                        <div class="col-md-6" x-show="country == 'Pakistan'">
                            <div class="form-group">
                                <label for="marla">Marla</label>
                                <input class="form-control" type="number" x-model="marla"
                                    x-on:keyup="
                                        kanal = marla / 20;
                                        squareFoot = marla * 272;
                                        squareMeter = marla * 25.293;
                                        squareYard = marla * 30.25;
                                        acre = marla / 160;
                                        hectare = marla / 395;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6" x-show="country == 'Pakistan'">
                            <div class="form-group">
                                <label for="kanal">Kanal</label>
                                <input class="form-control" type="number" x-model="kanal"
                                    x-on:keyup="
                                        marla = kanal * 20;
                                        squareFoot = kanal * 5445;
                                        squareMeter = kanal * 506;
                                        squareYard = kanal * 605;
                                        acre = kanal / 8;
                                        hectare = kanal / 19.768;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="square-foot">Square Foot</label>
                                <input class="form-control" type="number" x-model="squareFoot"
                                    x-on:keyup="
                                        marla = squareFoot / 272;
                                        kanal = squareFoot / 5445;
                                        squareMeter = squareFoot / 10.764;
                                        squareYard = squareFoot / 9;
                                        acre = squareFoot / 43560;
                                        hectare = squareFoot / 107639;
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
                                        acre = squareYard / 4840;
                                        hectare = squareYard / 11960;
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
                                        acre = squareMeter / 4046.86;
                                        hectare = squareMeter / 10000;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acres">Acres</label>
                                <input class="form-control" type="number" x-model="acre"
                                    x-on:keyup="
                                        marla = acre * 160;
                                        kanal = acre * 8;
                                        squareMeter = acre * 4046.86;
                                        squareFoot = acre * 43560;
                                        squareYard = acre * 4840;
                                        hectare = acre / 2.471;
                                    ">
                            </div>
                        </div>
                        <div class="col-md-6" x-show="country == 'England'">
                            <div class="form-group">
                                <label for="hectare">Hectare</label>
                                <input class="form-control" type="number" x-model="hectare"
                                    x-on:keyup="
                                        marla = hectare * 395;
                                        kanal = hectare * 19.768;
                                        squareMeter = hectare * 10000;
                                        squareFoot = hectare * 107639;
                                        squareYard = hectare * 11960;
                                        acre = hectare * 2.471;
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

    <script>
        function unitConverter(unit, value){
            switch(unit){
                case 'marla':
                    kanal = marla / 20;
                    squareFoot = marla * 272;
                    squareMeter = marla * 25.293;
                    squareYard = marla * 30.25;
                    break;
                case 'kanal':
                    marlaInput.value = value * 20;
                    squareFootInput.value = value * 5445;
                    squareMeterInput.value = value * 506;
                    squareYardInput.value = value * 605;
                    break;
                case 'square-foot':
                    marlaInput.value = value / 272;
                    kanalInput.value = value / 5445;
                    squareMeterInput.value = value / 10.764;
                    squareYardInput.value = value / 9;
                    break;
                case 'square-meter':
                    marlaInput.value = value / 25.293;
                    kanalInput.value = value / 506;
                    squareFootInput.value = value * 10.764;
                    squareYardInput.value = value * 1.196;
                    break;
                case 'square-yard':
                    marlaInput.value = value / 30.25;
                    kanalInput.value = value / 605;
                    squareFootInput.value = value * 9;
                    squareMeterInput.value = value / 1.196;
                    break;
            }
            }
    </script>
@endpush

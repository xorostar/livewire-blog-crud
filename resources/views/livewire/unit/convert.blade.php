@extends('layouts.app')

@section('content')
    <div class="container"
         x-data="{
            units: {
                marla: {
                    quantity: null,
                    country: ['Pakistan'],
                    equivalent: {
                        kanal: 0.05,
                        squareFoot: 272,
                        squareYard: 30.25,
                        squareMeter: 25.293,
             }
         },
         kanal: {
             quantity: null,
             country: ['Pakistan'],
             equivalent: {
                 marla: 20,
                 squareFoot: 5445,
                 squareYard: 605,
                 squareMeter: 506,
             }
         },
         squareFoot: {
             quantity: null,
             country: ['Pakistan', 'England'],
             equivalent: {
                 marla: 0.0036764705882353,
                 kanal: 0.000183655,
                 squareYard: 0.111111,
                 squareMeter: 0.092903,
                 acre: 2.2957e-5,
                 hectare: 9.2903e-6
             }
         },
         squareYard: {
             quantity: null,
             country: ['Pakistan', 'England'],
             equivalent: {
                 marla: 0.0330578,
                 kanal: 0.00165289,
                 squareFoot: 9,
                 squareMeter: 0.836127,
                 acre: 0.000206612,
                 hectare: 8.3613e-5
             }
         },
         squareMeter: {
             quantity: null,
             country: ['Pakistan', 'England'],
             equivalent: {
                 marla: 0.0395368,
                 kanal: 0.00197684,
                 squareFoot: 10.7639,
                 squareYard: 1.19599,
                 acre: 0.000247105,
                 hectare: 1e-4
             }
         },
         acre: {
             quantity: null,
             country: ['England'],
             equivalent: {
             squareFoot: 43560,
             squareYard: 4840,
             squareMeter: 4046.86,
             hectare: 0.404686
         }
     },
     hectare: {
         quantity: null,
         country: ['England'],
         equivalent: {
             squareFoot: 107639,
             squareYard: 11959.9,
             squareMeter: 10000,
             acre: 2.47105
         }
     }
 },
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
                            <select class="form-control mb-3"
                                    x-model="country"
                                    x-on:change="
                                    for([key, value] of Object.entries(units)) {
                                        value.quantity = '';
                                    }
                                ">
                                <option>Pakistan</option>
                                <option>England</option>
                            </select>
                        </div>
                        <template x-for="[index, item] in Object.entries(units)">
                            <div class="col-md-6" x-show="item.country.includes(country)">
                                <div class="form-group">
                                    <label for="marla" x-text="index.toUpperCase()"></label>
                                    <input class="form-control" type="number" step="0.01" x-model="item.quantity"
                                           x-on:input="
                                            for([key, value] of Object.entries(item.equivalent)) {
                                                units[key].quantity = item.quantity * value;
                                            }
                                        ">
                                </div>
                            </div>
                        </template>
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

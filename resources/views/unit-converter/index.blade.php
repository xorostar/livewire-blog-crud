@extends('layouts.app')

@section('content')
<style>
  footer>a {
    text-decoration: none;
    font-size: 20px;
    line-height: 40px;
    transition: all 0.2s;
  }

  footer>a:hover {
    font-size: 30px;
  }

  .bg-image {
    background-image: url('https://godamwale.com/assets/images/land/banner-1.jpg');
    background-color: rgba(0, 0, 0, 0.7);
    background-size: cover;
    background-blend-mode: multiply;
    background-position: center center;
    height: 50vh;
  }

  .m-20-vh {
    margin-top: 15vh;
  }

</style>
<div class="text-white text-center text-md-center p-4 mb-2 bg-image">
  <h1 class="m-20-vh">
    Pakistan Area Unit Converter
  </h1>
  <div class="lead">
    Type a value in any of the fields to convert between Length measurements:
  </div>
</div>
<div class="p-4" x-data="{ marla:'', kanal:'', squareFoot:'', squareYard:'', squareMeter:'' }">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="marla">Marla</label>
        <input class="form-control" id="marla" type="number" x-model="marla" x-on:keyup=" kanal = marla / 20; squareFoot = marla * 272; squareMeter = marla * 25.293; squareYard = marla * 30.25; ">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="kanal">Kanal</label>
        <input class="form-control" id="kanal" type="number" x-model="kanal" x-on:keyup="  marla = kanal * 20; squareFoot = kanal * 5445; squareMeter = kanal * 506; squareYard = kanal * 605;  ">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="square-foot">Square Foot</label>
        <input class="form-control" id="square-foot" type="number" x-model="squareFoot" x-on:keyup=" marla = squareFoot / 272; kanal = squareFoot / 5445; squareMeter = squareFoot / 10.764; squareYard = squareFoot / 9; ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="square-yard">Square Yard</label>
        <input class="form-control" id="square-yard" type="number" x-model="squareYard" x-on:keyup=" marla = squareYard / 30.25; kanal = squareYard / 605; squareFoot = squareYard * 9; squareMeter = squareYard / 1.196; ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="square-meter">Square Meters</label>
        <input class="form-control" id="square-meter" type="number" x-model="squareMeter" x-on:keyup=" marla = squareMeter / 25.293; kanal = squareMeter / 506;  squareFoot = squareMeter * 10.764; squareYard = squareMeter * 1.196;
                                    ">
      </div>
    </div>
  </div>
</div>

</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

@endsection

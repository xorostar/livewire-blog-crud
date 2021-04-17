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
<div class="p-4" x-data='[ marla:""
                        , kanal:""
                        ,squareFoot:"" ]'>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="marla">Marla</label>
        <input class="form-control" id="marla" type="number" x-model="area" x-on:keydown.enter="">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="kanal">Kanal</label>
        <input class="form-control" id="kanal" type="number" oninput="unitConverter(this.id, this.value)" onchange="unitConverter(this.id, this.value)">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="square-foot">Square Foot</label>
        <input class="form-control" id="square-foot" type="number" oninput="unitConverter(this.id, this.value)" onchange="unitConverter(this.id, this.value)">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="square-yard">Square Yard</label>
        <input class="form-control" id="square-yard" type="number" oninput="unitConverter(this.id, this.value)" onchange="unitConverter(this.id, this.value)">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="square-meter">Square Meters</label>
        <input class="form-control" id="square-meter" type="number" oninput="unitConverter(this.id, this.value)" onchange="unitConverter(this.id, this.value)">
      </div>
    </div>
  </div>
</div>

<footer class="p-4">
  <a class="text-success" href="https://www.aswadali.me" target="_blank">
    <i class="fas fa-globe"></i>
  </a>
  <br>
  <a class="text-success" href="https://www.linkedin.com/in/aswadali/" target="_blank">
    <i class="fab fa-linkedin"></i>
  </a>
  <br>
  <a class="text-success" href="https://codepen.io/AswadAli/" target="_blank">
    <i class="fab fa-codepen"></i>
  </a>
  <br>
</footer>
</div>


@push('scripts')
<script>
  function converter(area) {
    console.log(area);
  }


  var marlaInput = document.getElementById("marla");
  var kanalInput = document.getElementById("kanal");
  var squareFootInput = document.getElementById("square-foot");
  var squareYardInput = document.getElementById("square-yard");
  var squareMeterInput = document.getElementById("square-meter");

  function unitConverter(unit, value) {
    switch (unit) {
      case 'marla':
        kanalInput.value = value / 20;
        squareFootInput.value = value * 272;
        squareMeterInput.value = value * 25.293;
        squareYardInput.value = value * 30.25;
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

@endsection

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
<div class="p-4" x-data="[ marla:'', kanal:'', squareFoot:'', squareYard:'', squareMeter:'' ]">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="marla">Marla</label>
        <input class="form-control" id="marla" type="number" x-model="marla" x-on:keydown="unitConverter(marla)">
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
  function unitConverter(unit) {
    switch (unit) {
      case 'marla':
        kanal = unit / 20;
        squareFoot = unit * 272;
        squareMeter = unit * 25.293;
        squareYard = unit * 30.25;
        break;
      case 'kanal':
        marla = unit * 20;
        squareFoot = unit * 5445;
        squareMeter = unit * 506;
        squareYard = unit * 605;
        break;
      case 'squareFoot':
        marla = unit / 272;
        kanal = unit / 5445;
        squareMeter = unit / 10.764;
        squareYard = unit / 9;
        break;
      case 'squareMeter':
        marla = unit / 25.293;
        kanal = unit / 506;
        squareFoot = unit * 10.764;
        squareYard = unit * 1.196;
        break;
      case 'squareYard':
        marla = unit / 30.25;
        kanal = unit / 605;
        squareFoot = unit * 9;
        squareMeter = unit / 1.196;
        break;
    }
  }

</script>
@endpush

@endsection

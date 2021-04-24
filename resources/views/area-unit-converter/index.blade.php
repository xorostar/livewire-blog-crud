@extends('layouts.app')

@push('styles')
<style>
    footer > a{
        text-decoration:none;
        font-size:20px;
        line-height:40px;
        transition:all 0.2s;
    }

    footer > a:hover{
        font-size:30px;
    }
</style>
@endpush

@section('content')

<div x-data='{
    country: "UK",
    units:{
        marlaInput: 0,
        kanalInput: 0,
        squareFootInput: 0,
        squareYardInput: 0,
        squareMeterInput: 0
    }
}'>

    <div class="bg-success text-white text-center text-md-left p-4 mb-2">
        <h1 class="m-0">
        Pakistan Area Unit Converter
        </h1>
        <div class="lead">
        Type a value in any of the fields to convert between Length measurements:
        </div>
    </div>
    <div class="flex">
        <select class="form-select w-25 ml-4" x-model="country">
            <option>Pakistan</option>
            <option>UK</option>
        </select>
    </div>

    <div class="p-4">
    <div class="row">
       <div class="col-md-4">
          <div class="form-group">
             <label x-show="country === 'UK'">Marla</label>
             <input x-show="country === 'UK'" class="form-control" x-model="units.marlaInput" :id="units.marlaInput" type="number" @input="
                units.kanalInput = units.marlaInput / 20;
                units.squareFootInput = units.marlaInput * 273;
                units.squareYardInput = units.marlaInput * 25.293;
                units.squareMeterInput = units.marlaInput * 30.25
             ">
          </div>
       </div>
       <div class="col-md-4">
          <div class="form-group">
             <label>Kanal</label>
             <input class="form-control" x-model="units.kanalInput" :id="units.kanalInput" type="number" @input="
                units.marlaInput = units.kanalInput * 20;
                units.squareFootInput = units.kanalInput * 5445;
                units.squareMeterInput = units.kanalInput * 506;
                units.squareYardInput = units.kanalInput * 605
             ">
          </div>
       </div>
       <div class="col-md-4">
          <div class="form-group">
             <label>Square Foot</label>
             <input class="form-control" x-model="units.squareFootInput" :id="units.squareFootInput" type="number" @input="
                units.marlaInput = units.squareFootInput / 272;
                units.kanalInput = units.squareFootInput / 5445;
                units.squareMeterInput = units.squareFootInput / 10.764;
                units.squareYardInput = units.squareFootInput / 9;
             " >
          </div>
       </div>
       <div class="col-md-6">
          <div class="form-group">
             <label>Square Yard</label>
             <input class="form-control" x-model="units.squareYardInput" :id="units.squareYardInput" type="number" @input="
                units.marlaInput = units.squareYardInput / 30.25;
                units.kanalInput = units.squareYardInput / 605;
                units.squareFootInput = units.squareYardInput * 9;
                units.squareMeterInput = units.squareYardInput / 1.196;
             " >
          </div>
       </div>
       <div class="col-md-6">
          <div class="form-group">
             <label x-show="country === 'UK'">Square Meters</label>
             <input x-show="country === 'UK'" class="form-control" x-model="units.squareMeterInput" :id="units.squareMeterInput" type="number" @input="
                units.marlaInput = units.squareMeterInput / 30.25;
                units.kanalInput = units.squareMeterInput / 605;
                units.squareFootInput = units.squareMeterInput * 9;
                units.squareYardInput = units.squareMeterInput / 1.196;
             " >
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


@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

</div>

@endsection

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
    marlaInput: 0,
    kanalInput: 0,
    squareFootInput: 0,
    squareYardInput: 0,
    squareMeterInput: 0
}'>

<h1 x-text='marlaInput'></h1>
<div class="bg-success text-white text-center text-md-left p-4 mb-2">
    <h1 class="m-0">
       Pakistan Area Unit Converter
    </h1>
    <div class="lead">
       Type a value in any of the fields to convert between Length measurements:
    </div>
 </div>
    <div class="p-4">
    <div class="row">
       <div class="col-md-4">
          <div class="form-group">
             <label :for="marla">Marla</label>
             <input class="form-control" x-model="marlaInput" :id="marla" type="number" @input='unitConverter()'>
          </div>
       </div>
       <div class="col-md-4">
          <div class="form-group">
             <label for="kanal">Kanal</label>
             <input class="form-control" x-model="kanalInput" :id="kanal" type="number" @input="unitConverter()" >
          </div>
       </div>
       <div class="col-md-4">
          <div class="form-group">
             <label for="square-foot">Square Foot</label>
             <input class="form-control" x-model="squareFootInput" :id="square-foot" type="number" @input="unitConverter()" >
          </div>
       </div>
       <div class="col-md-6">
          <div class="form-group">
             <label for="square-yard">Square Yard</label>
             <input class="form-control" x-model="squareYardInput" :id="square-yard" type="number" @input="unitConverter()" >
          </div>
       </div>
       <div class="col-md-6">
          <div class="form-group">
             <label for="square-meter">Square Meters</label>
             <input class="form-control" x-model="squareMeterInput" :id="square-meter" type="number" @input="unitConverter()" >
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
    <script>
function unitConverter(){
    console.log(event.target.id)
//    switch(event.target.id){
//       case 'marla':
//          kanalInput = kanalInput / 20;
//          squareFootInput =  squareFootInput * 272;
//          squareMeterInput = squareMeterInput * 25.293;
//          squareYardInput = squareYardInput * 30.25;
//          break;
//       case 'kanal':
//          marlaInput = marlaInput * 20;
//          squareFootInput = squareFootInput * 5445;
//          squareMeterInput = squareMeterInput * 506;
//          squareYardInput = squareYardInput * 605;
//          break;
//       case 'square-foot':
//          marlaInput = marlaInput / 272;
//          kanalInput = kanalInput / 5445;
//          squareMeterInput = squareMeterInput / 10.764;
//          squareYardInput = squareYardInput / 9;
//          break;
//       case 'square-meter':
//          marlaInput = marlaInput / 25.293;
//          kanalInput = kanalInput / 506;
//          squareFootInput = squareFootInput * 10.764;
//          squareYardInput = squareYardInput * 1.196;
//          break;
//       case 'square-yard':
//          marlaInput = marlaInput / 30.25;
//          kanalInput = kanalInput / 605;
//          squareFootInput = squareFootInput * 9;
//          squareMeterInput = squareMeterInput / 1.196;
//          break;
//    }
}
    </script>
@endpush

</div>

@endsection

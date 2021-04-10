@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @livewire('counter') --}}
    @livewire('posts')
    @livewire('datatables')
</div>
@endsection

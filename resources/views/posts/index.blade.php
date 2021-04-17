@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @foreach ($collection as $item)
        @livewire('component', ['user' => $user], key('posts-' . $item->id))
    @endforeach --}}
    @livewire('posts.index')
</div>
@endsection

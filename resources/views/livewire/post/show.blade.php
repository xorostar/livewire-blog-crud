<div>
    <div class="h2">
        View Posts
        <div wire:loading>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('home') }}" style="float: right">Add More</a>
    </div>
    <form class="form-inline my-2 my-lg-0 pt-4 pb-4">
        <input type="search" class='form-control mb-3' placeholder='Search here...' wire:model='search'>
    </form>
    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">excerpt</th>
            <th scope="col">body</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $key => $post)
            <tr>
                <th scope="row">{{ $key +1 }}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->excerpt}}</td>
                <td>{{$post->body}}</td>
            </tr>
        @empty
        @endforelse

        </tbody>
    </table>
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
    <div class="mt-2">

    </div>
</div>

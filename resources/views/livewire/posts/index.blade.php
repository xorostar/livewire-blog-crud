<div>
    <div class='card'>
        <div class="card-header">All Posts</div>
        <div class="card-body">
            <input type="search" class='form-control mb-3' placeholder='Search here...' wire:model='search'>
            <div wire:loading wire:loading.class='d-block'>
                <div class="py-5">
                    <div class="spinner-grow m-auto d-block" style='width: 3rem; height: 3rem;' role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" wire:loading.remove>
                <thead>
                    <tr>
                        <th wire:click='sortBy("id")'>
                            #
                            @include('partials.sort-controls', ['column' => 'id'])
                        </th>
                        <th wire:click='sortBy("title")'>
                            <div class="d-flex align-items-center">
                                <span>Title</span>
                                @include('partials.sort-controls', ['column' => 'title'])
                            </div>
                        </th>
                        <th>
                            Author
                        </th>
                        <th wire:click='sortBy("excerpt")'>
                            Excerpt
                            @include('partials.sort-controls', ['column' => 'excerpt'])
                        </th>
                        <th wire:click='sortBy("created_at")'>
                            Created At
                            @include('partials.sort-controls', ['column' => 'created_at'])
                        </th>
                        <th wire:click='sortBy("updated_at")'>
                            Last Modified
                            @include('partials.sort-controls', ['column' => 'updated_at'])
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <select class="form-control form-control-sm" wire:model='perPage'>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

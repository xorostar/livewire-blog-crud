<div>
    <h1 class='text-center'>Posts</h1>
    <div class="card">
        <div class="card-header">
            <input type="text" class="form-control w-25" wire:model="search" placeholder="search...">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Title</th>
                        <th scope="col">Excerpt</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-info">No records found.</div>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    {{ $posts->links() }}
                </div>
                <div class="d-flex align-items-center text-nowrap">
                    <label for="perPage" class="mr-3">Per Page: </label>
                    <select id="perPage" class="form-control" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

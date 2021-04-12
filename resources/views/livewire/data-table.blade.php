<div>
    <div class="card-header">
        <input type="text" class="form-control w-25" wire:model="search" placeholder="search...">
    </div>
    <table class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Body</th>
            <th scope="col">Creator</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->user->name }}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex align-items-center text-nowrap">
        <label for="perPage" class="mr-3">Records: </label>
        <select id="perPage" class="form-control" wire:model="records">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div>{{ $posts->links() }}</div>
</div>

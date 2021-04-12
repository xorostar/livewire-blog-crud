<div>
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

    <div>{{ $posts->links() }}</div>
</div>

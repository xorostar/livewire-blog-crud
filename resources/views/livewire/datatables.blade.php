<div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Body</th>
          </tr>
        </thead>
        <tbody>
            @forelse($posts as $key => $post)
                <tr>
                    <td>{{ $key }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->excerpt }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
            @empty
              <h1>No posts Found!</h1>
            @endforelse
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    @endpush
</div>

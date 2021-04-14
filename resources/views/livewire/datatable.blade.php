<div>
    <div class="card">
        <div class="card-header">
            <div>Posts</div>
            <div class="row">
                <div class="col-md-6">
                    <input class="form-control" wire:model.debounce.500ms="search" placeholder="Search title,body,excerpt...">
                </div>

                {{-- <div class="col-md-6">
                    <select class="form-control" wire:model="orderBy">
                        <option>Order By</option>
                        <option value="title">Title</option>
                        <option value="excerpt">Excerpt</option>
                        <option value="created_at">Created at</option>
                    </select>
                </div> --}}

            </div>
        </div>
        <div class="card-body">
             <table class="table table-striped">
                 <tr>
                     <th scope="col" >#</th>
                     <th scope="col" >Author</th>
                     <th scope="col" ><a href="#" wire:click="sortBy('title')">Title</a></th>
                     <th scope="col"><a href="#" wire:click="sortBy('excerpt')">Excerpt</a></th>
                     <th scope="col"><a href="#" wire:click="sortBy('body')">Body</a></th>
                 </tr>
                 @forelse($posts as $key => $post)
                 <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $post->user->name }}</td>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->excerpt }}</td>
                     <td>{{ $post->body }}</td>
                 </tr>
                 @empty
                 <div class="col-md-12">
                     <div class="alert alert-info">
                         No posts found
                     </div>
                 </div>
                 @endforelse
             </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-8">{{ $posts->links() }}</div>
                @if($posts->count()> 9)
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="pagination-links">Select Pagination</label>
                      <select wire:model="perPage">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                      </select>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

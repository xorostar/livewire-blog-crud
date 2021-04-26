<div>
    <h1 class='text-center'>Posts</h1>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent='storePost'>
                <div class="h2">
                    Add Post
                    <div wire:loading>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">
                        Title
                    </label>
                    <input wire:model.defer='title' class='form-control @error("title") is-invalid @enderror' id='title'
                        type="text">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">
                        Excerpt
                    </label>
                    <input wire:model.defer='excerpt' class='form-control @error("excerpt") is-invalid @enderror'
                        id='excerpt' type="text">
                    @error('excerpt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">
                        Body
                    </label>
                    <textarea wire:model.defer='body' class='form-control @error("body") is-invalid @enderror'
                        id='body'></textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="h3">{{ $post->title }}</div>
                    <p>{{ $post->excerpt }}</p>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary" wire:click='editPost({{ $post->id }})'>Edit</button>
                    <button class="btn btn-danger"
                        wire:click='$emit("confirmPostDelete", {{ $post->id }})'>Delete</button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-info">
                No posts found
            </div>
        </div>
        @endforelse
    </div>
    <div class="mt-2">
        {{ $posts->links() }}
    </div>

    @if ($postToEdit)

    <div class="modal" tabindex="-1" id='edit-post' wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Edit Post (#{{ $postToEdit->id }})</h5>
                        <div wire:loading>
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent='updatePost'>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="postToEditTitle">
                                Title
                            </label>
                            <input wire:model.defer='postToEditTitle'
                                class='form-control @error("postToEditTitle") is-invalid @enderror' id='postToEditTitle'
                                type="text">
                            @error('postToEditTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerpt">
                                Excerpt
                            </label>
                            <input wire:model.defer='postToEditExcerpt'
                                class='form-control @error("postToEditExcerpt") is-invalid @enderror' id='excerpt'
                                type="text">
                            @error('postToEditExcerpt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">
                                Body
                            </label>
                            <textarea wire:model.defer='postToEditBody'
                                class='form-control @error("postToEditBody") is-invalid @enderror' id='body'></textarea>
                            @error('postToEditBody')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type='button' data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type='submit'>Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @push('scripts')
    <script>
        Livewire.on('editPost', function() {
            $('#edit-post').modal('show');
        });

        Livewire.on('postAdded', function(){
            Swal.fire({
                icon: 'success',
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Post added successfully asasdfads!',
                toast: true,
                position: 'top-end'
            });
        });

        Livewire.on('postUpdated', function() {
            Swal.fire({
                icon: 'success',
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Post updated successfully!',
                toast: true,
                position: 'top-end'
            });
            $('#edit-post').modal('hide');
        });

        Livewire.on('postDeleted', function(){
            Swal.fire({
                icon: 'success',
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Post deleted successfully!',
                toast: true,
                position: 'top-end'
            });
        })

        Livewire.on("confirmPostDelete", function(id) {
            Swal.fire({
                icon: 'question',
                title: 'Are you sure you want to delete this post?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                }).then(function(result){
                    if (result.isConfirmed) {
                        @this.destroyPost(id);
                    }
                });
        });
    </script>
    @endpush
</div>

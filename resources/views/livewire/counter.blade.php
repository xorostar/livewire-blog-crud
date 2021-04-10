<div>
    <button class="btn btn-primary" wire:click='increment' wire:loading.attr='disabled'>
        +
    </button>
    <h1>
        {{ $count }}
    </h1>
    <button class="btn btn-primary" wire:click='decrement' wire:loading.attr='disabled'>
        -
    </button>
    <div>
        <div class='alert alert-info' wire:loading>
            Loading...
        </div>
    </div>
</div>

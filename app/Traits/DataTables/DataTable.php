<?php

namespace App\Traits\DataTables;

use Livewire\WithPagination;


trait DataTable
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $perPage = 10;

    public $orderBy = 'id';

    public $hasSortBy = 'asc';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy(string $fieldName)
    {
        if ($this->orderBy === $fieldName) {
            $this->hasSortBy = $this->hasSortBy === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $fieldName;
            $this->hasSortBy = 'asc';
        }
    }
}

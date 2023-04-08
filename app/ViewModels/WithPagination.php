<?php

namespace App\ViewModels;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait WithPagination
{
    protected LengthAwarePaginator $paginator;

    public function currentPage(): int
    {
        return $this->paginator->currentPage();
    }

    public function total(): int
    {
        return $this->paginator->total();
    }

    public function nextPageUrl(): ?string
    {
        return $this->paginator->nextPageUrl();
    }

    public function previousPageUrl(): ?string
    {
        return $this->paginator->previousPageUrl();
    }

    public function from(): ?int
    {
        return $this->paginator->firstItem();
    }

    public function to(): ?int
    {
        return $this->paginator->lastItem();
    }

    public function links(): Collection
    {
        return $this->paginator->linkCollection();
    }

    public function perPage(): int
    {
        return $this->paginator->perPage();
    }
}

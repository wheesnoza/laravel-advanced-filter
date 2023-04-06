<?php

namespace App\Http\Requests;

use App\Enums\ProductSorters;
use App\Enums\SortDirections;
use App\Sorters\Sorter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class GetProductsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [];
    }

    public function filters(): Collection
    {
        return $this->collect('filter');
    }

    public function sorter(): Sorter
    {
        return $this
            ->sortBy()
            ->createSorter($this->sortDirection());
    }

    public function sortBy(): ProductSorters
    {
        $sortBy = ProductSorters::tryFrom($this->sort);

        if (is_null($sortBy)) {
            return ProductSorters::Raiting;
        }

        return $sortBy;
    }

    public function sortDirection(): SortDirections
    {
        $sortDirection = SortDirections::tryFrom($this->sort_direction);

        if (is_null($sortDirection)) {
            return SortDirections::Desc;
        }

        return $sortDirection;
    }
}

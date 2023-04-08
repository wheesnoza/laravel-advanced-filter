<?php

namespace App\Http\Requests\Product;

use App\Collections\FilterCollection;
use App\Enums\Product\ProductSorters;
use App\Enums\SortDirections;
use App\Sorters\Sorter;
use Illuminate\Foundation\Http\FormRequest;

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

    public function filters(): FilterCollection
    {
        return new FilterCollection($this->filter);
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

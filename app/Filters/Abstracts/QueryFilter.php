<?php


namespace App\Filters\Abstracts;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected Builder $builder;

    protected Request $request;

    /**
     * UsersFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Applying all filters.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder) : Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $filter => $filterValue) {
            if (method_exists($this, $filter)) {
                $this->$filter($filterValue);
            }
        }

        return $this->builder;
    }

    /**
     * Receiving all filters and values as array.
     *
     * @return array
     */
    public function filters() : array
    {
        return $this->request->all();
    }
}

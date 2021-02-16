<?php


namespace App\Filters\Abstracts;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Builder $builder;

    protected Request $request;

    /**
     * UsersFilter constructor.
     * @param Builder $builder
     * @param Request $request
     */
    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    /**
     * Applying all filters.
     *
     * @return Builder
     */
    public function apply() : Builder
    {
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

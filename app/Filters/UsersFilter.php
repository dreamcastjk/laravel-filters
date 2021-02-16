<?php


namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\Abstracts\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class UsersFilter extends QueryFilter
{
    /**
     * Query by name.
     *
     * @param $value
     */
    public function name($value) : void
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    /**
     * Query by email.
     *
     * @param $value
     */
    public function email($value) : void
    {
        $this->builder->where('email', 'like', "%$value%");
    }

    /**
     * Query by is active.
     *
     * @param $value
     */
    public function is_active($value) : void
    {
        $this->builder->where('is_active', $value);
    }

    /**
     * Query by gender.
     *
     * @param $value
     */
    public function gender($value) : void
    {
        $this->builder->where('gender', "$value");
    }

    /**
     * Query by birthday.
     *
     * @param $value
     */
    public function birthday($value) : void
    {
        if (!$value){
            return;
        }

        $this->builder->whereHas('info', function (Builder $query) use ($value) {
            $query->where('birthday', 'like', "%$value%");
        });
    }
}

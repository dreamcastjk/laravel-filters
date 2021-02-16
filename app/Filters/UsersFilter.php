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
    public function name(?string $value) : void
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    /**
     * Query by email.
     *
     * @param $value
     */
    public function email(?string $value) : void
    {
        $this->builder->where('email', 'like', "%$value%");
    }

    /**
     * Query by is active.
     *
     * @param $value
     */
    public function is_active(?bool $value) : void
    {
        $this->builder->where('is_active', $value);
    }

    /**
     * Query by gender.
     *
     * @param $value
     */
    public function gender(?int $value) : void
    {
        $this->builder->where('gender', $value);
    }

    /**
     * Query by birthday.
     *
     * @param $value
     */
    public function birthday(?string $value) : void
    {
        if (!$value){
            return;
        }

        $this->builder->whereHas('info', function (Builder $query) use ($value) {
            $query->where('birthday', 'like', "%$value%");
        });
    }
}

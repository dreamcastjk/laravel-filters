<?php


namespace App\Traits;

/**
 * Trait Statuses
 * @package App\Traits
 */
trait Statuses
{
    public static int $ACTIVE = 1;

    public static int $NOT_ACTIVE= 0;

    public static string $ACTIVE_TEXT = 'Active';

    public static string $NOT_ACTIVE_TEXT = 'Not Active';

    /**
     * @param int|null $status
     * @return array|mixed
     */
    public static function statuses(int $status = null)
    {
        $statuses = [
            self::$ACTIVE => self::$ACTIVE_TEXT,
            self::$NOT_ACTIVE => self::$NOT_ACTIVE_TEXT,
        ];

        return is_null($status) ? $statuses : $statuses[$status];
    }

    /**
     * Get status string title.
     *
     * @return string|string[]
     */
    public function getIsActiveTitleAttribute()
    {
        return self::statuses(optional($this)->is_active);
    }
}

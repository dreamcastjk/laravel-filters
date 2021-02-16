<?php


namespace App\Traits;


trait Genders
{
    public static int $GENDER_MALE = 1;

    public static int $GENDER_FEMALE = 2;

    public static string $GENDER_MALE_TITLE = 'Male';

    public static string $GENDER_FEMALE_TITLE = 'Female';

    /**
     * @param int $gender
     * @return string
     */
    public function genders(int $gender) : string
    {
        $genders = [
            self::$GENDER_MALE => self::$GENDER_MALE_TITLE,
            self::$GENDER_FEMALE => self::$GENDER_FEMALE_TITLE,
        ];

        return $genders[$gender];
    }

    /**
     * Get gender string title.
     *
     * @return mixed|string
     */
    public function getGenderTitleAttribute() : string
    {
        return self::genders($this->gender);
    }
}

<?php namespace App\Libraries\Common;

use DateTime;

class DateLib extends \DateTime
{
    private $raw_date;

    public function __construct($raw_date = null) {
        parent::__construct($raw_date);
    }

    public function getDay($format='Y', $is_integer=true) {
        $day = $this->format($format);
        if ($is_integer && in_array($format, ['d', 'j']))
            $day = (int)$day;
        return $day;
    }

    public function getMonth($format='m', $is_integer=true) {
        $month = $this->format($format);
        if ($is_integer && in_array($format, ['m', 'n']))
            $month = (int)$month;
        return $month;
    }

    public function getYear($format='Y', $is_integer=true) {
        $year = $this->format($format);
        if ($is_integer && in_array($format, ['Y', 'y']))
            $year = (int)$year;
        return $year;
    }


    public function isMonth($month) {
        return ($this->format('Y') == $month);
    }

    public function isYear($year, $operator='=') {
        if ($operator == '>=') {
            return ($this->format('Y') >= $year);
        }
        elseif ($operator == '<=') {
            return ($this->format('Y') <= $year);
        }
        elseif ($operator == '<') {
            return ($this->format('Y') < $year);
        }
        elseif ($operator == '>') {
            return ($this->format('Y') > $year);
        }
        elseif ($operator == '!=') {
            return ($this->format('Y') != $year);
        }
        else {
            return ($this->format('Y') == $year);
        }
    }
}
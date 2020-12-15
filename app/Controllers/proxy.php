<?php
class proxy
{
	private $regularPattern = array(
        'int'           => '/^[0-9]+$/',
        'email'         => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/m',
        'arabic'        => '/^[\p{Arabic} ]+$/u',
        'english'       => '/^[a-zA-Z -_.]+$/',
        'date'          => '/^[1-2][0-9][0-9][0-9]-(?:(?:0[1-9])|(?:1[0-2]))-(?:(?:0[1-9])|(?:(?:1|2)[0-9])|(?:3[0-1]))$/',
        'national_id'   => '/^(2|3)[0-9][0-9][0-1][0-9][0-3][0-9](01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)[0-9][0-9][0-9][0-9][0-9]$/'
    );

	private $allowedImages = array('jpeg', 'jpg', 'png' , 'gif');
    
    public function validString($string)
    {
        $word = filter_var($string, FILTER_SANITIZE_STRING);
        return $word;
    }

    public function validEmail($mail)
    {
        $email = filter_var($mail, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    public function validNumber($num)
    {
        $number = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        return $number;
    }

    public function isdDate($date)
    {
        return (bool) preg_match($this->regularPattern['date'], $date);
    }

    public function isEmail($mail)
    {
        return (bool) preg_match($this->regularPattern['email'], $mail);
    }

    public function isInt($int)
    {
        return (bool) preg_match($this->regularPattern['int'], $int);
    }

    public function isArabic($arabic)
    {
        return (bool) preg_match($this->regularPattern['arabic'], $arabic);
    }

    public function isEnglish($english)
    {
        return (bool) preg_match($this->regularPattern['english'], $english);
    }

    public function isNationalid($national)
    {
        return (bool) preg_match($this->regularPattern['national_id'], $national);
    }

    public function isMatched($wordOne, $wordTwo)
    {
        return $wordOne == $wordTwo;
    }

    public function isSelected($select)
    {
        return $select != 0;
    }

    public function isAllowedImage($image)
    {
        return in_array($image, $this->allowedImages);
    }
}
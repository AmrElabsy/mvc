<?php

class changelanguage
{
    public function arabic()
    {
        Language::setArabic();
    }

    public function english()
    {
        Language::setEnglish();
    }

    public function __destruct()
    {
        Redirect::back();      
    }
}
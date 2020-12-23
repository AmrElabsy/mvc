<?php

require_once "abstractcontroller.php";

class changelanguage extends AbstractController
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
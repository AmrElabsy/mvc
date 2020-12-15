<?php

class language
{
    public function arabic()
    {
        $_SESSION['lang'] = "arabic";
        redirect('back');
    }

    public function english()
    {
        $_SESSION['lang'] = "english";
        redirect('back');
    }
}
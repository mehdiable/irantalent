<?php


namespace App\Models;


interface IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     */
    public function action();
}

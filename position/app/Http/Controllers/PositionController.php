<?php

namespace App\Http\Controllers;

use App\Models\ViewModel;
use Database\Seeders\DatabaseSeeder;

class PositionController extends Controller
{
    /**
     * run seeders
     */
    public function runSeeders(): void {
        (new DatabaseSeeder)->run();
    }
    
    /**
     * Get position list
     *
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        return (new ViewModel('position.index'))->response();
    }
    
    /**
     * Get position
     *
     * @return mixed
     * @throws \Exception
     */
    public function view()
    {
        return (new ViewModel('position.view'))->response();
    }
    
    /**
     * Create position
     *
     * @return mixed
     * @throws \Exception
     */
    public function create()
    {
        return (new ViewModel('position.create'))->response();
    }
    
    /**
     * Update position
     *
     * @return mixed
     * @throws \Exception
     */
    public function update()
    {
        return (new ViewModel('position.update'))->response();
    }
    
    /**
     * Delete position
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy()
    {
        return (new ViewModel('position.delete'))->response();
    }
    
    /**
     * Search position
     *
     * @return mixed
     * @throws \Exception
     */
    public function search()
    {
        return (new ViewModel('position.search'))->response();
    }
}

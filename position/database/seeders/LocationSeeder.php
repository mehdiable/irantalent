<?php

namespace Database\Seeders;

use App\Models\Location\LocationModel;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = ['Tehran', 'Isfahan', 'Tabriz', 'Yazd', 'Kerman', 'Shiraz'];
        foreach ($list as $location) {
        
            $model = new LocationModel();
        
            $model->title = $location;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
        
            $model->save();
        }
    }
}

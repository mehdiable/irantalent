<?php

namespace Database\Seeders;

use App\Models\Category\CategoryModel;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = ['IT', 'Designer', 'Accounting', 'Health Care', 'Laboratory', 'Lawyer', 'Social Service', 'Security Service'];
        foreach ($list as $category) {
            
            $model = new CategoryModel();
            
            $model->title = $category;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            
            $model->save();
        }
    }
}

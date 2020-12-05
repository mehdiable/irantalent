<?php

namespace Database\Seeders;

use App\Models\Education\EducationModel;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = ['Diploma', 'A.S.', 'B.S.', 'M.S.', 'Doctoral'];
        foreach ($list as $education) {
            
            $model = new EducationModel();
        
            $model->title = $education;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
        
            $model->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Position\PositionModel;
use Elasticsearch\ClientBuilder;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PositionModel::factory(500)->create();
        
        $client = ClientBuilder::create()
            ->setHosts([env('ELASTIC_SEARCH_HOST')])
            ->build();
    
        $model = PositionModel::query()->with(['relCategory', 'relEducation', 'relLocation'])->get()->toArray();
    
        foreach ($model as $m) {
            $body = [
                'title' => $m['title'],
                'category_title' => $m['rel_category']['title'] ?? null,
                'location_title' => $m['rel_location']['title'] ?? null,
                'education_title' => $m['rel_education']['title'] ?? null,
                'category_id' => $m['category_id'],
                'location_id' => $m['location_id'],
                'education_id' => $m['education_id'],
                'min_age' => $m['min_age'],
                'max_age' => $m['max_age'],
                'gender' => $m['gender'],
                'salary' => $m['salary'],
                'created_at' => $m['created_at'],
                'expired_at' => $m['expired_at'],
                'lived_at' => $m['lived_at'],
            ];
            $params = [
                'index' => 'positions',
                'id' => $m['id'],
                'body' => $body
            ];
            
            $client->index($params);
        }
    }
}

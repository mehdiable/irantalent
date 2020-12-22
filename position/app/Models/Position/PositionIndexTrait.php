<?php

namespace App\Models\Position;

use Elasticsearch\ClientBuilder;

/**
 * Indexing process for ElasticSearch
 *
 * Trait PositionIndexTrait
 * @package App\Models\Position
 */
trait PositionIndexTrait
{
    public static function esIndex(int $indexId)
    {
        if (!$indexId) {
            return false;
        }
        
        $model = PositionModel::query()->with(['relCategory', 'relEducation', 'relLocation'])->find($indexId);
        if (!$model) {
            return false;
        }
        
        $m = $model->toArray();
        $body = [
            'title' => $m['title'],
            'category_title' => $m['relCategory']['title'],
            'location_title' => $m['relLocation']['title'],
            'education_title' => $m['relEducation']['title'],
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
            'index' => $model->getTable(),
            'id' => $indexId,
            'body' => $body
        ];
        
        $client = ClientBuilder::create()
            ->setHosts([env('ELASTIC_SEARCH_HOST')])
            ->build();
        $client->index($params);
    }
}

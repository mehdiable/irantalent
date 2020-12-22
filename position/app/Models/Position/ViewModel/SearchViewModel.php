<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Response;

/**
 * Search & indexing methods
 *
 * Class SearchViewModel
 * @package App\Models\Position\ViewModel
 */
class SearchViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     */
    public function action()
    {
        $client = ClientBuilder::create()
            ->setHosts([env('ELASTIC_SEARCH_HOST')])
            ->build();
        
        $search = request()->all([
            'title', 'category_title', 'location_title', 'education_title', 'gender',
            'salary', 'lived_at', 'expired_at', 'created_at', 'age'
        ]);
        
        $params = [
            'index' => 'positions',
            'body' => [
                "query" => [
                    "bool" => [
                        "should" => [
                            ['match' => ['category_title' => $search['category_title'] ?? '']],
                            ['match' => ['location_title' => $search['location_title'] ?? '']],
                            ['match' => ['education_title' => $search['education_title'] ?? '']],
                            ['match' => ['gender' => $search['gender'] ?? '']],
                            [
                                'multi_match' => [
                                    'query' => $search['title'] ?? '',
                                    'type' => 'best_fields',
                                    'fields' => ['title', 'category_title', 'location_title', 'education_title'],
                                    'fuzziness' => '0',
                                    'prefix_length' => 1,
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $response = $client->search($params);
        
        if (isset($response['hits']['hits'])) {
            return response()->json($response['hits']['hits'] ?? null);
        }
        
        return response()->json(['error' => 'Not found.'], Response::HTTP_NOT_FOUND);
    }
}

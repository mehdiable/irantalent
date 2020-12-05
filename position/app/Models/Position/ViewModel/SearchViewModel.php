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
        $client = ClientBuilder::create()->build();
        
        $search = request()->all([
            'title', 'category', 'location', 'education', 'gender',
            'salary', 'lived_at', 'expired_at', 'created_at', 'age'
        ]);
        
        $params = [
            'index' => 'positions',
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $search['title'],
                        'fields' => ['title', 'category', 'location', 'education', 'gender']
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

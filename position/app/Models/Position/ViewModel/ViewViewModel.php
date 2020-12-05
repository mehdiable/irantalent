<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use App\Models\Position\PositionModel;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

/**
 * Search & indexing methods
 *
 * Class SearchViewModel
 * @package App\Models\Position\ViewModel
 */
class ViewViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     */
    public function action()
    {
        $id = Request::route('id');
        
        $model = PositionModel::query()->find($id);
        
        if ($model) {
            return \response()->json($model->toArray());
        }
        
        return \response()->json(['error' => 'Not found.'], Response::HTTP_NOT_FOUND);
    }
}

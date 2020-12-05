<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use App\Models\Position\PositionModel;
use Illuminate\Http\Response;

class IndexViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     */
    public function action()
    {
        $model = PositionModel::query()->paginate(10);
        
        if ($model) {
            return response()->json($model);
        }
        
        return \response()->json(['error' => 'Not found.'], Response::HTTP_NOT_FOUND);
    }
}

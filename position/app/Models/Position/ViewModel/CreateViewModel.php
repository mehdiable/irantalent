<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use App\Models\Position\PositionModel;
use App\Models\Position\PositionValidator;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class CreateViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function action()
    {
        $params = PositionValidator::validate(Request::all());
        
        if (!is_array($params)) {
            return \response()->json(['error' => 'Validation Errors', 'invalid_params' => $params], Response::HTTP_ACCEPTED);
        }
        
        $model = new PositionModel($params);
        
        if ($model->save()) {
            PositionModel::esIndex($model->id);
            return \response()->json(['success' => 'Created Successfully.', 'data' => $model->toArray()], Response::HTTP_CREATED);
        }
        
        return \response()->json(['error' => 'Create has been failed.'], Response::HTTP_ACCEPTED);
    }
    
}

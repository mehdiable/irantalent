<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use App\Models\Position\PositionIndexTrait;
use App\Models\Position\PositionModel;
use App\Models\Position\PositionValidator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class UpdateViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function action()
    {
        $id = Request::route('id');
        $params = PositionValidator::validate(Request::all());
        
        if (!is_array($params)) {
            return \response()->json(['error' => 'Validation Errors', 'invalid_params' => $params], Response::HTTP_ACCEPTED);
        }
        
        $model = PositionModel::query()->find($id);
        
        if ($model) {
            $model->fill($params);
            if ($model->save()) {
                PositionModel::esIndex($model->id);
                return \response()->json(['success' => 'Updated Successfully.', 'data' => $model->toArray()]);
            }
        }
        
        return \response()->json(['error' => 'Update has been failed.'], Response::HTTP_ACCEPTED);
    }
    
}

<?php

namespace App\Models\Position\ViewModel;

use App\Models\IViewModel;
use App\Models\Position\PositionModel;
use App\Models\Position\PositionValidator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class DeleteViewModel implements IViewModel
{
    /**
     * Handle view model actions
     *
     * @return mixed
     * @throws \Exception
     */
    public function action()
    {
        $id = Request::route('id');
        $model = PositionModel::query()->find($id);
        
        if ($model && $model->delete()) {
            
            // soft deleted
            return \response()->json(['success' => 'Soft Deleted Successfully.']);
        }
        
        return \response()->json(['error' => 'Delete has been failed.'], Response::HTTP_ACCEPTED);
    }
    
}

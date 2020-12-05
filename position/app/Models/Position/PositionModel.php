<?php

namespace App\Models\Position;

use App\Models\Location\LocationModel;
use App\Models\Category\CategoryModel;
use App\Models\Education\EducationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use PositionIndexTrait;
    
    protected $table = 'positions';
    
    protected $fillable = [
        'title', 'category_id', 'min_age', 'max_age', 'education_id',
        'gender', 'salary', 'location_id', 'expired_at', 'lived_at'
    ];
    
    public function relCategory() {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    
    public function relEducation() {
        return $this->belongsTo(EducationModel::class, 'education_id');
    }
    
    public function relLocation() {
        return $this->belongsTo(LocationModel::class, 'location_id');
    }
}

<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationModel
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App\Models\Education
 */
class EducationModel extends Model
{
    use HasFactory;
    
    protected $table = 'educations';
}

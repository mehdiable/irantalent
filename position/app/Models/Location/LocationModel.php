<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationModel
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App\Model\Location
 */
class LocationModel extends Model
{
    use HasFactory;
    
    protected $table = 'locations';
    
}

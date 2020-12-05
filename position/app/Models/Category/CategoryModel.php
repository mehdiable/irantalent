<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryModel
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App\Models\Category
 */
class CategoryModel extends Model
{
    use HasFactory;
    
    protected $table = 'categories';
}

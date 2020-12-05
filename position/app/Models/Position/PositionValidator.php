<?php


namespace App\Models\Position;


use Illuminate\Support\Facades\Validator;

class PositionValidator
{
    const rules = [
        'title' => 'required|string|min:3',
        'category_id' => 'required|integer|exists:categories,id',
        'min_age' => "integer|min:0|max:69",
        'max_age' => 'integer|gt:min_age|max:70',
        'education_id' => 'required|integer|exists:educations,id',
        'gender' => 'in:male,female',
        'salary' => "integer|min:0",
        'location_id' => 'integer|exists:locations,id',
        'expired_at' => "required|date|date_format:Y-m-d",
        'lived_at' => 'required|date|date_format:Y-m-d',
    ];
    
    /**
     * @param array $params
     * @param array $rules
     * @return \Illuminate\Support\MessageBag|array
     * @throws \Illuminate\Validation\ValidationException
     */
	public static function validate(array $params, array $rules = []) {
	    if (!empty($rules)) {
	        $_rules = array_intersect_key(self::rules, array_flip($rules));
        } else {
            $_rules = self::rules;
        }
        
        $validator = Validator::make($params, $_rules);
        
        if ($validator->fails()) {
            return $validator->messages();
        }
        
        return $validator->validate();
    }
}

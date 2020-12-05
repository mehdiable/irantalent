<?php

namespace Database\Factories\Position;

use App\Models\Category\CategoryModel;
use App\Models\Education\EducationModel;
use App\Models\Location\LocationModel;
use App\Models\Position\PositionModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PositionModel::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $cat = array_column(CategoryModel::query()->get(['id'])->toArray(), 'id');
        $edu = array_column(EducationModel::query()->get(['id'])->toArray(), 'id');
        $loc = array_column(LocationModel::query()->get(['id'])->toArray(), 'id');
        array_push($loc, null);
        
        $minAge = rand(1, 69);
        $maxAge = rand($minAge, 70);
        
        $salary = rand(2000000, 20000000);
        
        $format = 'Y-m-d H:i:s';
        $date = $this->faker->dateTimeBetween('-1 month', '+2 month');
        
        $expDate = $this->faker->randomElement([$date, null]);
        $_expDate = clone $date;
        $interval = 'P' . rand(5, 30) . 'D';
        $createdAt = isset($expDate) ?
            $_expDate->sub(new \DateInterval($interval)) :
            $this->faker->dateTimeBetween('-2 month', 'now');
        
        $dateLive = date($format, rand($createdAt->getTimestamp(), (
            isset($expDate) ?
            $expDate->getTimestamp() :
            $this->faker->dateTimeBetween('now')->getTimestamp()
        )));
        
        return [
            'title' => $this->faker->randomElement([
                'PHP Developer', 'Translator', 'UI/UX Designer', 'Sales Manager', 'Marketing Manager',
                'team leader', 'Assistant Manager', 'Executive', 'Director', 'Coordinator',
                'Banking', 'Product Owner', 'Project Manager', 'CTO', 'CEO', 'Human resources',
                'Finance', 'Electrical engineer', 'Safety engineer', 'IT manager', 'SQL developer', 'Data architect',
            ]),
            'category_id' => $this->faker->randomElement($cat),
            'education_id' => $this->faker->randomElement($edu),
            'location_id' => $this->faker->randomElement($loc),
            'min_age' => $this->faker->randomElement([$minAge, null]),
            'max_age' => $this->faker->randomElement([$maxAge, null]),
            'gender' => $this->faker->randomElement(['male', 'female', null]),
            'salary' => $this->faker->randomElement([$salary, null]),
            'expired_at' => isset($expDate) ? $expDate->format($format) : null,
            'lived_at' => $this->faker->randomElement([$dateLive, null]),
            'created_at' => $createdAt->format($format),
            'updated_at' => $createdAt->format($format),
        ];
    }
}

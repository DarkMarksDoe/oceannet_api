<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'genre' => $this->faker->randomElement(['male', 'female']),
            'born_date' => $this->randomDate(),
            'latitude' => '19.0825257',
            'longitude' => '-98.2304028',
            'url_profile_picture' => 'https://picsum.photos/seed/' . $this->faker->word . '/200/300'
        ];
    }
    public function randomDate():string
    {
        #Generate a timestamp using mt_rand.
        $timestamp = mt_rand(1, time());

        #Format that timestamp into a readable date string.
        $randomDate = date("Y-m-d", $timestamp);

        return $randomDate;
    }
}

<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => fake()->unique()->regexify('[0-9]{13}'),
            'first_name' => fake('th-TH')->name(),
            'last_name' => fake('th-TH')->lastname(),
            'first_name_en' => fake()->name(),
            'last_name_en' => fake()->lastname(),
            'major_id' => 1,
            'idcard' => fake()->unique()->regexify('[0-9]{13}'), //{ 13 } จำนวนว่าจะเอากี่หลัก
            'birthdate' => fake()->datetimeBetween(),
            'gender' => fake()->randomElement(['M','F','L','G','B','T','Q']),
            'address' => fake()->address(),
            'phone' => fake()->numerify('##########'),
            'email' => fake()->unique()->email()
            // 'student_code'=> fake()->Unique()->regexify('[0-9]{15}'),
            // 'first_name'=>fake('th_TH')->name,
            // 'last_name'=>fake('th_TH')->lastName,
            // 'first_name_en'=>fake()->name,
            // 'last_name_en'=>fake()->lastName,
            // 'major_id'=>fake()->randomElement(['1','2','3','4','5']),
            // 'idcard'=>fake()->Unique()->regexify('[0-9]{20}'),
            // 'birthdate'=>fake()->dateTimeBetween(),
            // 'gender'=>fake()->randomElement(['M','F','L','G','B','T']),
            // 'address'=>fake('th_TH')->address,
            // 'phone' => fake()->numerify('##########'),
            // 'email' => fake()->unique()->email()
            // 1	วิทยาการคอมพิวเตอร์	Computer science		
            // 2	ดิจิทัลมีเดีย	Digital media		
            // 3	ภาษาอังกฤษธุระกิจ	Business English		
            // 4	รัฐประศาสนศาสตร์	Public Administration		
            // 5	คณิตศาสตร์	mathematics		

        ];
    }
}

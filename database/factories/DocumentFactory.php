<?php

namespace Database\Factories;

use App\Talent\Documents\Model\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documents>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'original_name' => $this->faker->word(),
            'type' => 'pdf',
            'path' =>'employeedocuments/rz3why6Oy6GbaWHh1IeMie4FaB0D54siEej4F3vx.pdf'
        ];
    }
}

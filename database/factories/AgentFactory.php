<?php 

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $agentTypes = [
            'Chatbot',
            'Data Analyzer',
            'Image Generator',
            'Recommender',
            'Automated Assistant',
            'Content Creator',
            'Code Generator',
            'Sentiment Analyzer'
        ];

        return [
            'name' => $this->faker->unique()->word() . $this->faker->randomElement(['Bot', 'AI', 'Engine', 'Mind', 'Gen']),
            'type' => $this->faker->randomElement($agentTypes),
            'description' => $this->faker->paragraph(3),
        ];
    }
}

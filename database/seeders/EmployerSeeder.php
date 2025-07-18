<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employer::factory()->create([
            'name' => 'Test User',
            'user_id'=>'1',
            'tel'=>fake()->text(20)
        ]);

        $this->call(PostSeeder::class);
    }
}

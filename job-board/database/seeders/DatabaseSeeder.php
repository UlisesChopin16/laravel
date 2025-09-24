<?php

namespace Database\Seeders;

use App\Models\OfferedJob;
use App\Models\User;
use App\Models\Employer;
use App\Models\JobApplication;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ulises Sotelo',
            'email' => 'usotelo@sinprol.com.mx',
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i=0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            OfferedJob::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $jobs = OfferedJob::inRandomOrder()
                ->take(rand(0, 4))
                ->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'offered_job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}

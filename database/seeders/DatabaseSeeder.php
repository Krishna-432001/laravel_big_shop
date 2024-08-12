<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        User::factory()->create([
            'name' => 'Sri Abirami',
            'email' => 'sriabirami@gmail.com',
            'password' => Hash::make('sriabirami'),
        ]);

        User::factory()->create([
            'name' => 'Krishna',
            'email' => 'krishna@gmail.com',
            'password' => Hash::make('krishna'),
        ]);
        
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            LabelSeeder::class,
            TagSeeder::class,
            CompanySeeder::class,
            CollectionSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,

        ]);

        
        

        


        



        

       

    }
}

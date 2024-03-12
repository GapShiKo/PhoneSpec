<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PhoneSpecFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PhoneSpec;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create([
            "name" => "admin",
            "email" => "email@email.com",
            "password"=>bcrypt("admin"),
        ]);
        PhoneSpec::factory(1)->create([
            "name" => "Samsung Galaxy S24 Ultra",
            "date" => "16-01-2024",
            "memory" => "12/256, 12/512, 12/1024",
            "SoC" => "Qualcomm Snapdragon 8 Gen3 for Galaxy",
            "cameras" => "200MP+50MP+12MP+10MP+10MP",
            "thumbnail" => "https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-s24-ultra-5g-sm-s928-0.jpg"
        ]);
        PhoneSpec::factory(1)->create([
            "name" => "Xiaomi 14",
            "date" => "12-12-2023",
            "memory" => "12/256, 12/512, 16/512",
            "SoC" => "Qualcomm Snapdragon 8 Gen3",
            "cameras" => "50MP+50MP+50MP+32MP",
            "thumbnail" => "https://fdn2.gsmarena.com/vv/pics/xiaomi/xiaomi-14-01.jpg"
        ]);
    }
}

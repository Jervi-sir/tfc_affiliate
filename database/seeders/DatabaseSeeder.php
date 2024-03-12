<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $role = new Role();
        $role->name = 'Admin';
        $role->save();
        $role = new Role();
        $role->name = 'Client';
        $role->save();

        $category = new Category();
        $category->name = 'Sport & Outdoor';
        $category->save();
        $category = new Category();
        $category->name = 'PC & Laptop';
        $category->save();
        $category = new Category();
        $category->name = 'Smartphone & Tablet';
        $category->save();
        $category = new Category();
        $category->name = 'Photography';
        $category->save();
    }
}

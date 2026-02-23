<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@medicare.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Teacher
        User::create([
            'name' => 'Teacher ',
            'email' => 'teacher@medicare.com',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
        ]);

        // Management
        User::create([
            'name' => 'Manager ',
            'email' => 'management@medicare.com',
            'password' => Hash::make('manager123'),
            'role' => 'management',
        ]);

        // Student
        User::create([
            'name' => 'Student ',
            'email' => 'student@medicare.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
        ]);
    }
}
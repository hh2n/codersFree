<?php
// php artisan make:seeder UserSeeder
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'=>'Cesar Espinosa',
            'email'=>'cesar@gmail.com',
            'password'=>bcrypt('Chinita2121')
        ]);
        $user->assignRole('Admin');

        User::factory(99)->create();

    }
}

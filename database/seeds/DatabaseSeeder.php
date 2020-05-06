<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FarmsTableSeeder::class);
        $this->call(AnimalsTableSeeder::class);
        $this->call(AnimalHeatsTableSeeder::class);

    }
}

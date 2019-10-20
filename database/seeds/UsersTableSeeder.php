<?php


use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $this->createUserAdmin();
        $this->createUserClient();
    }
    private function createUserAdmin()
    {
        $user = User::firstOrNew([
            'email' => 'admin@email.com'
        ]);
        $user->fill([
            'name' => 'Adminstrador',
            'email' => 'admin@email.com',
            'password' => \Hash::make('12345678'),
            'email_verified_at' => now(),
            'id_farms' => 1
        ]);
        $user->save();
        if (!$user->hasRole(\App\Enums\UserRolesEnum::ADMIN)) {
            $user->assignRole(\App\Enums\UserRolesEnum::ADMIN);
        }
    }
    private function createUserClient()
    {
        $user = User::firstOrNew([
            'email' => 'client@email.com'
        ]);
        $user->fill([
            'name' => 'Cliente',
            'email' => 'client@email.com',
            'password' => \Hash::make('12345678'),
            'email_verified_at' => now(),
            'id_farms' => 1
        ]);
        $user->save();
        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT)) {
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);
        }
    }
}

<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create('Manager', 'manager@example.com', '1', User::ROLE_MANAGER);
        $this->create('Driver', 'driver@example.com', '1', User::ROLE_DRIVER);
    }

    public function create($name, $email, $password, $role)
    {
        $user = User::firstOrNew(['email' => $email]);

        if (!$user->exists) {
            $user->fill([
                'name' => $name,
                'role' => $role,
                'password' => bcrypt($password),
            ])->save();
        }
    }
}

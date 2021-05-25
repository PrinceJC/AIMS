<?php

use Illuminate\Database\Seeder;
use App\User;
Use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $superadminRole = Role::where('name','superadmin')->first();
        $adminRole = Role::where('name','admin')->first();
        $staffRole = Role::where('name','staff')->first();
        $driverRole = Role::where('name','driver')->first();
        $tsdcomsRole = Role::where('name','tsdcoms')->first();

        $superadmin = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('superadmin')
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        $staff = User::create([
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'password' => bcrypt('staff')
        ]);
        $driver = User::create([
            'name' => 'Driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver')
        ]);
        $tsdcoms = User::create([
            'name' => 'tsdcoms',
            'email' => 'tsdcoms@tsd.com',
            'password' => bcrypt('coms')
        ]);

        $superadmin->roles()->attach($superadminRole);
        $admin->roles()->attach($adminRole);
        $staff->roles()->attach($staffRole);
        $driver->roles()->attach($driverRole);
        $tsdcoms->roles()->attach($tsdcomsRole);

        factory(App\User::class, 5)->create();
    }
}

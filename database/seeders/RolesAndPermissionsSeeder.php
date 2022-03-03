<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        DB::table('permissions')->insert([
            'id'=>1,
            'name' => 'crear_roles',
            'guard_name' => 'api',            
        ]);

        DB::table('permissions')->insert([
            'id'=>2,
            'name' => 'crear_permisos',
            'guard_name' => 'api',            
        ]);

        DB::table('permissions')->insert([
            'id'=>3,
            'name' => 'editar_permisos',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>4,
            'name' => 'asignar_rol',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>5,
            'name' => 'ver_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>6,
            'name' => 'crear_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>7,
            'name' => 'editar_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>8,
            'name' => 'eliminar_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            'id'=>9,
            'name' => 'cambiar_estado_usuario',
            'guard_name' => 'api',            
        ]);
        


        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::create([
            'name' => 'Admin',
            'username' => "admin",
            'lastname' => "User",
            'email' => 'admin@correo.com',
            'password' => Hash::make('admin'),
            'town_id'=>1,
            'status_id'=>4
        ]);
        $user->roles()->attach($role);
    }
}

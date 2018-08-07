<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\UserType::class, 2)->create();

        DB::table('user_types')->insert([
            [
                'name' => 'ADMINISTRADOR',
                'description' => 'SUPER USUARIO, ACCESO A TODAS LAS FUNCIONALIDADES DE LA APLICACION',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'USUARIO SIMPLE',
                'description' => 'USUARIO CON ACCESO A FUNCIONALIDADES AUTORIZADAS BAJO PERMISOS DE PERFILES',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}

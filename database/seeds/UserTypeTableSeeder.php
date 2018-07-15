<?php

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
                'description' => 'SUPER USUARIO, ACCESO A TODAS LAS FUNCIONALIDADES DE LA APLICACION'
            ],
            [
                'name' => 'USUARIO SIMPLE',
                'description' => 'USUARIO CON ACCESO A FUNCIONALIDADES AUTORIZADAS BAJO PERMISOS DE PERFILES'
            ]
        ]);
    }
}

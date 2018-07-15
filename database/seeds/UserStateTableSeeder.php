<?php

use Illuminate\Database\Seeder;

class UserStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\UserState::class, 2)->create();

        DB::table('user_states')->insert([
            [
                'name' => 'ACTIVO',
                'icon' => 'check',
                'color_icon' => 'mat-green-A700-bg',
                'description' => 'USUARIO ACTIVO EN PRODUCCION'
            ],
            [
                'name' => 'INACTIVO',
                'icon' => 'close',
                'color_icon' => 'mat-red-A700-bg',
                'description' => 'USUARIO INACTIVO EN PRODUCCION'
            ]
        ]);
    }
}

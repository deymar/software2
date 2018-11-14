<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $areas = [
            ['nombre_area' => 'Cocina'],
            ['nombre_area' => 'Bar'],
            ['nombre_area' => 'Restaurant'],
            ['nombre_area' => 'Spa'],
            ['nombre_area' => 'Limpieza'],
            ['nombre_area' => 'Recepcion']
        ];

        $personales = [
            [   'id_area' => 1,
                'user_name' => 'carlos',
                'password' => bcrypt('123')
            ],
            [   'id_area' => 2,
                'user_name' => 'maria',
                'password' => bcrypt('456')
            ],
            [   'id_area' => 3,
                'user_name' => 'pepe',
                'password' => bcrypt('789')
            ],
            [   'id_area' => 4,
                'user_name' => 'jose',
                'password' => bcrypt('147')
            ],
            [   'id_area' => 5,
                'user_name' => 'ana',
                'password' => bcrypt('258')
            ],
            [   'id_area' => 6,
                'user_name' => 'jorge',
                'password' => bcrypt('111')
            ]

        ];

        $habitaciones = [
            [   'user_name' => 'erick',
                'password'=> bcrypt('erick'),
                'nro_puerta' => 'A1',
                'ubicacion' => 'plantabaja'
            ],
            [   'user_name' => 'duglas',
                'password'=> bcrypt('duglas'),
                'nro_puerta' => 'A2',
                'ubicacion' => 'plantamedia'
            ],
            [   'user_name' => 'jhos',
                'password'=> bcrypt('jhos'),
                'nro_puerta' => 'A3',
                'ubicacion' => 'plantaAlta'
            ],
            [   'user_name' => 'sidney',
                'password'=> bcrypt('sidney'),
                'nro_puerta' => 'A4',
                'ubicacion' => 'plantabaja'
            ],
        ];

        $tipos_comidas = [
            [   'nombre_tipo' => 'entrada'
            ],
            [   'nombre_tipo' => 'segundo'
            ],
            [   'nombre_tipo' => 'sopa'
            ],
            [   'nombre_tipo' => 'postre'
            ],
            [   'nombre_tipo' => 'jugo'
            ]
        ];

        $horarios_alimenticios = [
            ['nombre_horario' => 'desayuno'
            ],
            ['nombre_horario' => 'almuerzo'
            ],
            ['nombre_horario' => 'cena'
            ],
            ['nombre_horario' => 'extra_horario'
            ],
        ];

        $menu_comidas = [
            [   'id_tipo_comida' => 2,
                'nombre_comida' => 'Milanesa napolitana',
                'descripcion' => 'milanesa con limon y arroz',
                'dir_img' => '/imagenes/comidas/milanesa.jpg'
            ],
            [   'id_tipo_comida' => 2,
                'nombre_comida' => 'Pescado ligth',
                'descripcion' => 'Pesacado con ensalada',
                'dir_img' => '/imagenes/comidas/pescado.jpg'
            ],
            [   'id_tipo_comida' => 2,
                'nombre_comida' => 'Espagueti',
                'descripcion' => 'fideo italiano con carne salteada y salsa de tomate',
                'dir_img' => '/imagenes/comidas/espagueti.jpg'
            ],
            [   'id_tipo_comida' => 2,
                'nombre_comida' => 'Sopa de champiñones',
                'descripcion' => 'sopa de crema con cebollines y champiñones',
                'dir_img' => '/imagenes/comidas/sopa_champiñones.jpg'
            ],
        ];

        $menu_comidas_horario = [
            [   'id_horario_alimenticio' => 2   ,
                'id_menu_comida' => 1
            ],
            [   'id_horario_alimenticio' => 2   ,
                'id_menu_comida' => 2
            ],
            [   'id_horario_alimenticio' => 2   ,
                'id_menu_comida' => 3
            ],
            [   'id_horario_alimenticio' => 2   ,
                'id_menu_comida' => 4
            ]
        ];


        DB::table('area')->insert($areas);
        DB::table('personal')->insert($personales);
        DB::table('habitacion')->insert($habitaciones);

        DB::table('tipo_comida')->insert($tipos_comidas);
        DB::table('horario_alimenticio')->insert($horarios_alimenticios);
        DB::table('menu_comida')->insert($menu_comidas);
        DB::table('menu_comida_horario')->insert($menu_comidas_horario);
        
        
    }
}

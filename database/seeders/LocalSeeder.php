<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Local;

class LocalSeeder extends Seeder
{
    public function run(): void
    {
        $locals = [
            [
                'nombre' => 'Tamales y Lechona Doña Mariela',
                'categoria' => 'comida_tipica',
                'especialidades' => 'Tamales y lechona tolimense',
                'ubicacion' => 'Cra 3 N° 4-57, Barrio La Floresta, Chicoral',
                'contacto' => '317 5759218 / 311 2892741'
            ],
            [
                'nombre' => 'Restaurante Don Antonio',
                'categoria' => 'comida_tipica',
                'especialidades' => 'Platos tradicionales tolimenses',
                'ubicacion' => 'Carrera 12 N° 11-44, Barrio Caballero y Góngora',
                'contacto' => '2484013 / 314 2336141'
            ],
            [
                'nombre' => 'La Morra Fonda Restaurante Bar',
                'categoria' => 'comida_tipica',
                'especialidades' => 'Comida típica y ambiente familiar',
                'ubicacion' => 'Mz K Casa 15, Barrio Recreo, frente al cementerio Jardines del Rosario',
                'contacto' => '311 2286621'
            ],
            [
                'nombre' => 'Alitas Presitas y Algo Más',
                'categoria' => 'comida_rapida',
                'especialidades' => 'Alitas de pollo y comidas rápidas',
                'ubicacion' => 'Calle 4 N° 6-48, diagonal a urgencias del hospital',
                'contacto' => '312 4150653'
            ],
            [
                'nombre' => 'Dorilok’s',
                'categoria' => 'comida_rapida',
                'especialidades' => 'Snacks y comidas rápidas',
                'ubicacion' => 'Calle 13 con Carrera 5, Local 4',
                'contacto' => '320 3717191'
            ],
            [
                'nombre' => 'La Esquina del Mati La Trece Espinal',
                'categoria' => 'comida_rapida',
                'especialidades' => 'Comidas rápidas y snacks',
                'ubicacion' => 'Manzana S Casa 13, Carrera 9',
                'contacto' => '314 2985857'
            ],
            [
                'nombre' => 'Amapola Espinal',
                'categoria' => 'comida_saludable',
                'especialidades' => 'Opciones saludables y platos fusión',
                'ubicacion' => 'Manzana 7 Casa 8, Iguaima',
                'contacto' => '310 2531489'
            ],
            [
                'nombre' => 'Mandarina y Limón',
                'categoria' => 'comida_saludable',
                'especialidades' => 'Comida saludable y opciones vegetarianas',
                'ubicacion' => 'Cra. 7 N° 11-04',
                'contacto' => '311 4631233'
            ],
            [
                'nombre' => 'Arroz Paisa El Original',
                'categoria' => 'arroz_especial',
                'especialidades' => 'Arroz paisa, costillas de cerdo y chuleta',
                'ubicacion' => 'Cra 7 N° 11-24, centro de El Espinal',
                'contacto' => '320 8132224'
            ],
        ];

        foreach ($locals as $local) {
            Local::create($local);
        }
    }
}

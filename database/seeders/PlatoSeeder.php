<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Local;

class PlatoSeeder extends Seeder
{
    public function run(): void
    {
        $datos = [
            'Tamales y Lechona Doña Mariela' => [
                ['nombre' => 'Tamal tolimense', 'precio' => 4500],
                ['nombre' => 'Tamal con lechona', 'precio' => 7500],
                ['nombre' => 'Lechona (porción de 240g a 1.5kg)', 'precio' => 22000],
            ],
            'Restaurante Don Antonio' => [
                ['nombre' => 'Tamal tolimense', 'precio' => 5000],
                ['nombre' => 'Arroz atollado', 'precio' => 10000],
                ['nombre' => 'Lechona (porción)', 'precio' => 12000],
                ['nombre' => 'Chuleta de cerdo', 'precio' => 12000],
                ['nombre' => 'Costillas de cerdo', 'precio' => 13000],
                ['nombre' => 'Sancocho de gallina', 'precio' => 12000],
            ],
            'La Morra Fonda Restaurante Bar' => [
                ['nombre' => 'Tamal tolimense', 'precio' => 5000],
                ['nombre' => 'Lechona (porción)', 'precio' => 12000],
                ['nombre' => 'Arroz atollado', 'precio' => 10000],
                ['nombre' => 'Chuleta de cerdo', 'precio' => 12000],
                ['nombre' => 'Costillas de cerdo', 'precio' => 13000],
                ['nombre' => 'Sancocho de gallina', 'precio' => 12000],
                ['nombre' => 'Bebidas alcohólicas', 'precio' => 12000],
                ['nombre' => 'Bebidas no alcohólicas', 'precio' => 6000],
            ],
            'Alitas Presitas y Algo Más' => [
                ['nombre' => 'Alitas de pollo (6 unidades)', 'precio' => 15000],
                ['nombre' => 'Hamburguesa sencilla', 'precio' => 10000],
                ['nombre' => 'Papas fritas', 'precio' => 6000],
                ['nombre' => 'Perro caliente', 'precio' => 7000],
                ['nombre' => 'Bebidas gaseosas', 'precio' => 3000],
            ],
            'Dorilok’s' => [
                ['nombre' => 'Nachos con queso y toppings', 'precio' => 12000],
                ['nombre' => 'Papitas fritas con salsas', 'precio' => 7000],
                ['nombre' => 'Perro caliente', 'precio' => 7000],
                ['nombre' => 'Hamburguesa', 'precio' => 10000],
                ['nombre' => 'Bebidas gaseosas', 'precio' => 3000],
            ],
            'La Esquina del Mati La Trece Espinal' => [
                ['nombre' => 'Hamburguesa', 'precio' => 10000],
                ['nombre' => 'Perro caliente', 'precio' => 7000],
                ['nombre' => 'Papas fritas con salsas', 'precio' => 7000],
                ['nombre' => 'Alitas de pollo (6 unidades)', 'precio' => 15000],
                ['nombre' => 'Bebidas gaseosas', 'precio' => 3000],
            ],
            'Amapola Espinal' => [
                ['nombre' => 'Ensaladas frescas', 'precio' => 12000],
                ['nombre' => 'Bowl de frutas y granola', 'precio' => 10000],
                ['nombre' => 'Jugos naturales', 'precio' => 6000],
                ['nombre' => 'Smoothies', 'precio' => 8000],
                ['nombre' => 'Postres saludables', 'precio' => 7000],
            ],
            'Mandarina y Limón' => [
                ['nombre' => 'Ceviche mixto de tilapia y camarón', 'precio' => 15000],
                ['nombre' => 'Trucha al ajillo', 'precio' => 18000],
                ['nombre' => 'Cazuela de mariscos', 'precio' => 20000],
                ['nombre' => 'Ensaladas variadas', 'precio' => 12000],
                ['nombre' => 'Jugos naturales y bebidas frías', 'precio' => 6000],
            ],
            // Aquí agrego el nuevo local con su menú completo:
            'Arroz Paisa El Original' => [
                ['nombre' => 'Arroz paisa (pollo, costilla ahumada, chicharrón, plátano maduro y maíz tierno)', 'precio' => 23600],
                ['nombre' => 'Arroz premium (pollo, costilla ahumada, chicharrón, chorizo de ternera, plátano maduro y maíz tierno)', 'precio' => 33500],
                ['nombre' => 'Arroz mixto (pollo, camarón y verduras)', 'precio' => 26300],
                ['nombre' => 'Arroz ranchero (pollo, costilla ahumada, chorizo de ternera y maíz tierno)', 'precio' => 26300],
                ['nombre' => 'Cazuela de frijoles con chicharrón', 'precio' => 28900],
                ['nombre' => 'Costillas BBQ (5 unidades)', 'precio' => 21500],
                ['nombre' => 'Alitas de pollo (5 unidades)', 'precio' => 21500],
                ['nombre' => 'Chuleta de cerdo (1 unidad)', 'precio' => 16900],
                ['nombre' => 'Chuleta de pollo (1 unidad)', 'precio' => 16900],
                ['nombre' => 'Papas a la francesa (300g)', 'precio' => 9900],
                ['nombre' => 'Bebidas gaseosas y jugos (varios tamaños)', 'precio' => 12000],
            ],
        ];

        foreach ($datos as $nombreLocal => $platos) {
            $local = Local::where('nombre', $nombreLocal)->first();
            if ($local) {
                $local->platos()->createMany($platos);
            }
        }
    }
}

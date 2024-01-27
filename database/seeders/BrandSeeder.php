<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Samsung',
                'logo' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',
                'description' => 'Samsung Brand'
            ],
            [
                'name' => 'Apple',
                'description' => 'Apple Brand',
                'logo' => 'https://dummyimage.com/200x300/000/fff&text=Iphone'
            ],
            [
                'name' => 'Google',
                'description' => 'Google Pixel Brand',
                'logo' => 'https://dummyimage.com/200x300/000/fff&text=Google'
            ],
            [
                'name' => 'LG',
                'description' => 'LG Brand',
                'logo' => 'https://dummyimage.com/200x300/000/fff&text=LG'
            ]
        ];
  
        foreach ($brands as $key => $value) {
            Brand::create($value);
        }
    }
}

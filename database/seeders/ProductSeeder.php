<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Tas Ransel Anti Air',
                'description' => 'Tas ransel multifungsi untuk aktivitas sehari-hari',
                'price' => 250000, 
                'stock' => 100, 
                'image' => 'https://th.bing.com/th/id/OIP.3d0MTmmVgl4Jy59eAeLQ-wHaHa?w=159&h=180&c=7&r=0&o=7&pid=1.7&rm=3', 
                'product_category_id' => 1
            ],
            [
                'name' => 'Kursi Gaming Ergonomis',
                'description' => 'Kursi gaming dengan desain ergonomis untuk kenyamanan maksimal',
                'price' => 1200000, 
                'stock' => 50, 
                'image' => 'https://images.unsplash.com/photo-1628358011851-c85d8fa59557?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGdhbWluZyUyMGNoYWlyfGVufDB8fDB8fHww', 
                'product_category_id' => 2
            ],
            [
                'name' => 'Jam Tangan Pintar', 
                'description' => 'Jam tangan pintar dengan berbagai fitur kesehatan dan kebugaran', 'price' => 800000, 
                'stock' => 200, 
                'image' => 'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c21hcnR3YXRjaHxlbnwwfHwwfHx8MA%3D%3D', 
                'product_category_id' => 3
            ],
            [
                'name' => 'Headphone Noise Cancelling', 
                'description' => 'Headphone dengan teknologi noise cancelling untuk pengalaman audio terbaik', 
                'price' => 1500000, 
                'stock' => 75, 
                'image' => 'https://th.bing.com/th/id/OIP.eIVzcCr4lBSt2blBSutm4wHaHa?w=176&h=180&c=7&r=0&o=7&pid=1.7&rm=3', 
                'product_category_id' => 4
            ],
        ]);
    }
}

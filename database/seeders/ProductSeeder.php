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
            [
                'name' => 'Kacamata Trendy',
                'description' => 'Kacamata trendy dengan desain modern dan kualitas premium',
                'price' => 600000, 
                'stock' => 150, 
                'image' => 'https://plus.unsplash.com/premium_photo-1661301078590-170d62793b56?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGV5ZWdsYXNzfGVufDB8fDB8fHww',
                'product_category_id' => 5
            ],
            [
                'name' => 'Smartphone Terbaru',
                'description' => 'Smartphone dengan spesifikasi tinggi dan kamera canggih',
                'price' => 5000000, 
                'stock' => 300, 
                'image' => 'https://images.unsplash.com/photo-1593642532973-d31b6557fa68?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fHNtYXJ0cGhvbmV8ZW58MHx8MHx8MA%3D%3D', 
                'product_category_id' => 6
            ],
            [
                'name' => 'Laptop Gaming',
                'description' => 'Laptop gaming dengan performa tinggi untuk pengalaman bermain game yang maksimal',
                'price' => 15000000, 
                'stock' => 30, 
                'image' => 'https://images.unsplash.com/photo-1600503011955-6d9e2b4c5d6f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGdhbWluZyUyMGxhcHRvcHxlbnwwfHwwfHx8MA%3D%3D', 
                'product_category_id' => 7
            ],
            [
                'name' => 'Kipas Angin Portable',
                'description' => 'Kipas angin portable yang mudah dibawa ke mana saja',
                'price' => 200000, 
                'stock' => 120,
                'image' => 'https://images.unsplash.com/photo-1593642532973-d',
                'product_category_id' => 8
            ],
            [
                'name' => 'Speaker Bluetooth',
                'description' => 'Speaker Bluetooth dengan suara jernih dan bass yang kuat',
                'price' => 700000,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1593642532973-d',
                'product_category_id' => 9
            ],
        
            ]);
    }
}

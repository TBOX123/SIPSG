<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 5; $i++) {
            $data = [
                'nama_customer' => $faker->name,
                'no_customer' => $faker->nik,
                'alamat' => $faker->address,
                'no_telepon' => $faker->phoneNumber,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::createFromTimestamp($faker->unixTime()),
            ];

            // Using Query Builder
            $this->db->table('customer')->insert($data);
        }
    }
}

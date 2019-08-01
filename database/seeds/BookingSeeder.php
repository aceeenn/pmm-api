<?php

use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); //import library faker

        $limit = 20; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('booking')->insert([ //mengisi datadi database
                'lapangan' => $faker->lapangan,
                'alamat' => $faker->alamat, //email unique sehingga tidak ada yang sama
                'tanggal' => $faker->tanggal,
                'jam' => $faker->jam,
                'nohp' => $faker->nohp,
            ]);
        }
        //
    }
}

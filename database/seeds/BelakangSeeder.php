<?php

use Illuminate\Database\Seeder;

class BelakangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "Admin";
        $administrator->name = "BimbelCahaya";
        $administrator->email = "bimbelcahaya@gmail.com";
        $administrator->roles = json_encode(["ADMIN"]);
        // $administrator->roles = 'admin';
        $administrator->password = \Hash::make("BimbelCahay4");
        $administrator->avatar = "tidak-ada-image.png";
        $administrator->address = "Tahunan, Umbulharjo, Yogyakarta";
        $administrator->phone = "0875859909";

        $administrator->save();

        $this->command->info("User Admin berhasil ditambahkan");
    }
}

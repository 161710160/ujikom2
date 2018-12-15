<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // membuat sample admin
        $administrator = new \App\User;
		$administrator->username = "Admin";
		$administrator->name = "Admin";
		$administrator->address = "Bandung,Jawa Barat";
		$administrator->phone = "086909258955";
		$administrator->avatar = "N/A";		
		$administrator->email = "admin@gmail.com";
		$administrator->roles = json_encode(["ADMIN"]);
		$administrator->password = \Hash::make("admin");
		
		$administrator->save();

		$this->command->info("User Admin berhasil diinsert");

        // membuat sample member
        $sample = new \App\User;
		$sample->username = "Member";
		$sample->name = "Member";
		$sample->address = "Bandung,Jawa Barat";
		$sample->phone = "086909258955";
		$sample->avatar = "N/A";		
		$sample->email = "member@gmail.com";
		$sample->roles = json_encode(["MEMBER"]);
		$sample->password = \Hash::make("rahasia");
		
		$sample->save();

		$this->command->info("User Member berhasil diinsert");
    }
}

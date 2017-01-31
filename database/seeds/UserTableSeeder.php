<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    			'name'   => 'Website Admin',
    			'job'	 => 'Web Content Manager',
    			'email'      => 'root@localhost',
    			'password'   => Hash::make('play25gros'),
    			'admin'		=> 1,
    			'created_at' => new DateTime(),
    			'updated_at' => new DateTime()
    	]);
    }
}

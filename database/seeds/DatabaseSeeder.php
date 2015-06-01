<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('ArticlesTableSeeder');

    }

}

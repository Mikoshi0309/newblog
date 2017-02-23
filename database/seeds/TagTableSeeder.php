<?php

use Illuminate\Database\Seeder;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=50;$i++){
            DB::table('tags')->insert([
                'name'=>str_random(10),
                'created_at'=>date('Y-m-d H:i:m',time()),
                'updated_at'=>date('Y-m-d H:i:m',time()),
            ]);
        }

        //factory('\App\Http\Model\Tag',50)->create();
    }
}

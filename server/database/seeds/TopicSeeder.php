<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->truncateTopics();
        $faker = Faker::create();

        foreach (range(1, 50) as $i) {
            DB::table('topics')->insert([
                [
                    'title' => $faker->name,
                    'publish_flg' => 0,
                    'subject_id' => Str::random([1, 2, 3, 4, 5, 6])
                ]
            ]);
        }
    }


    public function truncateTopics()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('m_topics')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
 
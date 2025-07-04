<?php

namespace Database\Seeders;
use App\Models\Job;
use App\Models\Tag;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_of_tags = [
            'Frontend',
            'Backend',
            'API',
            'Product Manager',
            'Tester',
            'UI/UX',
            'Microservices',
            'Product Designer',
            'DevOps'
        ];

        foreach ($list_of_tags as $tag) {
            Tag::factory()->create([
                'name' => $tag
            ]);
        }

        $tags = Tag::all();
        $shuffledTags = $tags->shuffle();// Randomly shuffle the array
        $slicedTags = $shuffledTags->slice(0, 3);

        Job::factory(20)->hasAttached($slicedTags)->create(new Sequence([
            'featured' => false,
            'schedule' => 'part_time'
        ], [
            'featured' => true,
            'schedule' => 'full_time'
        ]));
    }
}

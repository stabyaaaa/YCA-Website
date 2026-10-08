<?php

namespace Database\Seeders;

use App\Models\CommunityCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommunityCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Update',
            'Achievement',
            'Event',
            'Opportunity',
            'Publication',
            'Training',
            'Job',
            'Story',
            'Announcement',
        ];


        foreach ($categories as $name) {

            CommunityCategory::firstOrCreate(
                [
                    'slug' => Str::slug($name),
                ],
                [
                    'name' => $name,
                    'is_active' => true,
                ]
            );
        }
    }
}
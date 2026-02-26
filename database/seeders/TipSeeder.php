<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tip::create([
            'title' => 'Hi! Welcome to Holiday Tour & Travels',
            'subtitle' => 'Duis pretium gravida nisi, ut pulvinar lorem bibendum eget',
            'description' => 'Aliquam blandit nisl sem. Mauris quis enim purus. Vivamus nec tortor bibendum risus placerat vulputate at gravida ante. Nam sit amet tellus enim. Phasellus consectetur porttitor lobortis. Integer cursus odio at mattis porttitor. In hac habitasse platea dictumst. Nunc sit amet cursus felis. Etiam venenatis auctor metus, et lacinia elit dignissim non. Aenean auctor semper erat porta dictum.

Fusce velit sem, vestibulum ac enim ut, tincidunt pretium augue. Vestibulum purus sapien, porttitor a porta faucibus, hendrerit eget enim.',
            'phone' => '13654 87898',
            'tips' => [
                [
                    'icon' => 'fa fa-address-card-o',
                    'title' => 'Bring copies of your passport',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-flag-o',
                    'title' => 'Register with your embassy',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-money',
                    'title' => 'Always have local cash',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-book',
                    'title' => 'Get guidebooks',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-search',
                    'title' => 'Research events',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-camera-retro',
                    'title' => 'Bring your Camera',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-battery-half',
                    'title' => 'Power bank',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-bicycle',
                    'title' => 'Bicycle',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-building-o',
                    'title' => 'Book your Hotel',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-binoculars',
                    'title' => 'Binoculars for exploration',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-bolt',
                    'title' => 'Stay energized',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ],
                [
                    'icon' => 'fa fa-bullhorn',
                    'title' => 'Stay connected',
                    'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years'
                ]
            ],
            'image' => null
        ]);
    }
}

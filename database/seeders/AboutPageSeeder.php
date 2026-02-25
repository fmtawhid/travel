<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutPage;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutPage::truncate();
        
        AboutPage::create([
            'title' => 'Welcome to Holiday Tour & Travels',
            'subtitle' => 'Your trusted partner for unforgettable journeys around the world',
            'description' => 'At Holiday Tour & Travels, we specialize in creating extraordinary travel experiences tailored to your dreams. With over a decade of experience in the tourism industry, we have curated some of the most memorable adventures across the globe. Whether you seek luxury retreats, adventure expeditions, or cultural immersions, our expert team is dedicated to crafting your perfect getaway.

Our mission is to connect travelers with the world\'s most captivating destinations while ensuring comfort, safety, and exceptional service at every step of your journey.',
            'phone' => '+1-800-TRAVEL-1',
            'image' => null,
            'services' => [
                [
                    'icon' => 'fa fa-flag-o',
                    'title' => 'Travel Booking',
                    'description' => 'Expert travel planning and booking services with exclusive deals on tours and packages worldwide.'
                ],
                [
                    'icon' => 'fa fa-map-o',
                    'title' => 'Hotel Booking',
                    'description' => 'Handpicked accommodations from budget-friendly to luxury hotels across 200+ destinations.'
                ],
                [
                    'icon' => 'fa fa-gamepad',
                    'title' => 'Events Booking',
                    'description' => 'Attend exclusive travel events, concerts, and cultural celebrations with guided experiences.'
                ],
                [
                    'icon' => 'fa fa-umbrella',
                    'title' => 'Sight Seeing',
                    'description' => 'Discover hidden gems and iconic landmarks with our professional tour guides and curated itineraries.'
                ],
                [
                    'icon' => 'fa fa-binoculars',
                    'title' => 'Tour Discount',
                    'description' => 'Enjoy special discounts and early-bird offers on selected tours and travel packages.'
                ],
                [
                    'icon' => 'fa fa-globe',
                    'title' => 'Top Brandings',
                    'description' => 'Partnership with leading travel brands and hospitality providers for premium experiences.'
                ]
            ]
        ]);
    }
}

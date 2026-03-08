<?php

namespace App\View\Composers;

use App\Models\Tour;
use Illuminate\View\View;

class PopularToursComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Get most popular tours by booking count
        $popularTours = Tour::withCount('tourBookings')
            ->orderByDesc('tour_bookings_count')
            ->take(7)
            ->get();

        $view->with('popularTours', $popularTours);
    }
}

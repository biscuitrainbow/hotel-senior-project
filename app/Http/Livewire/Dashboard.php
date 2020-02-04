<?php

namespace App\Http\Livewire;

use App\Booking;
use Livewire\Component;

class Dashboard extends Component
{
    public $nationality = [];
    public $market_segment = [];
    public $room_type = [];
    public $total_revenue = 0;

    public function mount()
    {
        $from = date(request()->from);
        $to = date(request()->to);

        $bookings = collect([]);

        if ($from && $to) {
            $bookings =   Booking::whereBetween('check_in', [$from, $to])->get();
        } else {
            $bookings = Booking::all();
        }


        $this->nationality = $this->to_chart($bookings, 'nationality');
        $this->market_segment = $this->to_chart($bookings, 'market_segment');
        $this->room_type = $this->to_chart($bookings, 'type');
        $this->total_revenue = $bookings->pluck('total_price')->sum();
    }


    public function render()
    {
        return view('livewire.dashboard', [
            'nationality' => $this->nationality,
            'market_segment' => $this->market_segment,
            'room_type' => $this->room_type,
            'total_revenue' => $this->total_revenue,
        ]);
    }

    public function to_chart($bookings, $field)
    {
        $labels = $bookings
            ->pluck($field)
            ->unique()
            ->values();

        $count = $bookings
            ->groupBy($field)
            ->map(function ($item) {
                return $item->count();
            })
            ->values();

        return [
            'labels' => $labels,
            'count' => $count,
        ];
    }
}

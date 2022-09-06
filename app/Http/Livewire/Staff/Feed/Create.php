<?php

namespace App\Http\Livewire\Staff\Feed;

use App\Models\FeedItem;
use Livewire\Component;

class Create extends Component
{
    public $feed_data, $items;
    public $feeded = [];

    protected $rules = [
        'feeded*' => 'nullable'
    ];

    public function saveData()
    {
        $data = $this->validate();
        dd($data);
    }

    public function mount()
    {
        $this->items = FeedItem::all();
    }

    public function render()
    {
        return view('livewire.staff.feed.create');
    }
}

<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['first'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($i)
    {
        unset($this->options[$i]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $poll = Poll::create([
            'title' => $this->title
        ]);

        foreach ($this->options as $optName) {
            $poll->options()->create([
                'name' => $optName
            ]);
        }

        $this->reset(['title', 'options']);
    }

    // public function mount()
    // {
    //
    // }
}

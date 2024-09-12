<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['first'];

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:100'
    ];

    protected $messages = [
        'options.*' => 'The option can\'t be empty',
    ];

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate();

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

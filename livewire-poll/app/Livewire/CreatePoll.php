<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        // $this->validate([
        //     'title' => 'required|string|max:255',
        //     'options' => 'required|array|min:2',
        //     'options.*' => 'required|string|max:255',
        // ]);

        // // Logic to save the poll and its options to the database would go here.

        // session()->flash('message', 'Poll created successfully!');

        // // Reset form fields
        // $this->title = '';
        // $this->options = ['First'];

        $poll = Poll::create(['title' => $this->title]);

        foreach ($this->options as $optionName) {
            $poll->options()->create(['name' => $optionName]);
        }

        $this->reset([ 'title', 'options' ]);
    }
}

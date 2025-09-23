<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1',
        'options.*' => 'required|min:1|max:255',
    ];

    protected $messages = [
        'title.required' => 'The poll title is required.',
        'title.min' => 'The poll title must be at least :min characters.',
        'title.max' => 'The poll title may not be greater than :max characters.',
        'options.required' => 'At least one option is required.',
        'options.*' => "The option can't be empty.",
        'options.*.max' => 'The option may not be greater than :max characters.',
    ];

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate();

        $poll = Poll::create(['title' => $this->title]);

        $poll->options()->createMany(
            collect($this->options)
            ->map(fn($optionName) => ['name' => $optionName])
            ->all()
        );

        $this->reset([ 'title', 'options' ]);

        $this->dispatch('pollCreated');
    }
}

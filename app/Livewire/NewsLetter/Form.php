<?php

namespace App\Livewire\NewsLetter;

use App\Actions\Newsletter\EmailsubscriberAction;
use App\Mail\SubscriberMailaable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Newsletter\Facades\Newsletter;

class Form extends Component
{
    public string $name = '';
    public string $email = '';

    protected $rules = [
        'name'      => ['required'],
        'email'     => ['required', 'email', 'unique:subscribers'],
    ];
    public function formSubmit()
    {

        $this->validate();

        $token = bcrypt($this->email);

        $data = array(
            'name'      => $this->name,
            'email'     => $this->email,
        );


        (new EmailsubscriberAction)([
            'name'  => $this->name,
            'email' => $this->email,
            'token' => $token,
        ]);

        if (!Newsletter::isSubscribed($this->email)) {
            Newsletter::subscribe($this->email, ['NAME' => $this->name, 'TOKEN' => $token]);
        }

        Mail::to($this->email)
            ->bcc('your@email.com', 'Your Name')
            ->send(new SubscriberMailaable($data));

        session()->flash('success', 'You are subscribed!');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.news-letter.form');
    }
}

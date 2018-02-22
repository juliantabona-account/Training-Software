<?php

namespace App\Http\ViewComposers;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class MessageComposer
{
    public $threads = [];
    /**
     * Create a message composer.
     *
     * @return void
     */
    public function __construct()
    {

        $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        $this->threads = $threads;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latestMessage', $this->threads);
    }
}
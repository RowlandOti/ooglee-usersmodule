<?php namespace App\Ooglee\Application\Listeners;


use Illuminate\Database\Eloquent\Model;
use App\Ooglee\Domain\Contracts\IHandler;
use App\Ooglee\Domain\Entities\User

class SendWelcomeMailListener implements IListener {

	/**
	 * SendWelcomeMailListener implementation 
	 * 
	*/

	/**
     * @var Ooglee\Infrastructure\Mailers\IMailer $mailer
    */
    private $mailer

    /**
     * Create a new SendWelcomeEmailListener listener
     *
     * @param Mailer $mailer
     * @return void
    */
    public function __construct(IMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the Event
     *
     * @param Event $event
     * @return void
     */
	public function listenerHandle(IEvent $event)
    {
        $data = [];

        $data['view'] = 'emails.welcome';
        $data['user'] =  $event->user;

        $this->mailer->send($data);
    }
}

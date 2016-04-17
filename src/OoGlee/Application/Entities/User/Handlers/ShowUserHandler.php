<?php namespace Ooglee\Application\Entities\Post\Handlers;

use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Application\Entities\Post\PostLoader;
use Ooglee\Application\Entities\Post\PostContent;
use Ooglee\Application\Entities\Post\PostResponse;
use Ooglee\Domain\CommandBus\ICommand;
use Ooglee\Domain\Events\Dispatcher;

/**
 * Class ShowPostHandler --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowPostHandler implements IHandler {

	/**
	 * ShowPostHandler implementation 
	 * 
	 */

    /**
     * @var Dispatcher $dispatcher
     */
    private $dispatcher;

    /**
     * @var PostLoader $loader
     */
    private $loader;

    /**
     * @var PostContent $content
     */
    private $content;

    /**
     * @var PostResponse $response
     */
    private $response;

     /**
     * Handle the command
     *
     * @param Dispatcher     $dispatcher
     * @param PostLoader     $loader
     * @param PostContent    $content
     * @param PostResponse   $response
     * 
     */
    public function __construct(Dispatcher $dispatcher, PostLoader $loader, PostContent $content, PostResponse $response)
    {
        $this->dispatcher = $dispatcher;
        $this->loader = $loader;
        $this->content = $content;
        $this->response = $response;
    }

	public function handle(ICommand $command)
    {
        $this->show($command);
    }

    protected function show(ICommand $command)
    {   
        $this->loader->load($command->post);
        $this->content->make($command->post);
        $this->response->make($command->post);

        $this->dispatcher->dispatch($command->post->releaseEvents());
    }
}

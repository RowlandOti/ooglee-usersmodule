<?php namespace Ooglee\Application\Entities\User;

use Ooglee\Domain\Entities\User\Contracts\IUser;
use Ooglee\Infrastructure\Presenter\Eloquent\EloquentPresenter;

/**
 * Class UserPresenter --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       rowland\ooglee-blog
 */
class UserPresenter extends EloquentPresenter
{

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The decorated post.
     *
     * @var IUser
     */
    protected $entity;

    /**
     * Create a new UserPresenter instance.
     *
     * @param HtmlBuilder                $html
     * @param SettingRepositoryInterface $settings
     * @param IUser                      $entity
     */
    public function __construct(IUser $entity)
    {
        $this->entity  = $entity;
    }

    /**
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return \Html::link($this->entity->path(), $this->entity->getTitle(), ['target' => '_blank']);
    }
}

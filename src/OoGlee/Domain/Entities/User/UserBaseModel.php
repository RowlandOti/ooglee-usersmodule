<?php namespace Ooglee\Domain\Entities\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Ooglee\Infrastructure\Presenter\PresentableTrait;
use Ooglee\Infrastructure\Presenter\Contracts\IPresentable;
use Ooglee\Application\Entities\User\UserPresenter;
use Ooglee\Domain\Entities\Eloquent\EloquentBaseModel;
use Ooglee\Domain\Entities\User\Commands\GetUserPathCommand;
use Ooglee\Domain\Entities\User\Contracts\IUser;

class UserBaseModel extends EloquentBaseModel implements IUser, IPresentable {

    use PresentableTrait;

	/**
	 * AUserBaseModel to be extended by User Model.
	 * 
	 */

    /**
     * The posts's presenter path.
     *
     * @var string
     */
    protected $presenter = 'Ooglee\Application\Entities\User\UserPresenter';

	/**
     * The posts's content.
     *
     * @var null|string
     */
    protected $content = null;

    /**
     * The post's response.
     *
     * @var null|Response
     */
    protected $response = null;
	
	/**
     * Return the post's path.
     *
     * @return string
     */
    public function path()
    {
        //return $this->dispatch(new GetUserPathCommand($this));

        $data = [
            'year'  => $this->created_at->format('Y'),
            'month' => $this->created_at->format('m'),
            'day'   => $this->created_at->format('d'),
            'slug'  => $this->getSlug()
        ];

        return \URL::route('post.view', $data);
    }

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
        $metaTitle = $this->getMetaTitle();

        if (!$metaTitle) 
        {
            $metaTitle = $this->getTitle();
        }

        return $metaTitle;
    }

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords()
    {
        $metaKeywords = $this->getMetaKeywords();

        if (!$metaKeywords && $type = $this->getType()) {
            $metaKeywords = $type->getMetaKeywords();
        }

        if (!$metaKeywords) {
            $metaKeywords = $this->getTags();
        }

        return $metaKeywords;
    }

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription()
    {
        $metaDescription = $this->getMetaDescription();

        if (!$metaDescription && $type = $this->getType()) {
            $metaDescription = $type->getMetaDescription();
        }

        return $metaDescription;
    }

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the live flag.
     *
     * @return bool
     */
    public function isLive()
    {
        return $this->live;
    }

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the path to the post's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath()
    {
        $type = $this->getType();

        /* @var EditorFieldType $layout */
        $layout = $type->getFieldType('layout');

        return $layout->getViewPath();
    }

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}

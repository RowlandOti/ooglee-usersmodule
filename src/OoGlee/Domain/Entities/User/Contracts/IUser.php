<?php namespace Ooglee\Domain\Entities\User\Contracts;

use Illuminate\Http\Response;

/**
 * Interface IUser
 *
 * @link          http://skyllabler.com/product/ooglee/module/ooglee-blog
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Oogle\UsersModule
 */
interface IUser
{

    /**
     * Return the post's path.
     *
     * @return string
     */
    public function path();

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle();

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords();

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription();

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();
    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the live flag.
     *
     * @return bool
     */
    public function isLive();

    /**
     * Get the path to the post's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath();

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response);
}

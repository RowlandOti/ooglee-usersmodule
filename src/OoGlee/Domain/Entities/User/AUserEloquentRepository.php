<?php namespace Ooglee\Domain\Entities\User;

use Eloquent;
use Ooglee\Domain\Entities\User\Contracts\IUser;
use Ooglee\Domain\Contracts\IBaseRepository;

abstract class AUserEloquentRepository implements IBaseRepository {

	/**
	* The Abstract ABaseRepository provides default implementations of the methods defined
	* in the IBaseRepository interface. These simply delegate static function calls
	* to the right eloquent model based on the $modelClassName.
	*/

	protected $modelClassInstance;

	public function __construct(IUser $modelClassInstance)
	{
		$this->modelClassInstance = $modelClassInstance;
    }

    public function getAll(array $related = null)
    {
        $related = $this->modelClassInstance->all();

        return $related;
    }

	public function findById($id)
	{
		$related = $this->modelClassInstance->where('id', $id)->first();

        return $related;
	}
	public function findBySlug($slug)
	{
		$related = $this->modelClassInstance->orderBy('created_at', 'DESC')->where('slug', $slug)->first();

        return $related;
	}

    /**
     * Get where posts.
     * @param null  $limit
     * @return EntryCollection
     */
	public function getWhere($column, $value, $limit = null)
	{
        $related = $this->modelClassInstance->where($column, '=', $value);

        return $related;
    }

    /**
     * Get recent posts.
     * @param null  $limit
     * @return UserCollection
     */
    public function getRecent($limit = null)
    {
        $related = $this->modelClassInstance->active()->paginate($limit);

        return $related;
    }

    /**
     * Get sticky posts.
     * @param null  $limit
     * @return UserCollection
     */
    public function getSticky($limit = null)
    {
        $related = $this->modelClassInstance->active()->where('is_sticky', true)->paginate($limit);

        return $related;
    }

    public function save(Eloquent $modelClassInstance)
    {
        return $modelClassInstance->save();
    }
}
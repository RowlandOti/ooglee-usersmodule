<?php namespace Ooglee\Framework\Http\Controllers\Application;

use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Application\Entities\User\Services\UserService;

class UsersController extends Controller {
    
    // User service
	private $modelService;

    public function __construct(UserService $modelService)
    {
        $this->modelService = $modelService;
    }

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function getIndex()
    {   
        $response = $this->modelService->getAll();

        //return resources listing view
        return view(\OogleeUConfig::get('config.user_index.index'), compact('response'));
    }

     /**
    * Display the specified resource.
    *
    * @param Event $id
    * @return Response
    */
    public function getShow($id)
    {
        $response = $this->modelService->getBy($id);

        //return resource listing view
        return view(\OogleeUConfig::get('config.user_view.view'), compact('response'));
        
    }
}

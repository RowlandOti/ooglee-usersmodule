<?php namespace Ooglee\Framework\Http\Controllers\Application;

use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Application\Entities\Post\Services\PostService;

class UsersController extends Controller {
    
    // Post service
	private $modelService;

    public function __construct(PostService $modelService)
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
    public function show($id)
    {
        $response = $this->modelService->getBy($id);

        //return resource listing view
        return view(\OogleeUConfig::get('config.user_view.view'), compact('response'));
        
    }
}

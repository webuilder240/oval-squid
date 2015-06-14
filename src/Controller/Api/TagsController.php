<?php
namespace App\Controller;

use App\Controller\API\APiAppController;
use Cake\ORM\TableRegistry;

/**
 * Api/TagsController
 *
 * @property \App\Model\Table\TagsController $Tags
 */
class TagsController extends ApiAppController
{

	public function initialize()
	{
		parent::initialize();
		$this->Tags = TableRegistry::get('Tags');
		$this->Posts = TableRegistry::get('Posts');
		$this->post_id = $this->request->params['post_id'];
	}

	public function index()
	{
	}

	public function view($id)
	{
		$tags = $this->Tags->get($id);
		$this->set([
			'tags' => $tags,
			'_serialize' => ['tags'],
		]);
	}

	public function add()
	{
		$this->set(compact('messages'));
		$this->set('_serialize','messages');
	}

	public function edit($id)
	{
	
	}

	public function delete($id)
	{
	
	}
}

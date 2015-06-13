<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;
use Cake\Event\Event;

class FrontPageController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Posts = TableRegistry::get('Posts');
    }


	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow();
	}


    /**
     * Index Method
     *
     * @return void
     */
    public function index()
    {
        $posts = $this->Posts->find()->where(['publish' => 1]);
        $this->set('posts',$this->paginate($posts));
        $this->set('_serialize', ['posts']);
        $this->set('title','Webuilder240');
    }

    public function view($id)
    {
        $post = $this->Posts->find()
            ->where(['publish' => 1,'id' => $id])
            ->first();

        if (!$post){
            throw new NotFoundException('このページは見つかりませんでした');
        }
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }

    public function archives()
    {

    }

    public function categories()
    {

    }

    public function search()
    {

    }

}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Sq Controller
 * @property \App\Model\Table\PostsTable $Posts
 */
class SqAdminController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Posts = TableRegistry::get('Posts');
        $this->Users = TableRegistry::get('Users');
        $this->layout = 'sq_admin';
    }

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['logout','add']);
	}

	// 暫くの間はプライベートでの仕様のみを考慮して、コメントアウトしています。
	//public function add()
	//{
	//	$user = $this->Users->newEntity();

	//	if ($this->request->is('post')){
	//		$user = $this->Users->patchEntity($user,$this->request->data);
	//		if ($this->Users->save($user)){

	//			$this->Flash->success('ユーザー登録完了しました。ログインして下さい。');

	//			return $this->redirect([
	//				'controller' => 'SqAdmin',
	//				'action' => 'login',
	//			]);
	//		
	//		} else {
	//			$this->Flash->error('保存できませんでした。入力内容を再度確認して下さい。');
	//		}
	//	}

	//	$this->set(compact('user'));
	//}

    public function login()
    {
		if ($this->request->is('post')){
			$user = $this->Auth->identify();
			if ($user){
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('ユーザー名もしくはパスワードが間違っています。');
		}

    }

    public function logout()
    {
		return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
		$posts = $this->Posts->find()->all();
		$this->set(compact('posts'));
		$this->set('_serialize','posts');
    }

    public function edit_post($id)
    {
        $post = $this->Posts->get($id);
		$this->__publish_post($post);
    }

    public function add_post()
    {
		$post = $this->Posts->newEntity();
		$this->__publish_post($post);
    }

	private function __publish_post($post)
	{
		if ($this->request->is(['post','put','patch'])) {
			$post = $this->Posts->patchEntity($post,$this->request->data);
            if (isset($this->request->data['publish'])){
                $post->publish = 1;
                $flash_text = '投稿を公開しました';
            } else {
                $post->publish = 0;
                $flash_text = '投稿を下書き保存しました';
            }
			if ($this->Posts->save($post)){
				$this->Flash->success(__($flash_text));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('投稿を保存できませんでした。投稿内容を確認して下さい。'));
			}
		}
		$img = TableRegistry::get('Imgs');
        $this->set(compact('post','img'));
        $this->set('_serialize', ['post']);
	}

}

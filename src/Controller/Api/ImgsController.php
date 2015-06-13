<?php

namespace App\Controller;

use App\Controller\API\APiAppController;
use Cake\ORM\TableRegistry;
use App\Service\ImgService;

class ImgsController extends ApiAppController
{
	const POSTIMAGE_DIR = ROOT. DS .'webroot/upload_images/';
	public function initialize()
	{
		parent::initialize();
	}

	public function index()
	{
		$imgs = $this->Imgs->find()->all();
		$this->set([
			'imgs' => $imgs,
			'_serialize' => ['imgs']
		]);
	}

	public function view($id)
	{
		$img = $this->Imgs->get($id);
		$this->set([
			'img' => $img,
			'_serialize' => ['img']
		]);
	}

	public function add()
	{

		$ImgService = new ImgService();
		$mimetype = $ImgService->returnMimeType($this->request->data['img']['type']);
		$name = $ImgService->returnUniqueId() . $mimetype;

		$img = $this->Imgs->newEntity();
		$img->name = $name;
		$img->size = $this->request->data['img']['size'];

		if($this->Imgs->save($img)){
			$result = 'Saved';
			move_uploaded_file($this->request->data['img']['tmp_name'], self::POSTIMAGE_DIR. $name);
			$url =  'http://localhost:8765/upload_images/'.$name;
			$message = [
				'result' => $result,
				'url' =>  $url
			];
		} else {
			$result = 'Error';
			$message = [
				'result' => $result,
			];
		}

        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
	}

	public function edit($id)
	{
	
	}

	public function delete($id)
	{
		$img = $this->Imgs->get($id);
		//画像の削除
		unlink(self::POSTIMAGE_DIR . $img->name);
		if ($this->Imgs->delete($img)){
			$message = 'Deleted';	
		} else {
			$message = 'Error';
		}

		$this->set([
			'message' => $message,
			'_serialize' => ['message']
		]);
	}

}

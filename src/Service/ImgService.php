<?php

namespace App\Service;

class ImgService 
{
	
	public function returnMimeType($filetype)
	{

		$type = [
			'image/png' => '.png',
			'image/jpeg' => '.jpg',
			'image/jpg' => '.jpg',
			'image/gif' => '.gif',
		];

		return $type[$filetype];
	}

	public function returnUniqueId()
	{
		return uniqid(rand());
	}

}

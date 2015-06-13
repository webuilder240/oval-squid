<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Img Entity.
 */
class Img extends Entity
{

	const POSTIMAGE_DIR = ROOT. DS .'webroot/upload_images/';

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'size' => true,
        'original_width' => true,
        'original_height' => true,
    ];

}

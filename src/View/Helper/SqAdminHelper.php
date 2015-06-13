<?php

namespace App\View\Helper;

use Cake\View\Helper;

class SqAdminHelper extends Helper
{
    public function statusLabel($post)
    {
        if ($post->publish) {
            return '<span class="label label-success">公開中</span>';
        }
        return '<span class="label label-default">非公開</span>';
    }
}
<?php $this->assign('title','Webuilder240');?>
<?php foreach ($posts as $post) :?>
	<div class="front__index__list__article">
		<h2 class="main-color">
			<?= $this->Html->link($post->title,[
				'controller' => 'FrontPage',
				'action' => 'view',
				'id' => $post->id,
			]);?>
		</h2>
		<h4 class="front__index__list__article__date text-right">
			<?= $post->created->format('Y/m/d');?>
		</h4>
	</div>
<?php endforeach ;?>
<hr/>
<ul class="pagination clearfix">
    <?= $this->Paginator->prev('< ' . __('previous')) ?>
    <?= $this->Paginator->next(__('next') . ' >') ?>
</ul>


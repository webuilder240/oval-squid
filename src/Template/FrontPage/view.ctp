
<div class="col-md-12">
	<h1 class="main-color">
		<?= h($post->title);?>
	</h1>
	<hr>
	<h4 class="text-right"><?= $post->created->format('Y/m/d');?></h4>
	<div class="well">
		<div class="entry-content">
			<?= $this->Markdown->transform($post->content);?>
		</div>
	</div>
</div>


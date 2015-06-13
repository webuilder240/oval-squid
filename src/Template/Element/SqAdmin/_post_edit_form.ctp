<div class="sq-admin__edit_post__form__main col-xs-18 col-md-9 clearfix">

<?= $this->Form->create($post);?>

<?= 
	$this->Form->input('title',[
		'label' => 'ブログのタイトル'
	]);
?>

<?= 
	$this->Form->input('content',[
		'type' => 'textarea',
		'rows' => 10,
		'label' => 'ブログ本文',
		'class' => 'sq-admin__edit_post__form__main__content',
	]);
?> 

<p class="sq-admin__edit_post__form__main__char_nums text-right">
	1000文字
</p>

<hr>

<div class="sq-admin__edit_post__form__button clearfix">

	<div class="pull-left">
		<?=
			$this->Form->button('削除する',[
				'class' => 'sq-admin__edit_post__form__button__delete_button btn btn-danger pull-left'
			]);
		?>
		<?=
			$this->Form->button('下書き保存',[
				'class' => 'btn btn-default pull-left',
                'name' => 'draft',
			]);
		?>
	</div>

	<div class="pull-right">
		<?=
			$this->Form->submit('公開する',[
				'class' => 'btn btn-success',
                'name' => 'publish',
            ]);
		?>
	</div>

</div>

<?= $this->Form->end();?>

</div>


<div class="sq-admin__edit_post__form__sub_area col-cs-6 col-md-3">

	<div class="sq-admin__edit_post__form__sub_area__imgs">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">画像</h3>
			</div>
			<div class="panel-body">
				<button class="btn btn-default btn-block sq-admin__edit_post__form__sub_area__image_insert__button--js">画像を記事に挿入</button>
				<button class="btn btn-default btn-block sq-admin__edit_post__form__sub_area__image_upload__button--js">画像をアップロード</button>
			</div>
		</div>
	</div>

	<div class="sq-admin__edit_post__form__sub_area__tag_area">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title sq-admin__edit_post__form__tag_area__panel_title">タグ</h3>
			</div>
			<div class="panel-body clearfix">
				<div class="well">
					<span class="sq-admin__edit_post__form__tag_area__tag label label-info">php x</span>
					<span class="sq-admin__edit_post__form__tag_area__tag label label-info">Spna x</span>
					<span class="sq-admin__edit_post__form__tag_area__tag label label-info">頭文字D x</span>
				</div>
				<input class="form-control" type="text" name="">
				<button class="btn btn-default pull-right sq-admin__edit_post__form__tag_area__submit">追加</button>
			</div>
		</div>
	</div>
</div>
<?= $this->element('SqAdmin/Modal/_img_upload_modal');?>
<?= $this->element('SqAdmin/Modal/_img_lists_modal');?>

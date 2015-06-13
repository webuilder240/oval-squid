<div class="container theme-showcase clearfix" role="main">
	<h2>
		投稿一覧
		<a href="<?= $this->Url->build([
            'controller' => 'SqAdmin',
            'action' => 'add_post'
        ]);?>" class="sq-admin__post_list__title__link__new_post btn btn-default">新規投稿</a>
	</h2> 
	<hr>
	<table class="table table-striped">
		<tr>
			<th class="sq-admin__post_list__table__header__checkbox_area">
				<input type="checkbox" name="">
			</th>
			<th class="sq-admin__post_list__table__header__title_area">タイトル</th>
			<th>ステータス</th>
			<th>更新日付</th>
		</tr>

		<?php foreach($posts as $post)  :?>
		<tr>
			<td class="sq-admin__post_list__table__content__checkbox_area">
				<input type="checkbox" name="">
			</td>
			<td class="sq-admin__post_list__table__content__title_area">
				<a href="<?= $this->Url->build([
						'controller' => 'SqAdmin',
						'action' => 'edit_post',
						'id' => $post->id
						]);?>"><?= h($post->title); ?></a>
			</td>
			<td class="sq-admin__post_list__table__content__status_area">
                <?= $this->SqAdmin->statusLabel($post);?>
			</td>
			<td class="sq-admin__post_list__table__content__date_area">
				<?= $post->modified->format('Y/m/d H:i:s') ;?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

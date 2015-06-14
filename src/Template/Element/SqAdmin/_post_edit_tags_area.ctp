<div class="sq-admin__edit_post__form__sub_area__tag_area">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title sq-admin__edit_post__form__tag_area__panel_title">タグ</h3>
		</div>
		<div class="panel-body clearfix">
			<div class="well">
				<span v-repeat="Tag: Tags" class="sq-admin__edit_post__form__tag_area__tag label label-info">
					{{Tag.name}}
				</span>
			</div>
			<input class="form-control" type="text" name="">
			<button class="btn btn-default pull-right sq-admin__edit_post__form__tag_area__submit">追加</button>
		</div>
	</div>
</div>

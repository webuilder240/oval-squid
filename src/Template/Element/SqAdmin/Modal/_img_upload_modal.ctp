<div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="imageUploadModal" aria-hidden="true" data-show="true" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">画像をアップロードする</h4>
			</div>
			<div class="modal-body">
				<?= 
					$this->Form->create(null,[
						'type' => 'file',
						'dafault' => false,
						'id' => 'UploadImgForm',
					]); 
				?>
				<?= 
					$this->Form->input('img',[
						'type' => 'file',
						'label' => false,
					]);
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
				<button type="button" class="btn btn-success sq-admin__edit_post__form__image__submit--js">アップロード</button>
				<?= $this->Form->end();?>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

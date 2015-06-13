<div class="login_form well clearfix">
    <div class="login_form_main_img">
        <img class="img-circle text-center" src="https://graph.facebook.com/webuilder240/picture?width=125&amp;height=125" alt="">
    </div>
    <h2 class="text-center">
        Oval Squid
    </h2>
    <?= $this->Form->create();?>
        <?=
            $this->Form->input('name',[
                'label' => 'ユーザー名',
                'placeholder' => 'ユーザー名'
            ]);
        ?>
        <?=
            $this->Form->input('password',[
                'label' => 'パスワード',
                'placeholder' => 'パスワード'
            ]);
        ?>
        <?=
            $this->Form->submit('ログイン',[
                'class' => 'btn btn-success btn-lg btn-block',
            ]);
        ?>
    <?= $this->Form->end();?>
</div>

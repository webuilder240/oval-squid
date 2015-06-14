
<?php

use Cake\Core\Configure;

/**
 * Default `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

/**
 * Default `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

/**
 * Default `footer` block.
 */
if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    printf('&copy;%s %s', date('Y'), Configure::read('App.title'));
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('tb_body_attrs', ' class="' . implode(' ', array($this->request->controller, $this->request->action)) . '" ');
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, array('name' => 'author', 'content' => Configure::read('App.author'))));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon')));

/**
 * Prepend `css` block with TwitterBootstrap and Bootflat stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
HTML;
$this->prepend('css', $this->Html->css(['//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css']));
$this->append('css', $html5Shim);


$this->prepend('script', $this->Html->script([
		'vendor/jquery/dist/jquery.min.js',
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js',
		'vendor/vue/dist/vue.min.js',
		'SqAdmin/app',
		'SqAdmin/edit_vue'])
	); 

?>
<!DOCTYPE html>

<?= $this->fetch('html') ?>

    <head>
        <?= $this->Html->charset() ?>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
		<?= $this->Html->css('squid-admin')?>
    </head>

    <?php
		echo $this->fetch('tb_body_start');
		echo $this->fetch('tb_flash');
	?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="
					<?= $this->Url->build([
						'controller' => 'SqAdmin',
						'action' => 'index',
						]);?>">Oval Squid</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
					<li>
                        <?= $this->Html->link('投稿一覧',
                                ['controller' => 'SqAdmin', 'action' => 'index']
                            );
                        ?>
                    </li>
					<li>
                        <?= $this->Html->link('投稿追加',['controller' => 'SqAdmin', 'action' => 'add_post']); ?>
                    </li>
					<li>
                        <a href="#">設定</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                       <?= $this->Html->link('ログアウト',['controller' => 'SqAdmin', 'action' => 'logout']); ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<?php
		echo $this->fetch('content');
		echo $this->fetch('tb_footer');
		echo $this->fetch('script');
		echo $this->fetch('tb_body_end');
    ?>

</html>

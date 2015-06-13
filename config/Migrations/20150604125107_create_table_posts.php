<?php
use Phinx\Migration\AbstractMigration;

class CreateTablePosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');
		$table->addColumn('publish','boolean',['default' => 0])
              ->addColumn('title','string')
              ->addColumn('content','text')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime');
        $table->create();
    }
}

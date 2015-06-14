<?php
use Phinx\Migration\AbstractMigration;

class CreatePostsTags extends AbstractMigration
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
        $table = $this->table('posts_tags');
		$table->addColumn('post_id','integer',['null' => false])
		     ->addColumn('tag_id','integer',['null' => false])
			 ->addColumn('created','datetime')
			 ->addColumn('modified','datetime');
        $table->create();
    }
}

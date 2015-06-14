<?php
use Phinx\Migration\AbstractMigration;

class CreateTags extends AbstractMigration
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
        $table = $this->table('tags');
		$table->addColumn('name','string')
			  ->addColumn('created','datetime')
			  ->addColumn('modified','datetime');
        $table->create();
    }
}

<?php
use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('users');
		$table->addColumn('name','string')
			  ->addColumn('password','string')
			  ->addColumn('nick_name','string')
			  ->addColumn('created','datetime')
			  ->addColumn('modified','datetime');
        $table->create();
    }
}

<?php
use Phinx\Migration\AbstractMigration;

class CreateImgs extends AbstractMigration
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
        $table = $this->table('imgs');
		$table->addColumn('name','string')
			->addColumn('size','integer',['null' => true, 'default' => null])
		    ->addColumn('original_width','integer',['null' => true, 'default' => null])
		    ->addColumn('original_height','integer',['null' => true, 'default' => null])
			->addColumn('created','datetime')
		    ->addColumn('modified','datetime');
        $table->create();
    }
}

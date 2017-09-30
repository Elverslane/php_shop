<?php
use Phinx\Migration\AbstractMigration;

class MyNewMigration extends AbstractMigration

{
    public function up()
    {
        $products = $this -> table ('products');
        $products -> addColumn ('id', 'int')
            -> addColumn ('name', 'string')
            -> addColumn ('description',  'string')
            -> addColumn ('image', 'image')
            -> addColumn ('price', 'decimal(10,2)')
            -> addColumn ('date_create','timestamp')
            -> addColumn ('date_update', 'timestamp' )
            -> addColumn ('deleted', 'boolean')
            -> save();

        $orders = $this -> table ('orders');
        $orders -> addColumn ('id', 'int')
            -> addColumn ('user_id', 'integer')
            -> addColumn ('date_create','timestamp')
            -> addColumn ('date_update', 'timestamp')
            -> addColumn ('sum', 'decimal(10,2)')
            -> addColumn ('address', 'varying(100)')
            -> addColumn ('payment_status', 'int')
            -> save();

        $order_products = $this -> table ('order_products', array('id' => false, 'primary_key' => array ('order_id', 'product_id')));
        $order_products -> addColumn ('id', 'int')
            -> addColumn ('order_id', 'int')
            -> addColumn ('product_id', 'int')
            -> addColumn ('price', 'decimal')
            -> save();

        $users = $this -> table ('users');
        $users -> addColumn ('id', 'int')
            -> addColumn ('name', 'string')
            -> addColumn ('login',  'string')
            -> addColumn ('salt', 'varying(50)')
            -> addColumn ('hash', 'varying(50)')
            -> addColumn ('date_create','timestamp')
            -> addColumn ('date_update', 'timestamp' )
            -> addColumn ('deleted', 'boolean')
            -> save();
    }

}
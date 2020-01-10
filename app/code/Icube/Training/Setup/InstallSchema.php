<?php

namespace Icube\Training\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('table_training'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Identity Id'
            )
            ->addColumn('nik', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [], 'Identity Number')
            ->addColumn('name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 50, [], 'Name of the person')
            ->setComment('Put the table description here');
        
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
<?php

namespace Icube\Training\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // $installer = $setup;

        // $installer->startSetup();

        if (version_compare($context->getversion(), '1.0.5', '<')){
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
        }
        
        // $installer->getConnection()->createTable($table);

        // $installer->endSetup();
    }
}
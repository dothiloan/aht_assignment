<?php

namespace MGS\Book\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /**
         * Create table 'pfay_contacts'
         */

        if (!$setup->getConnection()->isTableExists($setup->getTable('mgs_book'))) {
            $table = $setup->getConnection()
                ->newTable($setup->getTable('mgs_book'))
                ->addColumn(
                    'book_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Book ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'author',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    ['nullable' => false],
                    'Author'
                )
                ->addColumn(
                    'publishing_company',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    ['nullable' => false],
                    'Publishing Company'
                )
                ->addColumn(
                    'publishing_year',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    100,
                    ['nullable' => false],
                    'Publishing Year'
                )
                ->addColumn(
                    'total',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    100,
                    ['nullable' => false],
                    'Total'
                )
                ->addColumn(
                    'status',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    ['nullable' => false],
                    'Status'
                )
                ->setComment('Book Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}
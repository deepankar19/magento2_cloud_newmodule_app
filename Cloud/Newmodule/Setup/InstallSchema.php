<?php
namespace Cloud\Newmodule\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table; 
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context) 
    {
        $setup->startSetup();
        //$setup->getConnection()->dropTable($setup->getTable('data_example');
        $conn = $setup->getConnection();
 
        $tableName = $setup->getTable('data_example');
        
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id',
                                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                                null,
                                ['identity'=> true, 'unsigned'=> true, 'nullable'=> false, 'primary'=> true]
                            )
                            ->addColumn(
                                'dob',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'','LENGTH' =>255]
                                )
                                ->addColumn(
                                    'bloodgrp',
                                    Table::TYPE_TEXT,
                                    255,
                                    ['nullable'=>false,'default'=>'','LENGTH' =>255]
                                    )
                                    ->addColumn(
                                        'fathersname',
                                        Table::TYPE_TEXT,
                                        255,
                                        ['nullable'=>false,'default'=>'','LENGTH' =>255]
                                        )
                                        ->addColumn(
                                            'mothersname',
                                            Table::TYPE_TEXT,
                                            255,
                                            ['nullable'=>false,'default'=>'','LENGTH' =>255]
                                            )
                            ->addColumn(
                                'country',
                                Table::TYPE_TEXT,
                                '2M',
                                ['nullbale'=>false,'default'=>'','LENGTH' =>255]
                                )
                            ->addColumn(
                                'dob',
                                \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                                null,
                                ['nullable'=> false],
                                'Date of Birth'
                            )
                            ->addColumn(
                                'created_at',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                                null,
                                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                                'Created At'
                            )->addColumn(
                                'updated_at',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                                null,
                                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                                'Updated At'
                            )
                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
 
        $setup->endSetup();
    }
}
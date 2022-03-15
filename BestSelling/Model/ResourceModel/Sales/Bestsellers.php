<?php
namespace Codem\BestSelling\Model\ResourceModel\Sales;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Bestsellers extends AbstractDb
{
    const MAIN_TABLE = 'codem_bestselling_sales_bestsellers';
    const ID_FIELD_NAME = 'id';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
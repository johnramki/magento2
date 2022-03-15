<?php
namespace Codem\Blog\Model\ResourceModel\Post;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Codem\Blog\Model\Post', 'Codem\Blog\Model\ResourceModel\Post');
    }
}
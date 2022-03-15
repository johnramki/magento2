<?php
namespace Codem\BestSelling\Model\ResourceModel\Sales\Bestsellers;

use Codem\BestSelling\Model\Sales\Bestsellers as BestsellersModel;
use Codem\BestSelling\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BestsellersModel::class, BestsellersResourceModel::class);
    }
}
<?php
namespace Codem\BestSelling\Model\Sales;

use Codem\BestSelling\Model\ResourceModel\Sales\Bestsellers as BestsellersResourceModel;
use Magento\Framework\Model\AbstractModel;

class Bestsellers extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(BestsellersResourceModel::class);
    }
}
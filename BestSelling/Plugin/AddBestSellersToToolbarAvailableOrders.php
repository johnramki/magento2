<?php
namespace Codem\BestSelling\Plugin;

use Magento\Catalog\Block\Product\ProductList\Toolbar;

class AddBestSellersToToolbarAvailableOrders
{
    public function afterGetAvailableOrders(Toolbar $subject, $result)
    {
        $result['bestsellers'] = 'Best Sellerss';
        return $result;
    }
}
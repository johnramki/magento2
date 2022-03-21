<?php

namespace Codem\Catalog\Block\Category;


class View extends \Magento\Catalog\Block\Category\View
{    
    public  function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Helper\Category $categoryHelper,
        array $data = [])
    {
        parent::__construct($context, $layerResolver, $registry, $categoryHelper, $data);
    }

    /**
     * @return mixed
     */
    public function getCmsBlockBottomHtml()
    {
        
        return $this->getLayout()
        ->createBlock(\Magento\Cms\Block\Block::class)
        ->setBlockId($this->getCurrentCategory()->getData('futured_category_block_list'))
        ->toHtml();
    }
}
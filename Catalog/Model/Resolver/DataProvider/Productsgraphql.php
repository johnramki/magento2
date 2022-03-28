<?php

namespace Codem\Catalog\Model\Resolver\DataProvider;

class Productsgraphql extends \Magento\Framework\View\Element\Template
{
    protected $_productRepository;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        array $data = []
        )
    {
        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    /**
     * @params string $sku
     * this function return all the product data by product sku
     **/
    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }
    /**
     * @params int $id
     * this function return all the word of the day by id
     **/
    public function getAttributesBySku( $sku ){
        $_product = $this->getProductBySku($sku);
        $attributes = $_product->getAttributes();// All Product Attributes

        $attributes_data = [];
        $x=0;
        foreach ($attributes as $attribute) {
            if($attribute->getIsUserDefined()){ // Removed the system product attribute by checking the current attribute is user created
                $attributeLabel = $attribute->getFrontend()->getLabel();
                $attributeValue = $attribute->getFrontend()->getValue($_product);

                if($attribute->getAttributeCode()=="language"){
                    $attributeLabelAndValue = $attributeLabel." - ".$attributeValue;
                    $attributes_data[$x]['atr_data'] = $attributeLabelAndValue;
                }
            }
            $x++;
        }
        return $attributes_data;
    }
}
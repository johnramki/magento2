<?php
namespace Codem\Catalog\Plugins;

/*
Override the product name functionality By using After Method  (Magento\module-catalog\Model\Product)
*/
class Product{

    public function aftergetName(\Magento\Catalog\Model\Product $product, $name){
        $price = $product->getData('price');
        if($price < 50 ){
            $name .= " (Low Price)";
        }else if($price >= 50 && $price <= 100 ){
            $name .= " (Medium Price)";
        }else if($price > 100){
            $name .= " (High Price)";
        }
        return $name;
    }
}

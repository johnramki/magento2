<?php
namespace Codem\Checkout\Plugin\Checkout\Model;
 
class LayoutProcessor
{
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['landmark'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'options' => [],
                'id' => 'custom-field-landmark'
            ],
            'dataScope' => 'shippingAddress.custom_attributes.landmark',
            'label' => 'Landmark',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [
                'required-entry' => false
            ],
            'sortOrder' => 251,
            /*'customEntry' => null,*/
            'id' => 'custom-field-landmark'
        ];
        
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['locality'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'options' => [],
                'id' => 'custom-field-locality'
            ],
            'dataScope' => 'shippingAddress.custom_attributes.locality',
            'label' => 'Locality',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [
                'required-entry' => false
            ],
            'sortOrder' => 251,
            /*'customEntry' => null,*/
            'id' => 'custom-field-locality'
        ];

        
 
        return $jsLayout;
    }
}
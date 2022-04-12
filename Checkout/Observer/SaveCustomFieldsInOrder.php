<?php
namespace Codem\Checkout\Observer;
 
class SaveCustomFieldsInOrder implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer) {
        

        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        if(empty ($order) || empty($quote)){
            return $this;
        }
        $shippingAddress = $quote->getShippingAddress();

        if($shippingAddress->getLocality()){
            $orderShippingAddress = $order->getShippingAddress();
            $orderShippingAddress->setLocality($shippingAddress->getLocality())->save();
            $orderShippingAddress->setLandmark($shippingAddress->getLandmark())->save();
        }
        
        //$order->setData('locality', $shippingAddress->getLocality());
        //$order->setData('landmark', $shippingAddress->getLandmark());

        return $this;
    }
} 
?>
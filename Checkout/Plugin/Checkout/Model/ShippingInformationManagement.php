<?php
namespace Codem\Checkout\Plugin\Checkout\Model;
 
use Magento\Quote\Model\QuoteRepository;

use Magento\Quote\Api\Data\CartInterface;
use Magento\Framework\Exception\InputException;
use Magento\Quote\Model\Quote\ShippingAssignment\ShippingAssignmentPersister;
 
class ShippingInformationManagement
{
    protected $quoteRepository;
 
    public function __construct(QuoteRepository $quoteRepository) {
        $this->quoteRepository = $quoteRepository;
    }
 
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        
        
        if(!$extAttributes = $addressInformation->getExtensionAttributes())
        { 
            return;
        }
        $shippingAddress = $addressInformation->getShippingAddress();
        $shippingAddress->setLocality($extAttributes->getLocality());
        $shippingAddress->setLandmark($extAttributes->getLandmark());


        // $quote = $this->quoteRepository->getActive($cartId);
        // $quote->setLocality($extAttributes->getLocality());
        //$quote->setLandmark($extAttributes->getLandmark());
    }
}
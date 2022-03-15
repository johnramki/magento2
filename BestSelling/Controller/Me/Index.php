<?php
namespace Codem\BestSelling\Controller\Me;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $objectManager = ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');
        $customerId = $customerSession->getCustomerId();
        $result->setContents("customer id: $customerId");
        return $result;
        
    }
    public function getCustomerId()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $objectManager = ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');
        $customerId = $customerSession->getCustomerId();
        $result->setContents("customer id: $customerId");
        return $result;
    }
}
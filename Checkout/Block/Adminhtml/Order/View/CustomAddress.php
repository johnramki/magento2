<?php
namespace Codem\Checkout\Block\Adminhtml\Order\View;

class CustomAddress extends \Magento\Backend\Block\Template
{
    private $_coreRegistry;
    protected $order;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Sales\Model\Order $order,
        array $data = []
    ) {
        $this->order = $order;
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
   
    public function getLocality(){
        
        $order = $this->_coreRegistry->registry('current_order');
        return $order->getLocality(); 
    }
   
    public function getLandmark()
    {
        $order = $this->_coreRegistry->registry('current_order');
        return $order->getLandmark(); 
    }
}
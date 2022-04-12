<?php
namespace Codem\Checkout\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;


class InstallData implements InstallDataInterface
{
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
    $this->customerSetupFactory = $customerSetupFactory;
    }
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $customerSetup->addAttribute(
            'customer_address',
            'locality',
            [   
                'type' => 'varchar',
                'label' => 'Locality',
                'input' => 'hidden',
                'visible' => true,
                'required' => false,
                'system' => 0,
                'visible_on_front' => false,
            ]
        );
        $customerSetup->addAttribute(
            'customer_address',
            'locality',
            [   
                'type' => 'varchar',
                'label' => 'Locality',
                'input' => 'hidden',
                'visible' => true,
                'required' => false,
                'system' => 0,
                'visible_on_front' => false,
            ]
        );
    }
}
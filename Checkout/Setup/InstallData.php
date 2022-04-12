<?php
namespace Codem\Checkout\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    /**
     * @var CustomerSetupFactory
     */
    protected $customerSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * @param CustomerSetupFactory $customerSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $customerAddressEntity = $customerSetup->getEavConfig()->getEntityType('customer_address');
        $attributeSetId = $customerAddressEntity->getDefaultAttributeSetId();

        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        $customerSetup->addAttribute('customer_address', 'location_id', [
            'type'          => 'int',
            'label'         => 'Location Id',
            'input'         => 'text',
            'required'      =>  false,
            'visible'       =>  true,
            'user_defined'  =>  true,
            'sort_order'    =>  13,
            'position'      =>  13,
            'system'        =>  0,
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer_address', 'location_id')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId
            ]);

        $attribute->save();        
    }
}
/* namespace Codem\Checkout\Setup;

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
} */
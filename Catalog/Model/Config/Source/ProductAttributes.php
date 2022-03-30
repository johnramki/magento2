<?php
namespace Codem\Catalog\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\Data\OptionSourceInterface;


class ProductAttributes extends AbstractSource
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ){
        $this->collectionFactory = $collectionFactory;
    }
    
    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        
        $categories = $this->collectionFactory->create()->addAttributeToFilter('level', array('eq' => 2))
            ->addFieldToSelect('is_active')->addFieldToSelect('name')
        ->addFieldToSelect('entity_id');
        $options[] = array('value' => '', 'label' => '--Please Select--');
        foreach ($categories as $category){
            $options[] = [
                'value' => $category->getEntityId(),
                'label' => $category->getName(),
            ];
        }

        if (null === $this->_options) {
            $this->_options= $options;
        }
        return $this->_options;
    }
}

?>
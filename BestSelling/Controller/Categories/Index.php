<?php
namespace Codem\BestSelling\Controller\Categories;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection as BestsellersCollection;
use Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory as BestsellersCollectionFactory;
class Index extends Action
{
    protected $bestsellersCollectionFactory;
    public function __construct(
        Context $context,
        BestsellersCollectionFactory $bestsellersCollectionFactory
    ) {
        $this->bestsellersCollectionFactory = $bestsellersCollectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        /** @var Request $request */
        $request = $this->getRequest();
        $categoryId = $request->getParam('category_id');
        $limit = $request->getParam('limit');

        /** @var $bestsellersCollection BestsellersCollection */
        $bestsellersCollection = $this->bestsellersCollectionFactory->create();
        $firstItem = $bestsellersCollection->getFirstItem();
        $allItems = $bestsellersCollection->getItems();
        echo '<pre>';
        foreach ($allItems as $item) {
            var_dump($item->getData());
        }
        die();

        $result->setContents("category_id: $categoryId, limit: $limit");
        return $result;
    }
}
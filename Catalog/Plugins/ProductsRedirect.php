<?php
namespace Codem\Catalog\Plugins;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Request\Http;
use \Magento\Catalog\Controller\Product as ProductController;

class ProductsRedirect
{
    
    private $productRepository;
    private $categoryInterface;
    private $resultRedirectFactory;
    private $scopeConfig;
    private $request;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryInterface,
        RedirectFactory $resultRedirectFactory,
        ScopeConfigInterface $scopeConfig,
        Http $request
    ) {
        $this->productRepository = $productRepository;
        $this->categoryInterface = $categoryInterface;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->scopeConfig = $scopeConfig;
        $this->request = $request;
    }
    /**
     * @param ProductController $subject
     */
    /**
     * Steps:
     * 1.Get the redirect_category product attribute value
     * 2.Get the global redirect category attribute value
     * 3.Check product attribute. If it has product redirect_category attribute will direct the page based on product attribute otherwise it will redirect based on global configured category
     */
    public function aroundExecute(ProductController $subject, callable $proceed)
    {
        $productId = (int) $this->request->getParam('id');
        $product =  $this->productRepository->getById($productId);
        $redirectCatId = $product->getData('redirect_category');
        $globalCatId = $this->scopeConfig->getValue('category/general/catredirect', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if ($product->isDisabled()) {
            $redirectId = ($redirectCatId)?$redirectCatId:$globalCatId;
            if($redirectId){
                $category = $this->categoryInterface->get($redirectId);
                if ($category->getIsActive()) {
                    $categoryUrl = $category->getUrl();
                    $resultRedirect = $this->resultRedirectFactory->create();
                    $resultRedirect->setHttpResponseCode(301);
                    return $resultRedirect->setPath($categoryUrl);
                }
            }   
        }
        return $proceed();
    }
   
}

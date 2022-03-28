<?php

namespace Codem\Catalog\Model\Resolver;

use Magento\Catalog\Api\AttributeSetRepositoryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class to resolve custom attribute_set_name field in product GraphQL query
 */
class ProductAttributeSetNameResolver implements ResolverInterface
{
    /**
     * @var AttributeSetRepositoryInterface
     */
    private $setRepository;

    public function __construct(AttributeSetRepositoryInterface $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        return $this->setRepository->get($value['attribute_set_id'])->getAttributeSetName();
    }
}
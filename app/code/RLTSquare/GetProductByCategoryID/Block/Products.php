<?php
/**
 * @ Shakeel
 */
namespace RLTSquare\GetProductByCategoryID\Block;

/**
 * Class Products
 * @package RLTSquare\GetProductByCategoryID\Block
 */
class Products extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /** @var \Magento\Catalog\Api\CategoryRepositoryInterface  */
    protected $categoryRepository;

    /**
     * Products constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository
     */

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->categoryRepository = $categoryRepository;
        parent::__construct($context);
    }

    /**
     * @param $categoryID
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */

    public function getProductCollectionByCategory($categoryID)
    {
        $catgory = $this->categoryRepository->get($categoryID);
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoryFilter($catgory);
        $collection->setPageSize(6);
        return $collection;
    }

    /**
     * @param $categoryID
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCategoryCountByID($categoryID)
    {
        $catgory = $this->categoryRepository->get($categoryID);
        $collectionCount = $this->_productCollectionFactory->create();
        $collectionCount->addAttributeToSelect('entity_id');
        $collectionCount->addCategoryFilter($catgory);
        $categoryCount = $collectionCount->getSize();
        return $categoryCount;
    }


    public  function getCategoryLink($categoryID)
    {
        $category = $this->categoryRepository->get($categoryID, $this->_storeManager->getStore()->getId());
        $categoryLink = $category->getUrl();
        return $categoryLink;
    }
}

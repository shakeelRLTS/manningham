<?php
/**
 * @ Shakeel
 */
namespace RLTSquare\CustomAttributes\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class Products
 * @package RLTSquare\CustomAttributes\Block
 */

class CustomAttributes implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    private $filterProvider;

    public function __construct(\Magento\Cms\Model\Template\FilterProvider $filterProvider)
    {

        $this->filterProvider = $filterProvider;
    }

    public function getCustomAttributeVal($val)
    {
        $customAttributeVal = $this->filterProvider->getPageFilter()->filter($val);
        return $customAttributeVal;
    }

}
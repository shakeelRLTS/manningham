<?php
namespace Smartwave\Porto\Helper\Product\View;

/**
 * Interceptor class for @see \Smartwave\Porto\Helper\Product\View
 */
class Interceptor extends \Smartwave\Porto\Helper\Product\View implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Catalog\Model\Session $catalogSession, \Magento\Catalog\Model\Design $catalogDesign, \Magento\Catalog\Helper\Product $catalogProduct, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\Message\ManagerInterface $messageManager, \Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator $categoryUrlPathGenerator, \Magento\Store\Model\StoreManagerInterface $storeManager, array $messageGroups = [])
    {
        $this->___init();
        parent::__construct($context, $catalogSession, $catalogDesign, $catalogProduct, $coreRegistry, $messageManager, $categoryUrlPathGenerator, $storeManager, $messageGroups);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareAndRender(\Magento\Framework\View\Result\Page $resultPage, $productId, $controller, $params = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareAndRender');
        return $pluginInfo ? $this->___callPlugins('prepareAndRender', func_get_args(), $pluginInfo) : parent::prepareAndRender($resultPage, $productId, $controller, $params);
    }
}

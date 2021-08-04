<?php
namespace Mageplaza\AjaxLayer\Controller\Search\Result\Index;

/**
 * Interceptor class for @see \Mageplaza\AjaxLayer\Controller\Search\Result\Index
 */
class Interceptor extends \Mageplaza\AjaxLayer\Controller\Search\Result\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Catalog\Model\Session $catalogSession, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Search\Model\QueryFactory $queryFactory, \Magento\Catalog\Model\Layer\Resolver $layerResolver, \Magento\CatalogSearch\Helper\Data $helper, \Magento\Framework\Json\Helper\Data $jsonHelper, \Mageplaza\AjaxLayer\Helper\Data $moduleHelper)
    {
        $this->___init();
        parent::__construct($context, $catalogSession, $storeManager, $queryFactory, $layerResolver, $helper, $jsonHelper, $moduleHelper);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}

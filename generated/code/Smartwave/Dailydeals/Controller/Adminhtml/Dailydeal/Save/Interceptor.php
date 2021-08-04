<?php
namespace Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Save;

/**
 * Interceptor class for @see \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Save
 */
class Interceptor extends \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter, \Smartwave\Dailydeals\Model\DailydealFactory $dailydealFactory, \Magento\Framework\Registry $registry, \Magento\Backend\App\Action\Context $context, \Magento\Catalog\Model\ProductFactory $productFactory)
    {
        $this->___init();
        parent::__construct($dateFilter, $dailydealFactory, $registry, $context, $productFactory);
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

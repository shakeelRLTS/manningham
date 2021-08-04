<?php
namespace Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Delete;

/**
 * Interceptor class for @see \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Delete
 */
class Interceptor extends \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Smartwave\Dailydeals\Model\DailydealFactory $dailydealFactory, \Magento\Framework\Registry $coreRegistry, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($dailydealFactory, $coreRegistry, $context);
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

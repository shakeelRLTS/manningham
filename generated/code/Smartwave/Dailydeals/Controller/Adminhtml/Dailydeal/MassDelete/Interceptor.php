<?php
namespace Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\MassDelete;

/**
 * Interceptor class for @see \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\MassDelete
 */
class Interceptor extends \Smartwave\Dailydeals\Controller\Adminhtml\Dailydeal\MassDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Ui\Component\MassAction\Filter $filter, \Smartwave\Dailydeals\Model\ResourceModel\Dailydeal\CollectionFactory $collectionFactory, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($filter, $collectionFactory, $context);
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

<?php
/**
 * @author RLTSquare Team
 * Created by PhpStorm
 * User: Umer
 * Date: 16/06/2021
 * Time: 11:15 AM
 */
namespace RLTSquare\CustomImportExport\Block\Adminhtml\ImportExport;

use Magento\Backend\Block\Template;

class  ImportProducts extends Template
{
    /**
     * Block template
     *
     * @var string
     */
    protected $_template = 'import/import_products.phtml';

    /**
     * @var \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
     */
    protected $blockGrid;
    protected $Export;
    protected $store;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    protected $jsonEncoder;

    /**
     * AssignProducts constructor.
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\Store $store,
        \Magento\Backend\Block\Widget\Grid\Export $Export,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->Export = $Export;
        $this->_store = $store;
        $this->jsonEncoder = $jsonEncoder;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve instance of grid block
     *
     * @return \Magento\Framework\View\Element\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function getExportTypes()
    {
        $array = [
            0 => [
                'label' => 'CSV',
                'value' => 'csv'
            ],
            1 => [
                'label' => 'Excel',
                'value' => 'excel'
            ],
        ];

        return $array;
    }
}

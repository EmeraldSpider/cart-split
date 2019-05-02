<?php
namespace Emerald\SkuSplit\Model\ResourceModel;

class SkuSplit extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'customizer_sku',
            'id');
    }
}
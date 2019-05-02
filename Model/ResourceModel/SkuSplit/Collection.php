<?php

namespace Emerald\SkuSplit\Model\ResourceModel\SkuSplit;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Emerald\SkuSplit\Model\SkuSplit',
            '\Emerald\SkuSplit\Model\ResourceModel\SkuSplit'
        );
    }
}

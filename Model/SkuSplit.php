<?php

namespace Emerald\SkuSplit\Model;

class SkuSplit extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        $this->_init('\Emerald\SkuSplit\Model\ResourceModel\SkuSplit');
    }
}

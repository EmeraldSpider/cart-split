<?php

namespace Emerald\SkuSplit\Plugin;

use Emerald\SkuSplit\Model\SkuSplitFactory;
use Magento\Catalog\Model\ProductRepository;
use Magento\Checkout\Model\Session;

class SkuSplitPlugin
{
    /**
     * @var SkuSplitFactory
     */
    private $skuSplitFactory;
    /**
     * @var Session
     */
    private $checkoutSession;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        SkuSplitFactory $skuSplitFactory,
        ProductRepository $productRepository,
        Session $checkoutSession
    ) {
        $this->skuSplitFactory = $skuSplitFactory;
        $this->quote = $checkoutSession->getQuote();
        $this->productRepository = $productRepository;
    }

    public function beforeAddProduct(
        $subject, //Magento\Checkout\Model\Cart
        $product, //Magneto\Catalog\Model\Product $product,
        $params = null
    ) {
        if ($product) {
            $splits = $this->skuSplitFactory->create();
            $id = $product->getId();
            $sku = $product->getSku();
            $splitSkus = $splits->getCollection()
                ->addFieldToFilter('parent_id', ["eq" => $id]);
            $subSkus = $splitSkus->getData();
            if (!(empty($subSkus))) {
                $superConfig[] = $id;
            }
            if (!(empty($subSkus))) {
                $count = 0;
                foreach ($subSkus as $key => $data) {
                    $newProduct = $this->productRepository->getById($data['product_id']);
                    $qty = $params['qty'] * $data['multiplier'];
                    if ($count != count($subSkus)) {
                        $this->quote->addProduct($newProduct, $qty);
                    }
                    $count++;
                }
            }
        }
        return;
    }
}

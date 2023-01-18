<?php 

namespace Scandiweb\ShippingBlock\Plugin\Block;

use Magento\Shipping\Model\Config;

class FreeShippingBlock
{
    /**
     * @var Config
     */
    
    private $shippingConfig;

    /**
     * @param Config $shippingConfig 
     */

     public function __construct(config $shippingConfig)
     {
        $this->shippingConfig = $shippingConfig;
     }

     /**
      * Hide and show the "Free Shipping" block depending on the availability of the delivery method
      *
      * @param \Magento\Framework\View\Element\Template $block
      * @return \Magento\Framework\View\Element\Template
      */

     public function beforeToHtml(\Magento\Framework\View\Element\Template $block)
     {
        if ($block->getNameInLayout() === 'header.banner'){
            $freeShippingActive = $this->shippingConfig->isActive('freeshipping');
            $block->setData('visible', $freeShippingActive);
        }
        return $block;
     }
    
}
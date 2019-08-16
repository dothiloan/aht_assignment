<?php
 
namespace LOANDT\Testimonial\Block;
 
class Link extends \Magento\Framework\View\Element\Html\Link
{
    protected $_customerSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Magento\Customer\Model\SessionFactory $customerSession
    )
    {
        $this->_customerSession = $customerSession->create();
        parent::__construct($context, $data);
    }

    public function getLoggedinCustomerId() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getId();
        }
        return false;
    }
    /**
    * Render block HTML.
    *
    * @return string
    */
    protected function _toHtml()
    {
        if($this->getLoggedinCustomerId() == false){
            return '';
        }else {
            return parent::_toHtml();
        }
   
    }
}
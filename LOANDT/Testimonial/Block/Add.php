<?php 
namespace LOANDT\Testimonial\Block;

class Add extends \Magento\Framework\View\Element\Template
{
    protected $_customerSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Magento\Customer\Model\SessionFactory $customerSession
    )
    {
        $this->_customerSession = $customerSession->create();
        return parent::__construct($context, $data);
    }

    public function getLoggedinCustomerId() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getId();
        }
        return false;
    }
    
}
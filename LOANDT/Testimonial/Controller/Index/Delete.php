<?php 
namespace LOANDT\Testimonial\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_testimonialFactory;

    protected $_customerSession;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Magento\Customer\Model\SessionFactory $customerSession
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        $this->_customerSession = $customerSession->create();
        return parent::__construct($context);
    }

    public function execute()
    {
        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        $this->deleteStudent($testimonial_id);
        $this->_redirect('testimonial/index/listing');
    }

    private function getLoggedinCustomerId() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getId();
        }
        return false;
    } 

    private function deleteStudent($testimonial_id)
    {
        $checkCustomerLogin = $this->getLoggedinCustomerId();
        if($checkCustomerLogin != false){
            if(isset($testimonial_id)){
                $testimonial = $this->_testimonialFactory->create();
                $testimonial->load($testimonial_id)->delete();
            }  
        }         
    }
}
<?php 
namespace LOANDT\Testimonial\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_testimonialFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        $this->deleteStudent($testimonial_id);
        $this->_redirect('testimonial/index/listing');
    }

    private function deleteStudent($testimonial_id)
    {
        if(isset($testimonial_id)){
            $testimonial = $this->_testimonialFactory->create();
            $testimonial->load($testimonial_id)->delete();
        }    
    }
}
<?php
namespace LOANDT\Testimonial\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \LOANDT\Testimonial\Model\TestimonialFactory
     */

     protected $_testimonialFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        return parent::__construct($context);
    }

    /**
     * Execute function 
     */

    public function execute()
    {

        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        if(isset($testimonial_id) && !empty($testimonial_id)){
            $testimonialInfo = $this->getRequest()->getPostValue();
            $data = [
                'name' => $testimonialInfo['name'],
                'designation' => $testimonialInfo['designation'],
                'message' => $testimonialInfo['message'],
                'email' => $testimonialInfo['email'],
                'contact' => $testimonialInfo['contact'],
                'image' => $testimonialInfo['image'],
                'status' => $testimonialInfo['status'],
                'customer_id' => $testimonialInfo['customer_id']   
            ];
            $model = $this->_testimonialFactory->create();
            $model->load($testimonial_id)->addData($data)->save();
            return $this->_redirect('testimonial/index/index');
        }

    }
}
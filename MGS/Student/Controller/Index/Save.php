<?php
namespace MGS\Student\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \MGS\Student\Model\StudentFactory
     */
    protected $_studentFactory;
    
    /**
     * function construct
     * 
     * @param \Magento\Framework\App\Action\Context $context,
     * @param \MGS\Student\Model\StudentFactory $studentFactory,
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \MGS\Student\Model\StudentFactory $studentFactory
    )
    {
        $this->_studentFactory = $studentFactory;
        parent::__construct($context);
    }

    /**
     * function execute
     * 
     */

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $student = $this->_studentFactory->create()->load($data['student_id']);
        $student->addData($data)->save();
        $this->_redirect('student/index/index'); 

       
    }
}
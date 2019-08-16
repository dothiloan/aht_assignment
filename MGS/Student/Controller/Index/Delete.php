<?php 
namespace MGS\Student\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_studentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \MGS\Student\Model\StudentFactory $studentFactory
    )
    {
        $this->_studentFactory = $studentFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $student_id = $this->getRequest()->getParam('student_id');
        $this->deleteStudent($student_id);
        $this->_redirect('student/index/index');
    }

    private function deleteStudent($student_id)
    {
        if(isset($student_id)){
            $student = $this->_studentFactory->create();
            $student->load($student_id)->delete();
        }    
    }
}
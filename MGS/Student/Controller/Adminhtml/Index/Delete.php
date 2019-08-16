<?php
namespace MGS\Student\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    protected $_studentFactory;

    /**
     * function construct
     * @param \Magento\Backend\App\Action\Context $context
     * @param \MGS\Student\Model\StudentFactory $studentFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \MGS\Student\Model\StudentFactory $studentFactory
    )
    {
        $this->_studentFactory = $studentFactory;
        parent::__construct($context);
    }

    /**
     * function execute
     */
    public function execute()
    {
        $student_id = $this->getRequest()->getParam('student_id');
        $model = $this->_studentFactory->create();
        $this->deleteStudent($student_id, $model);
        $this->_redirect('student/index/index');
    }

    /**
     * function check exist student
     * @param int $student_id
     */

    private function checkExistStudent(
        int $student_id,
        \MGS\Student\Model\Student $model
        )
    {
        $student = $model->load($student_id);
        if($student->getStudentId()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * function deleteStudent
     * @param int $student_id
     */
    private function deleteStudent(
        int $student_id,
        \MGS\Student\Model\Student $model
        )
    {
        if($this->checkExistStudent($student_id, $model))
        {
            $model->load($student_id)->delete();
            $this->messageManager->addSuccessMessage(__('delete success'));
            return true;
        }else{
            return false;
        }
    }
    
}
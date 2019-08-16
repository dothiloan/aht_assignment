<?php
namespace MGS\Student\Controller\Index;

use MGS\Student\Model\ResourceModel\Student\Collection;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var MGS\Student\Model\StudentFactory
     */
    protected $_studentFactory;

    /**
     * retrive model
     */
    protected $_model;

    /**
     * function construct
     * 
     * @param Magento\Framework\App\Action\Context $context
     * @param MGS\Student\Model\StudentFactory $studentFactory
     */

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \MGS\Student\Model\ResourceModel\Student\CollectionFactory $studentFactory
    )
    {
        $this->_studentFactory  = $studentFactory;
        return parent::__construct($context);
    }

    /**
     * Function execute
     */

    public function execute()
    {
        // $data = $this->_studentFactory->create();
        // $data->getSelect()->where('student_id BETWEEN 1 AND 4')->limit(2, 0);
        // foreach($data as $value){
        //     echo "<pre>";
        //     print_r($value->getData());
        //     echo "</pre>";
        // }

        $this->_view->loadLayout();
        $this->_view->renderLayout();

    }

    /**
     * get all data
     * 
     * @return array
     */

    private function getAllData() : array
    {
        $this->_model = $this->_studentFactory->create();
        $data = $this->_model->getCollection()->getData();
        return $data;
    }

    /**
     * get one student
     * 
     */

    private function addOneStudent($student)
    {
        $this->_model = $this->_studentFactory->create();
        $this->_model->addData($student)->save();
    }

    /**
     * delete one student
     * 
     * @param int $student_id
     */

    private function deleteOneStudent($student_id)
    {
        $this->_model = $this->_studentFactory->create();
        $student = $this->_model->load($student_id);

        if($student->getStudentId()){
            $student->delete();
        }     
    }

    /**
     * edit one student
     * 
     * @param int $student_id
     */

    private function edtOneStudent($student_id, $dataStudent)
    {
        $this->_model = $this->_studentFactory->create();
        $student = $this->_model->load($student_id);

        if($student->getStudentId()){
            $student->addData($dataStudent)->save();
        }     
    }
}
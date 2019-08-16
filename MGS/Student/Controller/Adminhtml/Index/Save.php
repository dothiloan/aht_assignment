<?php
namespace MGS\Student\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    protected $_studentFactory;

    /**
     * function construct
     * @param \Magento\Backend\App\Action\Context $context,
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
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPostValue();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();
            $student_id = $this->getRequest()->getParam('student_id');
            

            if(isset($student_id) && !empty($student_id) ){
                $model = $this->_studentFactory->create();
                $resultData = $model->load($student_id);
                $resultData = [
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'isMarried' => $data['isMarried']
                ];
                $model->addData($resultData)->save();
                $this->messageManager->addSuccessMessage(__('edit success'));
                $this->_redirect('student/index/index');

            }else{
                $model = $this->_studentFactory->create();
                $resultData = [
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'isMarried' => $data['isMarried']
                ];
                $model->addData($resultData)->save();
                $this->messageManager->addSuccessMessage(__('save success'));
                $this->_redirect('student/index/index');
            }
        }
    }
}
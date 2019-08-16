<?php
namespace MGS\Student\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \MGS\Student\Model\StudentFactory
     */
    protected $_studentFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;
    
    /**
     * function construct
     * 
     * @param \Magento\Framework\App\Action\Context $context,
     * @param \MGS\Student\Model\StudentFactory $studentFactory,
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \MGS\Student\Model\StudentFactory $studentFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_studentFactory = $studentFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }

    /**
     * function execute
     * 
     */

    public function execute()
    {
        $student_id = $this->getRequest()->getParam('student_id');
        $this->_registry->register('student_id', $student_id);
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
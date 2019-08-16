<?php
namespace MGS\Student\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $_studentFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data =[],
        \Magento\Framework\Registry $registry,
        \MGS\Student\Model\StudentFactory $studentFactory
    )
    {
        $this->_registry = $registry;
        $this->_studentFactory = $studentFactory;
        parent::__construct($context, $data);
    }

    public function editStudent()
    {
        $student_id = $this->_registry->registry('student_id');
        $student = $this->_studentFactory->create()->load($student_id);
        return $student;
    }
}
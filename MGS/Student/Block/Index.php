<?php
namespace MGS\Student\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \MGS\Student\Model\ResourceModel\Student\CollectionFactory $collectionFactory
    )
    {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getAllData()
    {
        $student = $this->_collectionFactory->create();
        return $student;
    }
}
<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MGS\Book\Model;

use MGS\Book\Api\Data\BookInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * CMS block model
 *
 * @method Block setStoreId(array $storeId)
 * @method array getStoreId()
 */
class Book extends AbstractModel implements BookInterface
{
    /**
     * CMS block cache tag
     */
    const CACHE_TAG = 'mgs_b';

    /**#@+
     * Block's statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**#@-*/

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mgs_book';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MGS\Book\Model\ResourceModel\Book::class);
    }

    /**
     * Prevent blocks recursion
     *
     * @return AbstractModel
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function beforeSave()
    {
        if ($this->hasDataChanges()) {
            $this->setUpdateTime(null);
        }

        $needle = 'book_id="' . $this->getId() . '"';
        if (false == strstr($this->getContent(), $needle)) {
            return parent::beforeSave();
        }
        throw new \Magento\Framework\Exception\LocalizedException(
            __('Make sure that static block content does not reference the block itself.')
        );
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getBookId(), self::CACHE_TAG . '_' . $this->getName()];
    }

    /**
     * Retrieve block id
     *
     * @return int
     */
    public function getBookId()
    {
        return $this->getData(self::BOOK_ID);
    }

    /**
     * Retrieve block identifier
     *
     * @return string
     */
    public function getName()
    {
        return (string)$this->getData(self::NAME);
    }

    /**
     * Retrieve block title
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->getData(self::AUTHOR);
    }

    /**
     * Retrieve block content
     *
     * @return string
     */
    public function getPublishingCompany()
    {
        return $this->getData(self::PUBLISHING_COMPANY);
    }

    /**
     * Retrieve block creation time
     *
     * @return int
     */
    public function getPublishingYear()
    {
        return $this->getData(self::PUBLISHING_YEAR);
    }

    /**
     * Retrieve block update time
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->getData(self::TOTAL);
    }

    /**
     * Is active
     *
     * @return bool
     */
    public function getStatus()
    {
        return (bool)$this->getData(self::STATUS);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return BlockInterface
     */
    public function setBookId($book_id)
    {
        return $this->setData(self::BOOK_ID, $book_id);
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return BlockInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return BlockInterface
     */
    public function setAuthor($author)
    {
        return $this->setData(self::AUTHOR, $author);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return BlockInterface
     */
    public function setPublishingCompany($publishing_company)
    {
        return $this->setData(self::PUBLISHING_COMPANY, $publishing_company);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return BlockInterface
     */
    public function setPublishingYear($publishing_year)
    {
        return $this->setData(self::PUBLISHING_YEAR, $publishing_year);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return BlockInterface
     */
    public function setTotal($total)
    {
        return $this->setData(self::TOTAL, $total);
    }

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return BlockInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Receive page store ids
     *
     * @return int[]
     */
    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : $this->getData('store_id');
    }

    /**
     * Prepare block's statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}

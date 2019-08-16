<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MGS\Book\Api\Data;

/**
 * CMS block interface.
 * @api
 * @since 100.0.2
 */
interface BookInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const BOOK_ID               = 'book_id';
    const NAME                  = 'name';
    const AUTHOR                = 'author';
    const PUBLISHING_COMPANY    = 'publishing_company';
    const PUBLISHING_YEAR       = 'publishing_year';
    const TOTAL                 = 'total';
    const STATUS                = 'status';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getBookId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get author
     *
     * @return string|null
     */
    public function getAuthor();

    /**
     * Get publishing company
     *
     * @return string|null
     */
    public function getPublishingCompany();

    /**
     * Get publishing year
     *
     * @return int|null
     */
    public function getPublishingYear();

    /**
     * Get update total
     *
     * @return int|null
     */
    public function getTotal();

    /**
     * Get status
     *
     * @return int|null
     */
    public function getStatus();

    /**
     * Set ID
     *
     * @param int $book_id
     * @return BookInterface
     */
    public function setBookId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return BookInterface
     */
    public function setName($name);

    /**
     * Set author
     *
     * @param string $author
     * @return BookInterface
     */
    public function setAuthor($author);

    /**
     * Set publishing_company
     *
     * @param string $publishing_company
     * @return BookInterface
     */
    public function setPublishingCompany($publishing_company);

    /**
     * Set publishing_year
     *
     * @param string $publishing_year
     * @return BookInterface
     */
    public function setPublishingYear($publishing_year);

    /**
     * Set total
     *
     * @param string $total
     * @return BookInterface
     */
    public function setTotal($total);

    /**
     * Set status
     *
     * @param bool|int $status
     * @return BookInterface
     */
    public function setStatus($status);
}

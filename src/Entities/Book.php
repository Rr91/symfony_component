<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 15.06.2021
 * Time: 20:09
 */

namespace App\Entities;

/**
 * @Entity()
 * @Table(name="books")
 */

class Book
{
    /**
     * @id
     * @Column(type="integer")
     * $GeneratedValue
     */
    public $id;

    /**
     * @Column(type="string", name="title_book", length=32, unique=true, nullable=true)
     */
    public $title;
}
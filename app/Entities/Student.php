<?php

namespace App\Entities;

class Student
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $surname;
    /**
     * @var string
     */
    private $nationality;
    /**
     * @var string
     */
    private $address;
    /**
     * @var string
     */
    private $course;

    public function __construct(int $id, string $firstname, string $surname, string $nationality, string $address, string $course)
    {

        $this->id = $id;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->nationality = $nationality;
        $this->address = $address;
        $this->course = $course;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @return string
     */
    public function getCourse(): string
    {
        return $this->course;
    }
}
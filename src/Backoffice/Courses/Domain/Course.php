<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Domain;

final class Course
{
    private $id;
    private $name;
    private $detail;
    private $image;
    private $price;

    public function __construct(
        CourseId $id,
        CourseName $name,
        CourseDetail $detail,
        CourseImage $image,
        CoursePrice $price
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->detail = $detail;
        $this->image = $image;
        $this->price = $price;
    }

    public static function create(
        CourseId $id,
        CourseName $name,
        CourseDetail $detail,
        CourseImage $image,
        CoursePrice $price
    ): self
    {
        $course = new self($id, $name, $detail, $image, $price);
        return $course;
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function detail(): CourseDetail
    {
        return $this->detail;
    }

    public function image(): CourseImage
    {
        return $this->image;
    }

    public function price(): CoursePrice
    {
        return $this->price;
    }
}

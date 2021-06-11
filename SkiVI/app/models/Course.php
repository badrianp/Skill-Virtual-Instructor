<?php
class Course
{
    public $id, $title, $category, $author, $image, $description, $duration, $difficulty, $parts, $experience;

    public function __construct($id, $title, $category, $author, $image, $description, $duration, $difficulty, $parts, $experience)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->author = $author;
        $this->image = $image;
        $this->description = $description;
        $this->duration = $duration;
        $this->difficulty = $difficulty;
        $this->parts = $parts;
        $this->experience = $experience;
    }
}

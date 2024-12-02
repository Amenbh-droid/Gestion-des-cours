<?php

class Course {
    private ?int $id;
    private ?string $title;
    private ?string $description;
    private ?float $price;
    private ?int $teacher_id;
    private ?int $study_duration;
    private ?string $level;

    // Constructor
    public function __construct(
        ?int $id ,
        ?string $title,
        ?string $description ,
        ?float $price ,
        ?int $teacher_id ,
        ?int $study_duration ,
        ?string $level 
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->teacher_id = $teacher_id;
        $this->study_duration = $study_duration;
        $this->level = $level;
    }

    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(?string $title): void {
        $this->title = $title;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(?float $price): void {
        $this->price = $price;
    }

    public function getTeacherId(): ?int {
        return $this->teacher_id;
    }

    public function setTeacherId(?int $teacher_id): void {
        $this->teacher_id = $teacher_id;
    }

    public function getStudyDuration(): ?int {
        return $this->study_duration;
    }

    public function setStudyDuration(?int $study_duration): void {
        $this->study_duration = $study_duration;
    }

    public function getLevel(): ?string {
        return $this->level;
    }

    public function setLevel(?string $level): void {
        $this->level = $level;
    }
}

?>

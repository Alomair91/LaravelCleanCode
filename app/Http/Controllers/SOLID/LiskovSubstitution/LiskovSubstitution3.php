<?php
namespace App\Http\Controllers\SOLID\LiskovSubstitution;

interface LessonRepositoryInterface
{
    /**
     * Fetch all records
     * @return array
     */
    public function getAll();
}

class FileLessonRepository implements LessonRepositoryInterface {

    public function getAll()
    {
        // return through filesystem.
        return [["id" => 1, "name" => "Alomair"]];
    }
}

class DBLessonRepository implements LessonRepositoryInterface {

    public function getAll()
    {
//        return Lesson::all(); // violates the LSP if return collection
        return Lesson::all()->toArray();
    }
}

class LiskovSubstitution3
{
    function getData(LessonRepositoryInterface $lessonRepository)
    {
        return $lessonRepository->getAll();
    }
}


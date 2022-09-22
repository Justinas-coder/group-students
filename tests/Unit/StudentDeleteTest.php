<?php

namespace Tests\Unit;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StudentDeleteTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public $student = [];


    public function test_student_delete_response()
    {
        $user = User::factory()->create();

        $student = Student::factory()->create();

        $this->actingAs($user)->withSession(['banned' => false])->delete('/student/'.$student->id.'/destroy');

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);


    }

}

<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class CoverPageMakerTest extends TestCase
{
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'dept_name' => 'Computer Science and Engineering',
            'task_type' => 'Assignment',
            'assignment_no' => 'A1',
            'course_title' => 'Advanced Programming',
            'course_code' => 'CSE 400',
            'student_name' => 'John Doe',
            'roll_no' => '2023-001',
            'reg_no' => 'REG-1001',
            'year' => '4th',
            'semester' => '2nd',
            'teacher_name' => 'Dr. Jane Smith',
            'teacher_designation' => 'Professor',
            'submission_date' => date('Y-m-d'),
        ], $overrides);
    }

    public function test_home_page_returns_success_and_renders_home_view(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertSee('Welcome to SIU Cover Page Generator');
    }

    public function test_home_page_contains_hero_section_and_get_started_button(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Get Started Now');
        $response->assertSee('Create professional assignment and lab report cover pages in seconds with a polished university-ready format.');
    }

    public function test_form_page_returns_success_and_contains_expected_fields(): void
    {
        $response = $this->get('/form-page');

        $response->assertStatus(200);
        $response->assertViewIs('form');
        $response->assertSee('Select Department');
        $response->assertSee('Task Type');
        $response->assertSee('Full Name');
        $response->assertSee('Course Code');
        $response->assertSeeHtml('Preview & Download PDF');
    }

    public function test_expected_routes_are_registered(): void
    {
        $this->assertTrue(Route::has('home'));
        $this->assertTrue(Route::has('show.form'));
        $this->assertTrue(Route::has('generate.pdf'));
    }

    public function test_validation_fails_when_student_name_is_missing(): void
    {
        $payload = $this->validPayload(['student_name' => '']);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['student_name']);
    }

    public function test_validation_fails_when_course_code_is_missing(): void
    {
        $payload = $this->validPayload(['course_code' => '']);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['course_code']);
    }

    public function test_validation_fails_when_task_type_is_invalid(): void
    {
        $payload = $this->validPayload(['task_type' => 'Essay', 'assignment_no' => 'A1']);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['task_type']);
    }

    public function test_validation_fails_when_assignment_number_is_missing_for_assignment(): void
    {
        $payload = $this->validPayload(['assignment_no' => '']);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['assignment_no']);
    }

    public function test_validation_fails_when_lab_report_fields_are_missing(): void
    {
        $payload = $this->validPayload([
            'task_type' => 'Lab Report',
            'assignment_no' => null,
            'exp_no' => '',
            'exp_name' => '',
            'assigned_date' => '',
        ]);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['exp_no', 'exp_name', 'assigned_date']);
    }

    public function test_validation_fails_when_submission_date_is_invalid(): void
    {
        $payload = $this->validPayload(['submission_date' => 'invalid-date']);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['submission_date']);
    }

    public function test_generate_pdf_returns_pdf_response_for_valid_data(): void
    {
        $payload = $this->validPayload();

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    public function test_generate_pdf_uses_dynamic_download_filename(): void
    {
        $payload = $this->validPayload([
            'task_type' => 'Assignment',
            'course_code' => 'CSE 400',
            'course_title' => 'Advanced Programming',
        ]);

        $response = $this->post('/generate-pdf', $payload);

        $response->assertStatus(200);
        $this->assertStringContainsString(
            'Assignment_CSE_400_Advanced_Programming.pdf',
            $response->headers->get('content-disposition', '')
        );
    }
}

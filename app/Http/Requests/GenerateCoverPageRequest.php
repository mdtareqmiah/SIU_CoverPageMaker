<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateCoverPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dept_name' => ['required', 'string', 'max:100'],
            'task_type' => ['required', 'string', 'in:Assignment,Lab Report'],
            'assignment_no' => ['nullable', 'string', 'max:50', 'required_if:task_type,Assignment', 'regex:/^[A-Za-z0-9\s\-]+$/'],
            'exp_no' => ['nullable', 'string', 'max:50', 'required_if:task_type,Lab Report', 'regex:/^[A-Za-z0-9\s\-]+$/'],
            'exp_name' => ['nullable', 'string', 'max:150', 'required_if:task_type,Lab Report'],
            'assigned_date' => ['nullable', 'date', 'required_if:task_type,Lab Report'],
            'course_title' => ['required', 'string', 'max:150'],
            'course_code' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z0-9\s\-]+$/'],
            'student_name' => ['required', 'string', 'max:120'],
            'roll_no' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z0-9\-\/]+$/'],
            'reg_no' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z0-9\-\/]+$/'],
            'year' => ['required', 'string', 'in:1st,2nd,3rd,4th'],
            'semester' => ['required', 'string', 'in:1st,2nd'],
            'teacher_name' => ['required', 'string', 'max:120'],
            'teacher_designation' => ['required', 'string', 'max:100'],
            'submission_date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'dept_name.required' => 'Department is required.',
            'dept_name.string' => 'Department must be a valid text value.',
            'dept_name.max' => 'Department cannot exceed :max characters.',

            'task_type.required' => 'Task type is required.',
            'task_type.in' => 'Task type must be Assignment or Lab Report.',

            'assignment_no.required_if' => 'Assignment number is required when task type is Assignment.',
            'assignment_no.string' => 'Assignment number must be text.',
            'assignment_no.max' => 'Assignment number cannot exceed :max characters.',
            'assignment_no.regex' => 'Assignment number may contain letters, numbers, spaces, and dashes only.',

            'exp_no.required_if' => 'Experiment number is required when task type is Lab Report.',
            'exp_no.string' => 'Experiment number must be text.',
            'exp_no.max' => 'Experiment number cannot exceed :max characters.',
            'exp_no.regex' => 'Experiment number may contain letters, numbers, spaces, and dashes only.',

            'exp_name.required_if' => 'Experiment name is required when task type is Lab Report.',
            'exp_name.string' => 'Experiment name must be text.',
            'exp_name.max' => 'Experiment name cannot exceed :max characters.',

            'assigned_date.required_if' => 'Assigned date is required when task type is Lab Report.',
            'assigned_date.date' => 'Assigned date must be a valid date.',

            'course_title.required' => 'Course title is required.',
            'course_title.string' => 'Course title must be text.',
            'course_title.max' => 'Course title cannot exceed :max characters.',

            'course_code.required' => 'Course code is required.',
            'course_code.string' => 'Course code must be text.',
            'course_code.max' => 'Course code cannot exceed :max characters.',
            'course_code.regex' => 'Course code may contain letters, numbers, spaces, and dashes only.',

            'student_name.required' => 'Student name is required.',
            'student_name.string' => 'Student name must be text.',
            'student_name.max' => 'Student name cannot exceed :max characters.',

            'roll_no.required' => 'Roll number is required.',
            'roll_no.string' => 'Roll number must be text.',
            'roll_no.max' => 'Roll number cannot exceed :max characters.',
            'roll_no.regex' => 'Roll number may contain letters, numbers, dashes, and slashes only.',

            'reg_no.required' => 'Registration number is required.',
            'reg_no.string' => 'Registration number must be text.',
            'reg_no.max' => 'Registration number cannot exceed :max characters.',
            'reg_no.regex' => 'Registration number may contain letters, numbers, dashes, and slashes only.',

            'year.required' => 'Year is required.',
            'year.in' => 'Year must be one of 1st, 2nd, 3rd, or 4th.',

            'semester.required' => 'Semester is required.',
            'semester.in' => 'Semester must be 1st or 2nd.',

            'teacher_name.required' => 'Teacher name is required.',
            'teacher_name.string' => 'Teacher name must be text.',
            'teacher_name.max' => 'Teacher name cannot exceed :max characters.',

            'teacher_designation.required' => 'Teacher designation is required.',
            'teacher_designation.string' => 'Teacher designation must be text.',
            'teacher_designation.max' => 'Teacher designation cannot exceed :max characters.',

            'submission_date.required' => 'Submission date is required.',
            'submission_date.date' => 'Submission date must be a valid date.',
        ];
    }
}

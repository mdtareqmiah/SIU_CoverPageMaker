@extends('layout')

@section('title', 'SIU Cover Page Generator')

@section('content')
<div class="form-shell py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card premium-form-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="form-header text-center mb-4">
                            <div class="form-header-icon">
                                <i class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                            </div>
                            <h1 class="form-title">Cover Page Generator</h1>
                            <p class="form-subtitle">Fill in the required information correctly</p>
                        </div>

                        <form action="{{ route('generate.pdf') }}" method="POST" target="_blank" novalidate>
                            @csrf

                            @if ($errors->any())
                                <div class="validation-summary" role="alert" aria-live="polite">
                                    <div class="validation-summary-header">
                                        <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                                        <span>Please correct the highlighted fields.</span>
                                    </div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-section">
                                <h2 class="section-header"><i class="bi bi-journal-bookmark-fill"></i>Course Information</h2>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="dept_select">Select Department</label>
                                        <select name="dept_name" id="dept_select" class="form-control form-select" required>
                                            <option value="">Choose Department...</option>
                                            <option value="Computer Science and Engineering" {{ old('dept_name') === 'Computer Science and Engineering' ? 'selected' : '' }}>CSE</option>
                                            <option value="Electrical and Electronic Engineering" {{ old('dept_name') === 'Electrical and Electronic Engineering' ? 'selected' : '' }}>EEE</option>
                                            <option value="Law" {{ old('dept_name') === 'Law' ? 'selected' : '' }}>LAW</option>
                                            <option value="Business Administration" {{ old('dept_name') === 'Business Administration' ? 'selected' : '' }}>BBA</option>
                                            <option value="English" {{ old('dept_name') === 'English' ? 'selected' : '' }}>English</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="task_type">Task Type</label>
                                        <select name="task_type" id="task_type" class="form-control form-select" required>
                                            <option value="">Select Type</option>
                                            <option value="Assignment" {{ old('task_type') === 'Assignment' ? 'selected' : '' }}>Assignment</option>
                                            <option value="Lab Report" {{ old('task_type') === 'Lab Report' ? 'selected' : '' }}>Lab Report</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="assignment_fields" class="conditional-fieldset" aria-hidden="true">
                                    <label class="form-label" for="assignment_no">Assignment Number</label>
                                    <input id="assignment_no" type="text" name="assignment_no" class="form-control" placeholder="Enter Assignment Number" value="{{ old('assignment_no') }}">
                                </div>

                                <div id="lab_report_fields" class="conditional-fieldset" aria-hidden="true">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="exp_no">Experiment No</label>
                                            <input id="exp_no" type="text" name="exp_no" class="form-control" value="{{ old('exp_no') }}">
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label" for="exp_name">Experiment Name</label>
                                            <input id="exp_name" type="text" name="exp_name" class="form-control" value="{{ old('exp_name') }}">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" for="assigned_date">Assigned Date</label>
                                        <input id="assigned_date" type="date" name="assigned_date" class="form-control" value="{{ old('assigned_date') }}">
                                    </div>
                                </div>

                                <div class="row g-3 mt-1">
                                    <div class="col-md-8">
                                        <label class="form-label" for="course_title">Course Title</label>
                                        <input id="course_title" type="text" name="course_title" class="form-control" value="{{ old('course_title') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="course_code">Course Code</label>
                                        <input id="course_code" type="text" name="course_code" class="form-control" placeholder="Enter course code: CSE 400" value="{{ old('course_code') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h2 class="section-header"><i class="bi bi-person-badge-fill"></i>Student Information</h2>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label" for="student_name">Full Name</label>
                                        <input id="student_name" type="text" name="student_name" class="form-control" value="{{ old('student_name') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="roll_no">Roll No</label>
                                        <input id="roll_no" type="text" name="roll_no" class="form-control" value="{{ old('roll_no') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="reg_no">Registration No</label>
                                        <input id="reg_no" type="text" name="reg_no" class="form-control" value="{{ old('reg_no') }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="year">Year</label>
                                        <select id="year" name="year" class="form-control form-select" required>
                                            <option value="">Year</option>
                                            <option value="1st" {{ old('year') === '1st' ? 'selected' : '' }}>1st</option>
                                            <option value="2nd" {{ old('year') === '2nd' ? 'selected' : '' }}>2nd</option>
                                            <option value="3rd" {{ old('year') === '3rd' ? 'selected' : '' }}>3rd</option>
                                            <option value="4th" {{ old('year') === '4th' ? 'selected' : '' }}>4th</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="semester">Semester</label>
                                        <select id="semester" name="semester" class="form-control form-select" required>
                                            <option value="">Semester</option>
                                            <option value="1st" {{ old('semester') === '1st' ? 'selected' : '' }}>1st</option>
                                            <option value="2nd" {{ old('semester') === '2nd' ? 'selected' : '' }}>2nd</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h2 class="section-header"><i class="bi bi-person-workspace"></i>Submitted To</h2>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="teacher_name">Teacher Name</label>
                                        <input id="teacher_name" type="text" name="teacher_name" class="form-control" value="{{ old('teacher_name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="teacher_designation">Designation</label>
                                        <input id="teacher_designation" type="text" name="teacher_designation" class="form-control" value="{{ old('teacher_designation') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h2 class="section-header"><i class="bi bi-calendar3"></i>Submission Details</h2>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label" for="submission_date">Submission Date</label>
                                        <input id="submission_date" type="date" name="submission_date" class="form-control" value="{{ old('submission_date') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="submit-wrap">
                                <button type="submit" class="btn btn-submit">
                                    <span class="btn-label">
                                        <i class="bi bi-download"></i>
                                        Preview & Download PDF
                                    </span>
                                    <span class="btn-spinner" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
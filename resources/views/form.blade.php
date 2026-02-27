@extends('layout')

@section('title', 'SIU Cover Page Generator')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4  border-0" style="border-radius: 15px;">

                <h2 class="text-center fw-bold" style="background-color:beige; height:6rem; color: #4fc7d2; font-size: 4rem;">Cover Page Generator</h2>
                <p class="text-center text-muted mb-4">Fill in the required information correctly</p>

                <form action="{{ route('generate.pdf') }}" method="POST" target="_blank">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Select Department</label>
                            <select name="dept_name" id="dept_select" class="form-select" required>
                                <option value="">Choose Department...</option>
                                <option value="Computer Science and Engineering">CSE</option>
                                <option value="Electrical and Electronic Engineering">EEE</option>
                                <option value="Law">LAW</option>
                                <option value="Business Administration">BBA</option>
                                <option value="English">English</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Task Type</label>
                            <select name="task_type" id="task_type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="Assignment">Assignment</option>
                                <option value="Lab Report">Lab Report</option>
                            </select>
                        </div>
                    </div>

                    <div id="assignment_fields" style="display: none;" class="mb-3 border p-3 rounded bg-light">
                        <label class="fw-bold">Assignment Number</label>
                        <input type="text" name="assignment_no" class="form-control" placeholder="Enter Assignment Number">
                    </div>

                    <div id="lab_report_fields" style="display: none;" class="mb-3 border p-3 rounded bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="fw-bold">Experiment No</label>
                                <input type="text" name="exp_no" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label class="fw-bold">Experiment Name</label>
                                <input type="text" name="exp_name" class="form-control">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="fw-bold">Assigned Date</label>
                            <input type="Date" name="assigned_date" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <label class="form-label fw-bold">Course Title</label>
                            <input type="text" name="course_title" class="form-control"  required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Course Code</label>
                            <input type="text" name="course_code" class="form-control" placeholder="Enter course code: CSE 400" required>
                        </div>
                    </div>

                    <h5 class="section-header mt-4 mb-3 fw-bold" style="color: #000000; border-bottom: 2px solid #4fc7d2; display: block; padding-bottom: 5px;">Student Information</h5>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="student_name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Roll No</label>
                            <input type="text" name="roll_no" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Registration No</label>
                            <input type="text" name="reg_no" class="form-control" required>
                        </div>
                        
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Year</label>
                            <select name="year" class="form-select" required>
                                <option value="">Year</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Semester</label>
                            <select name="semester" class="form-select" required>
                                <option value="">Semester</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                            </select>
                        </div>
                    </div>

                    <h5 class="section-header mt-4 mb-3 fw-bold"style="color: #000000; border-bottom: 2px solid #4fc7d2; display: block; padding-bottom: 5px;">Submitted To</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Teacher Name</label>
                            <input type="text" name="teacher_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Designation</label>
                            <input type="text" name="teacher_designation" class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="form-label fw-bold">Submission Date</label>
                        <input type="Date" name="submission_date" class="form-control" required>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-lg w-100 fw-bold shadow" style="background-color: #4fc7d2; border-color: #000000; color: white;">
                            Preview & Download PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Task Type Toggle
    document.getElementById('task_type').addEventListener('change', function() {
        var value = this.value;
        var assignDiv = document.getElementById('assignment_fields');
        var labDiv = document.getElementById('lab_report_fields');

        if (value === 'Assignment') {
            assignDiv.style.display = 'block';
            labDiv.style.display = 'none';
        } else if (value === 'Lab Report') {
            assignDiv.style.display = 'none';
            labDiv.style.display = 'block';
        } else {
            assignDiv.style.display = 'none';
            labDiv.style.display = 'none';
        }
    });
</script>
@endsection
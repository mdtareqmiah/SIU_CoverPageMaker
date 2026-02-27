<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', sans-serif; margin: 0; padding: 0; }
        .border-box { border: 3px double #000; height: 99%; padding: 0px; margin: 0px; text-align: center; }
        .uni-name { font-size: 34pt; font-weight: bold; margin-top: 25px; margin-bottom: 25px; color: #000; }
        .dept-head { font-size: 20pt;  margin-top: 30px;  }
        .task-box {   font-size: 24pt; font-weight: bold; margin: 20px 0; text-align: left; margin-left: 45px; }
        .course-info { font-size: 17pt; margin-bottom: 8px; text-align: left; margin-left: 45px;}
        .main-table {  width: 100%; margin-top: 50px; text-align: left; }
        .info-columnst {  border: 1px solid #000; width: 50%; font-size: 14pt; vertical-align: top; padding: 10px; }
        .info-column {  border: 1px solid #000; width: 50%; font-size: 14pt; vertical-align: top; padding: 10px; }
        .label-text { font-weight: bold; font-size: 14pt; border-bottom: 1px solid #000; display: inline-block; margin-bottom: 20px; }
        .footer-date { margin-top: 20px; font-size: 20pt; }
        .nam{display: inline-block;  font-size: 15pt; font-weight: bold; margin-bottom: 10px;  }
        .logo{ padding: 10px 20px;}
        /* .logo img{ width: 250px; height: auto;} */ 
        .report-info {font-size: 16pt; text-align: left; margin-bottom: 8px; margin-left: 45px;}
    </style>
</head>
<body>

    
    <div class="border-box">
        <div class="text-center">
            <div class="uni-name">Sylhet International University</div>
            <div class="logo"><img src="/public/image/Siu.png" alt="University Logo"></div> 
            <div class="dept-head">Department Of {{ $dept_name }}</div>
            
            <div class="task-box">
                {{ $task_type }} 
                @if($task_type == 'Assignment' && $assignment_no)
                    No: {{ $assignment_no }}
                @endif
            </div>
        
            @if($task_type == 'Lab Report')
                <div class="report-info">
                    <strong>Experiment No:</strong> {{ $exp_no }} <br>
                    <strong>Experiment Name:</strong> {{ $exp_name }} <br>
                    <strong>Assigned Date:</strong> {{ $assigned_date }}
                </div>
            @endif
        
            <div class="course-info"><strong>Course Title:</strong> {{ $course_title }}</div>
            <div class="course-info"><strong>Course Code:</strong> {{ $course_code }}</div>
        </div>
        
        <table class="main-table">
            <tr>
                <td class="info-columnst">
                    <span class="label-text">Submitted by</span>
                    <br><span class="nam"> {{ $student_name }}</span> 
                    <br>Roll No: {{ $roll_no }} 
                    <br>Registration No: {{ $reg_no }} 
                    <br>Semester: {{$year}} Year {{ $semester }} Semester
                    <br>Department: {{ $dept_name }} 
                </td>
                <td class="info-column">
                    <span class="label-text">Submitted to</span>
                    <br><span class="nam"> {{ $teacher_name }}</span>
                    <br> {{ $teacher_designation }} 
                    <br>Department of <br> {{ $dept_name }} 
                    <br>Sylhet International University 
                </td>
            </tr>
        </table>

        <div class="footer-date">
            <strong>Submission Date:</strong> {{ $submission_date }} 
        </div>
    </div>
</body>
</html>
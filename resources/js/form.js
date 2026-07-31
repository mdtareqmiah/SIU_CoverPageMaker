document.addEventListener('DOMContentLoaded', function () {
    var taskTypeElement = document.getElementById('task_type');
    var assignDiv = document.getElementById('assignment_fields');
    var labDiv = document.getElementById('lab_report_fields');
    var submitButton = document.querySelector('.btn-submit');

    if (!taskTypeElement || !assignDiv || !labDiv) {
        return;
    }

    function toggleTaskFields() {
        var taskType = taskTypeElement.value;

        if (taskType === 'Assignment') {
            assignDiv.style.display = 'block';
            assignDiv.setAttribute('aria-hidden', 'false');
            labDiv.style.display = 'none';
            labDiv.setAttribute('aria-hidden', 'true');
        } else if (taskType === 'Lab Report') {
            assignDiv.style.display = 'none';
            assignDiv.setAttribute('aria-hidden', 'true');
            labDiv.style.display = 'block';
            labDiv.setAttribute('aria-hidden', 'false');
        } else {
            assignDiv.style.display = 'none';
            assignDiv.setAttribute('aria-hidden', 'true');
            labDiv.style.display = 'none';
            labDiv.setAttribute('aria-hidden', 'true');
        }
    }

    if (submitButton) {
        submitButton.addEventListener('click', function () {
            submitButton.classList.add('loading');
        });
    }

    taskTypeElement.addEventListener('change', toggleTaskFields);
    toggleTaskFields();
});

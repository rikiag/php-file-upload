document.getElementById('uploadBtn').addEventListener('click', function (e) {
    e.preventDefault();

    var fileInput = document.getElementById('file');
    var progressBar = document.querySelector('.progress');
    var progressBarFill = progressBar.querySelector('.progress-bar');

    if (fileInput.files.length === 0) {
        alert('No file to upload.');
        return;
    }

    var file = fileInput.files[0];
    var formData = new FormData();
    formData.append('file', file);

    var xhr = new XMLHttpRequest();

    xhr.upload.addEventListener('progress', function (e) {
        var percent = (e.loaded / e.total) * 100;
        progressBar.style.display = 'block';
        progressBarFill.style.width = percent + '%';
        progressBarFill.setAttribute('aria-valuenow', percent);
        progressBarFill.innerHTML = percent.toFixed(2) + '%';
    });

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert('An error occurred while uploading the file.');
            }
            progressBar.style.display = 'none';
            progressBarFill.style.width = '0%';
            progressBarFill.setAttribute('aria-valuenow', '0');
            progressBarFill.innerHTML = '';
            fileInput.value = '';
        }
    };

    xhr.open('POST', 'upload.php');
    xhr.send(formData);
});

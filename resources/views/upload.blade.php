<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Upload</title>
</head>
<body>
<form id="uploadForm" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" id="fileInput" webkitdirectory directory multiple />
    <button type="button" onclick="uploadFiles()">Upload</button>
</form>

<script>
    async function uploadFiles() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const formData = new FormData(document.getElementById('uploadForm'));
        const fileInput = document.getElementById('fileInput');

        for (const file of fileInput.files) {
            formData.append('files[]', file);
        }

        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        console.log(csrfToken);


        try {
            const response = await fetch('/upload-files', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                const result = await response.json();
                console.log(result);
            } else {
                const text = await response.text();
                console.error('Received non-JSON response:', text);
            }
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }

    }
</script>
</body>
</html>

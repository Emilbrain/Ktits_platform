<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Drag and Drop</title>
    <style>
        .dropzone {
            width: 100%;
            height: 200px;
            border: 2px dashed #0087F7;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
        }
        .dropzone.dragover {
            background-color: #e6f7ff;
        }
        #progressBar {
            width: 0;
            height: 20px;
            background-color: #4caf50;
            margin-top: 20px;
            display: none;
        }
    </style>
</head>
<body>

<h2>Upload File Using Drag and Drop</h2>

<div id="dropzone" class="dropzone">
    Drag and drop a file here
</div>

<div id="progressContainer">
    <div id="progressBar"></div>
</div>

<script defer>
    // Получаем элементы dropzone и прогресс бара
    const dropzone = document.getElementById('dropzone');
    const progressBar = document.getElementById('progressBar');

    // Отключаем стандартное поведение браузера для события Drag and Drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Добавляем класс, когда файл перетаскивается в зону (визуальный эффект)
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => dropzone.classList.add('dragover'), false);
    });

    // Убираем класс, когда файл покидает зону (визуальный эффект)
    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => dropzone.classList.remove('dragover'), false);
    });

    // Обработчик события 'drop', когда файл сбрасывается в зону
    dropzone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            uploadFile(files[0]); // Загружаем только первый файл
        }
    }

    // Функция для загрузки файла
    function uploadFile(file) {
        const xhr = new XMLHttpRequest();
        const formData = new FormData();

        formData.append('file', file);

        xhr.open('POST', '/upload', true); // Замените '/upload' на URL для вашего сервера

        // Отслеживание прогресса
        xhr.upload.addEventListener('progress', (e) => {
            const percent = (e.loaded / e.total) * 100;
            progressBar.style.width = percent + '%';
            progressBar.style.display = 'block';
        });

        // Когда загрузка завершена
        xhr.onload = function () {
            if (xhr.status) {
                alert('File uploaded successfully');
                progressBar.style.display = 'none';
            } else {
                alert('File upload failed');
                progressBar.style.display = 'none';
            }
        };

        // Если ошибка во время загрузки
        xhr.onerror = function () {
            alert('Upload error');
        };

        xhr.send(formData);
    }

</script>
</body>
</html>

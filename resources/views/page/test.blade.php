<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Viewer</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        #editor, #result {
            width: 50%;
            height: 100vh;
        }
        #editor {
            border-right: 1px solid #ccc;
        }
        iframe {
            border: none;
            overflow: auto;
            background-color: #f1f1f1;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="editor"></div>
<iframe id="result"></iframe>

<!-- Загрузка monaco-editor -->
<script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.25.2/min/vs/loader.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        require.config({ paths: { 'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor@0.25.2/min/vs' }});

        require(['vs/editor/editor.main'], function() {
            var editor = monaco.editor.create(document.getElementById('editor'), {
                value: '',
                language: 'php', // Используем PHP как язык для подсветки синтаксиса
                theme: 'vs-dark'
            });

            // Загрузка содержимого файла при загрузке страницы
            fetch('/app/code.txt')
                .then(response => response.text())
                .then(data => editor.setValue(data))
                .catch(error => console.error('Error fetching code:', error));

            // Обработка изменений в редакторе
            editor.getModel().onDidChangeContent(() => {
                const code = editor.getValue();
                updateIframe(code); // Вызываем функцию обновления iframe при каждом изменении
            });

            // Функция для обновления содержимого iframe
            function updateIframe(code) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                const token = csrfToken ? csrfToken.getAttribute('content') : '';

                fetch('/app/execute-php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ code: code })
                })
                    .then(response => response.json())
                    .then(data => {
                        const iframe = document.getElementById('result');
                        iframe.srcdoc = data.output; // Обновляем содержимое iframe с результатом выполнения PHP кода
                    })
                    .catch(error => console.error('Error executing PHP:', error));
            }
        });
    });
</script>
</body>
</html>

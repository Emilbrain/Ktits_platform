@extends('includes.layout')
@section('h2-name', 'Добавить главу')
@section('content')
        <div>

            <form id="quillForm" method="POST" action="{{ route('admin.store.theory.section') }}" enctype="multipart/form-data">
@csrf
                <div class="mb-4">
                    <h2 class="text-xl font-semibold mb-2">Название</h2>
                    <input type="text" name="title"
                           class="text-md bg-gray-50 border border-gray-300  text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                           placeholder="Название..." />
                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <h2 class="text-xl font-semibold mb-2">Теория</h2>
                    <div id="editor1" class="bg-white p-4 border rounded"></div>
                    <input type="hidden" id="quillContent1" name="theory">
                    @error('theory')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Скрытое поле с ID курса -->
                <input type="hidden" name="theory_id" value="{{ $id }}">

                <!-- Кнопка отправки формы -->
                <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                    Добавить
                </button>
        </form>
            <script>
                var quill1 = new Quill('#editor1', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{'font': []}, {'size': []}],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{'color': []}, {'background': []}],
                            ['blockquote', 'code-block'],
                            [{'header': 1}, {'header': 2}, {'header': 3}, {'header': 4}],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            [{'script': 'sub'}, {'script': 'super'}],
                            [{'indent': '-1'}, {'indent': '+1'}],
                            [{'direction': 'rtl'}],
                            [{'align': []}],
                            ['link', 'image', 'video', 'formula'],
                            ['clean']
                        ]
                    }
                });

                document.getElementById('quillForm').addEventListener('submit', function (event) {
                    event.preventDefault();
                    const htmlContent = quill1.root.innerHTML.trim();

                    document.getElementById('quillContent1').value = (htmlContent  === '<p><br></p>') ? '' : htmlContent;
                    this.submit();
                });
            </script>
    </div>
@endsection

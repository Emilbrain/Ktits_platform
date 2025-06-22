    @extends('includes.layout')
@section('h2-name', 'Назначить преподавателя')
@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md space-y-6">
        {{-- Заголовок и кнопка --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Назначенные преподаватели</h1>
            <button
                data-modal-target="assignTeacherModal"
                data-modal-toggle="assignTeacherModal"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg text-sm px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
            >
                Добавить преподавателя
            </button>
        </div>

        {{-- Таблица назначений --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    @foreach(['Преподаватель','Группа','Курс','Действие'] as $col)
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide whitespace-nowrap">
                            {{ $col }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($assignedTeachers as $a)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800 whitespace-nowrap">
                            {{ $a->username }} {{ $a->surname }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 whitespace-nowrap">
                            {{ $a->group_title }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 whitespace-nowrap">
                            {{ $a->course_title }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 whitespace-nowrap">
                            <form
                                action="{{ route('admin.assign.remove', [
                                    'teacher_id' => $a->teacher_id,
                                    'group_id'   => $a->group_id,
                                    'course_id'  => $a->course_id
                                ]) }}"
                                method="POST"
                                class="inline-block"
                            >
                                @csrf
                                <button
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-md px-4 py-1 focus:outline-none focus:ring-2 focus:ring-red-300"
                                >
                                    Снять
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Модальное окно добавления --}}
    <div
        id="assignTeacherModal"
        tabindex="-1"
        aria-hidden="true"
        class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black bg-opacity-50"
    >
        <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl overflow-hidden">
            {{-- Заголовок модалки --}}
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-xl font-semibold text-gray-800">Добавить преподавателя</h3>
                <button
                    type="button"
                    class="text-gray-400 hover:text-gray-600 focus:outline-none"
                    data-modal-hide="assignTeacherModal"
                >
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414
                           1.414L11.414 10l4.293 4.293a1 1 0 01-1.414
                           1.414L10 11.414l-4.293 4.293a1 1
                           0 01-1.414-1.414L8.586 10 4.293 5.707a1 1
                           0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </div>

            {{-- Контент модалки --}}
            <form action="{{ route('admin.assign.store') }}" method="POST" class="px-6 py-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    {{-- Выбор преподавателя --}}
                    <div>
                        <label for="teacher" class="block mb-2 text-sm font-medium text-gray-700">Преподаватель</label>
                        <select
                            id="teacher"
                            name="teacher"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                            required
                        >
                            <option value="" disabled selected>Выберите преподавателя</option>
                            @foreach($teachers as $t)
                                <option value="{{ $t->id }}">
                                    {{ $t->username }} {{ $t->surname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Выбор группы --}}
                    <div>
                        <label for="group" class="block mb-2 text-sm font-medium text-gray-700">Группа</label>
                        <select
                            id="group"
                            name="group"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                            required
                        >
                            <option value="" disabled selected>Выберите группу</option>
                            @foreach($groups as $g)
                                <option value="{{ $g->id }}">{{ $g->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Курсы --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Курсы</label>
                    <div id="courses" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        {{-- Сюда скриптом подтягиваются чекбоксы --}}
                    </div>
                </div>

                {{-- Кнопка отправки --}}
                <button
                    type="submit"
                    class="w-full sm:w-auto block bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-6 py-2 text-center focus:outline-none focus:ring-2 focus:ring-blue-300"
                >
                    Добавить
                </button>
            </form>
        </div>
    </div>

    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            const teacherSelect = document.getElementById('teacher');
            const groupSelect = document.getElementById('group');
            const coursesContainer = document.getElementById('courses');

            function updateCourses() {
                const selectedTeacher = teacherSelect.value;
                const selectedGroup = groupSelect.value;

                coursesContainer.innerHTML = ''; // Очищаем контейнер с курсами

                if (selectedTeacher && selectedGroup) {
                    fetch(`/admin/show/teachers/get/${selectedGroup}/${selectedTeacher}`)
                        .then(response => response.json())
                        .then(data => {
                            const {courses, existingAssignments} = data;
                            courses.forEach(course => {
                                const label = document.createElement('label');
                                label.classList.add('inline-flex', 'items-center', 'mb-2', 'text-gray-900');

                                const checkbox = document.createElement('input');
                                checkbox.type = 'checkbox';
                                checkbox.name = 'courses[]';
                                checkbox.value = course.id;
                                checkbox.classList.add('mr-2', 'rounded', 'text-blue-600', 'focus:ring-blue-500', 'border-gray-300');

                                if (existingAssignments.includes(course.id)) {
                                    checkbox.checked = true;
                                }

                                label.appendChild(checkbox);
                                label.appendChild(document.createTextNode(course.title));
                                coursesContainer.appendChild(label);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            teacherSelect.addEventListener('change', updateCourses);
            groupSelect.addEventListener('change', updateCourses);
        });
    </script>

@endsection

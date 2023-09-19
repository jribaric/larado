<x-layout>

    @auth
    <a class=" m-5 bg-blue-900 text-white rounded p-2 hover:bg-blue-400" href="/tasks/create">Create Task</a>
    @endauth

    <x-card>

        <ol class="relative border-gray-200 dark:border-gray-700 w-auto">
            @foreach ($tasks as $task)
                <x-task-card :task="$task" />
            @endforeach
        </ol>

    </x-card>
</x-layout>

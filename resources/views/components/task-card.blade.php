@props(['task'])

<li class="mb-8">

    <div class="items-center justify-between w-auto p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">

        {{-- <time class="text-xs font-normal text-gray-400 sm:order-last">{{ $task->created_at?->diffForHumans() }}</time> --}}
        <div class="text-sm font-normal text-gray-500 dark:text-gray-300"><span class="font-extrabold">{{ $task->title }}</span> - <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">{{ $task->user->name }}</a></div>
        <form action="/tasks/{{ $task->id }}" method="post">
            @csrf
            @method('DELETE')

            <a href="/tasks/edit/{{ $task->id }}" class="text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center ml-5 mb-1 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900">Edit</a>
            <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center ml-0 mb-1 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>

        </form>
    </div>
</li>

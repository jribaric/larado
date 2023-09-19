<x-layout>


    <x-card>
        <div class="">
        <form class="p-3" action="/tasks/update/{{ $task->id }}" method="post">
            @csrf
            @method('PUT')
            <label class="block mb-3" for="title">Title: </label>
            <input class="p-1" type="text" value="{{ $task->title }}" name="title">
            <button class="block bg-green-800 p-2 rounded mt-2 text-sm">Update</button>
        </form>
    </div>
    </x-card>




</x-layout>

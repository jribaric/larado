<x-layout>


    <x-card>
        <div class="">
        <form class="p-3" action="/tasks/create" method="post">
            @csrf
            @if ($errors->all())
            @foreach ($errors->all() as $error)
            <p>🚩 {{ $error }}</p>
            @endforeach
            @endif
            <label class="block mb-3" for="title">Title: </label>
            <input class="p-1" type="text" placeholder="Mow Lawn" name="title">
            <button class="block bg-green-800 p-2 rounded mt-2 text-sm" type="submit">Create Task</button>
        </form>
    </div>
    </x-card>




</x-layout>

<div class="w-1/2 m-auto my-10">
    <h1 class="text-3xl font-bold mb-2">{{ $title }}</h1> {{-- diambil dari Users.php di function render --}}
    <p>Users Count : {{ count($users) }}</p> {{-- diambil dari Users.php di function render --}}

    <button wire:click="createUser" type="button"
        class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 cursor-pointer">Create
        User</button>

    <hr class="border-1 my-5">
    <h2 class="text-xl font-bold mb-2">Users List</h2>
    <ul class="list-disc list-inside">
        @foreach ($users as $u)
            <li>{{ $u->name }} - {{ $u->email }}</li>
        @endforeach
    </ul>
</div>

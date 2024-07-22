<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>TodoApp</title>
</head>

<body class="bg-gray-900">
    <div class="container mx-auto p-3 w-1/2 mt-28 rounded-lg">
        <h1 class="text-5xl font-bold mb-6 text-center text-zinc-300">Todo <span class="text-indigo-500">App</span></h1>

        <form action="{{ route('app.store') }}" method="POST"
            class="flex justify-center items-center rounded-lg bg-stone-800 py-3">
            @csrf
            {{-- <label for="task">Label</label> --}}
            <input class="border rounded-md w-5/6 p-2 mx-1" type="text" id="search" name="task"
                placeholder="Add Task" />
            <button class="bg-green-700 p-2 rounded font-bold text-zinc-100 w-20">Add</button>
        </form>
        <form action="{{ route('app.search') }}" method="GET"
            class="flex justify-center items-center mt-3 rounded-lg bg-stone-800 py-3">
            <input class="border rounded-md w-5/6 p-2 mr-1" type="text" id="search" name="search"
                placeholder="Search..." />
            <button type="submit" class="bg-indigo-500 p-2 rounded font-bold text-zinc-100 w-20">Search</button>
        </form>

        <ul class="my-1">
            @foreach ($todos as $todo)
                <li class=" bg-slate-200 rounded-3xl mb-1 p-2">
                    <div class="font-semibold flex items-center p-1">
                        <input type="checkbox" name="todo{{ $todo->id }}" id="todo{{ $todo->id }}"
                            class="peer checked:bg-green-600 checked:rounded-full">
                        <label for="todo{{ $todo->id }}"
                            class="ml-3 line-through-bold peer-[:checked]:line-through peer-[:checked]:text-slate-600">
                            {{ $todo->task }}
                        </label>
                        {{-- </div> --}}
                        {{-- <div class="my-auto border-black flex "> --}}
                        {{-- <form action="{{ route('app.index') }}">
                                <button class="flex-none" type="submit" id="btn"><svg
                                    class="w-[24px] h-[24px] text-green-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                                </button>
                            </form> --}}
                        {{-- <button class="mx-2 peer-[:checked]:hidden border border-black" type="submit"><svg
                                class="w-[24px] h-[24px] text-amber-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                    clip-rule="evenodd" />
                            </svg>
                                </button> --}}
                        <form action="{{ route('app.destroy', $todo->id) }}" method="post" class="ml-auto mr-1 mt-1 ">
                            @csrf
                            @method('DELETE')
                            <button class="ml-2"><svg class="w-[24px] h-[24px] text-red-500 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </button>
                        </form>

                        {{-- <div class="font-semibold text-green-700 display" id="teks">
                            Completed!
                        </div> --}}

                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>

</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('travel.create') }}">New Travel</a>
                    <br>
                    <br>

                    <div class="travels">
                        @foreach ($travels as $travel)
                            <div class="travel">
                                <h2>{{ $travel->title }}</h2>
                                <p>{{ Str::limit($travel->description, 100) }}</p>
                                <div>
                                    <a href="{{ route('travel.show', $travel) }}">View</a>
                                    <a href="{{ route('travel.edit', $travel) }}">Edit</a>
                                    <form action="{{ route('travel.destroy', $travel) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    {{ $travels->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="travel">
                        <h1>Show</h1>
                        <form action="" method="POST">
                            <input type="text" name="" id="" value="{{$travel->title}}" disabled class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <textarea class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" name="" id="" cols="30" rows="10" disabled>{{$travel->description}}</textarea>
                            <div>
                                <a href="{{ route('travel.index')}}">index</a>
                                <a href="{{ route('travel.edit', $travel)}}">Edit</a>
                                <a href="">Delete</a>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
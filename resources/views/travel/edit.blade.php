<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="travel">
                        <h1>Edit</h1>
                        <form action="{{ route('travel.update', $travel)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" id="title" value="{{$travel->title}}"   class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <textarea class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" name="description" id="description" cols="30" rows="10" >{{$travel->description}}</textarea>
                            <div>
                                <a href="{{ route('travel.index')}}">index</a>
                                <a href="{{ route('travel.show', $travel)}}">Show</a>
                                <button type="submit">Submit</button>
                            </div>
                        </form>                     
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
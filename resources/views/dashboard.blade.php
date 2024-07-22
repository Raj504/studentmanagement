<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ __("You're logged in!") }}</h3>
                    <p class="mb-6">Welcome back! Explore the student management system to manage and track student details efficiently.</p>
                    
                    <a href="{{ route('student.management') }}">
                        <button class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-700 hover:to-blue-900 text-black font-bold py-2 px-4 rounded shadow-md transform hover:scale-105 transition-transform duration-300">
                            Continue to Student Management
                        </button>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-700 hover:from-red-700 hover:to-red-900 text-white font-bold py-2 px-4 rounded shadow-md transform hover:scale-105 transition-transform duration-300">
                            Logout
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

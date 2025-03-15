@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down">Dashboard</h1>

    <!-- Stats Cards (Dark Mode) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Employees -->
        <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800 transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-xl font-semibold text-gray-300 mb-2">Total Employees</h2>
            <p class="text-3xl font-bold text-blue-400">{{ $totalEmployees }}</p>
            <p class="text-gray-400 text-sm mt-1">+5% from last month</p>
        </div>
        
        <!-- Active Employees -->
        <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800 transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-xl font-semibold text-gray-300 mb-2">Active Employees</h2>
            <p class="text-3xl font-bold text-green-400">{{ $activeEmployees }}</p>
            <p class="text-gray-400 text-sm mt-1">+10% from last month</p>
        </div>
        
        <!-- On Leave -->
        <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800 transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="300">
            <h2 class="text-xl font-semibold text-gray-300 mb-2">On Leave</h2>
            <p class="text-3xl font-bold text-yellow-400">{{ $onLeaveEmployees }}</p>
            <p class="text-gray-400 text-sm mt-1">-2% from last month</p>
        </div>
    </div>


   <!-- Employee Table (Dark Mode) -->
    <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800" data-aos="fade-up" data-aos-delay="400">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg border border-gray-700">
                <thead>
                    <tr class="text-left bg-gray-700 border-b border-gray-600 text-gray-300">
                        <th class="px-6 py-3 font-semibold">Name</th>
                        <th class="px-6 py-3 font-semibold">Position</th>
                        <th class="px-6 py-3 font-semibold">Department</th>
                        <th class="px-6 py-3 font-semibold">Status</th>
                        <th class="px-6 py-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @foreach($employees as $employee)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300 ease-in-out" data-aos="fade-right" data-aos-delay="{{ $loop->index * 50 }}">
                            <td class="px-6 py-4">{{ $employee->name }}</td>
                            <td class="px-6 py-4">{{ $employee->position }}</td>
                            <td class="px-6 py-4">{{ $employee->department }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm font-semibold rounded-full
                                    {{ $employee->status == 'Active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $employee->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex space-x-4">
                                <!-- Edit Link -->
                                <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-400 hover:text-blue-300 transition duration-200">Edit</a>
                            
                                <!-- Delete Link -->
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 transition duration-200">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        AOS.init({
            duration: 1000, // Animation duration in milliseconds
            easing: 'ease-in-out', // Easing type
            once: true, // Whether animation should happen only once
        });
    </script>
@endsection
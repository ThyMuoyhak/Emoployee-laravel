@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-up" data-aos-duration="1000">Reports</h1>

    <!-- Generate Report Button -->
    <div class="mb-6" data-aos="fade-up" data-aos-duration="1200">
        <a href="{{ route('reports.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Generate Report
        </a>
    </div>

    <!-- Reports Table -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1400">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 rounded-lg">
                <thead>
                    <tr class="text-left border-b border-gray-600" data-aos="fade-up" data-aos-duration="1500">
                        <th class="px-4 py-3">Report Name</th>
                        <th class="px-4 py-3">Generated By</th>
                        <th class="px-4 py-3">Date Generated</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr class="hover:bg-gray-600 transition duration-200" data-aos="fade-up" data-aos-duration="1600">
                            <td class="px-4 py-3">{{ $report->name }}</td>
                            <td class="px-4 py-3">{{ $report->generated_by }}</td>
                            <td class="px-4 py-3">{{ $report->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3">
                                <!-- View Report Link -->
                                <a href="{{ route('reports.show', $report->id) }}" class="text-blue-400 hover:text-blue-300 mr-2">
                                    View
                                </a>
                                
                                <!-- Edit Report Link -->
                                <a href="{{ route('reports.edit', $report->id) }}" class="text-blue-500 hover:text-blue-400 mr-2">
                                    Edit
                                </a>
                            
                                <!-- Delete Report Form -->
                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 bg-transparent border-0">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

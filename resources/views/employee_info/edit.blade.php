<!-- resources/views/employee_info/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Edit Employee Info') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <form action="{{ route('employee_info.update', $employeeInfo->info_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Employee Selection -->
                    <div class="mb-6">
                        <label for="employee_id" class="block text-sm font-medium text-gray-300">Employee</label>
                        <select name="employee_id" id="employee_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->employee_id }}" {{ old('employee_id', $employeeInfo->employee_id ?? '') == $employee->employee_id ? 'selected' : '' }}>
                                    {{ $employee->employee_fname }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department Selection -->
                    <div class="mb-6">
                        <label for="department_id" class="block text-sm font-medium text-gray-300">Department</label>
                        <select name="department_id" id="department_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                            @foreach($departments as $department)
                                <option value="{{ $department->department_id }}" {{ $employeeInfo->department_id == $department->department_id ? 'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Job Selection -->
                    <div class="mb-6">
                        <label for="job_id" class="block text-sm font-medium text-gray-300">Job</label>
                        <select name="job_id" id="job_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                            @foreach($jobs as $job)
                                <option value="{{ $job->job_id }}" {{ $employeeInfo->job_id == $job->job_id ? 'selected' : '' }}>
                                    {{ $job->job_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Performance Selection -->
                    <div class="mb-6">
                        <label for="performance_id" class="block text-sm font-medium text-gray-300">Performance</label>
                        <select name="performance_id" id="performance_id" class="w-full mt-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300">
                            <option value="">No Performance Assigned</option>
                            @foreach($performances as $performance)
                                <option value="{{ $performance->performance_id }}" {{ old('performance_id', $employeeInfo->performance_id ?? '') == $performance->performance_id ? 'selected' : '' }}>
                                    {{ $performance->performance_id }}
                                </option>
                            @endforeach
                        </select>
                        @error('performance_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
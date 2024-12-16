<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Card -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Employee Details</h1>

                <!-- Name Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Name</h2>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-400">First Name: <span
                                class="font-medium">{{ $employee->first_name }}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Middle Name: <span
                                class="font-medium">{{ $employee->middle_name }}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Last Name: <span
                                class="font-medium">{{ $employee->last_name }}</span></p>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Full Name: <span
                                class="font-semibold text-gray-800 dark:text-gray-100">{{ $employee->full_name }}</span>
                        </p>
                    </div>
                </div>
                <br><br>
                <!-- Address Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Address</h2>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-400">Address Line 1: <span class="font-medium">{{$employee->address_line_1}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Address Line 2: <span class="font-medium">{{$employee->address_line_2}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">City: <span class="font-medium">{{$employee->city}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">State: <span class="font-medium">{{$employee->state}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Postal Code: <span class="font-medium">{{$employee->postal_code}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Country: <span class="font-medium">{{$employee->country}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">Full Address: <span class="font-semibold text-gray-800 dark:text-gray-100">{{$employee->full_address}}</span></p>
                    </div>
                </div>
                <br><br>
                <!-- Contact Information Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Contact Information</h2>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-400">Email: <span class="font-medium">{{$employee->employee_email}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Contact 1: <span class="font-medium">{{$employee->contact1}}</span></p>
                        <p class="text-gray-600 dark:text-gray-400">Contact 2: <span class="font-medium">{{$employee->contact2}}</span></p>
                    </div>
                </div>
                <br><br>

                <!-- Employee ID -->
                <div>
                    <p class="text-gray-600 dark:text-gray-400">Employee ID: <span
                            class="font-semibold text-gray-800 dark:text-gray-100">{{ $employee->employee_id }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

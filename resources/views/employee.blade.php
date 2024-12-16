<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EMPLOYEE') }}
        </h2>
    </x-slot>
    <div x-data="{ selectedTab: 'info' }" class="w-full mt-13">
        <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()"
            class="flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700" role="tablist"
            aria-label="tab options">
            <button @click="selectedTab = 'info'" :aria-selected="selectedTab === 'info'"
                :tabindex="selectedTab === 'info' ? '0' : '-1'"
                :class="selectedTab === 'info' ?
                    'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' :
                    'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelInfo">Personal
                Info</button>
            <button @click="selectedTab = 'qualifications'" :aria-selected="selectedTab === 'qualifications'"
                :tabindex="selectedTab === 'qualifications' ? '0' : '-1'"
                :class="selectedTab === 'qualifications' ?
                    'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' :
                    'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                class="h-min px-4 py-2 text-sm" type="button" role="tab"
                aria-controls="tabpanelQualifications">Qualifications</button>


        </div>
        <div class="px-2 py-4 text-neutral-600 dark:text-neutral-300">
            <div x-show="selectedTab === 'info'" id="tabpanelInfo" role="tabpanel" aria-label="info">
                <b><a href="#" class="underline">Personal Info</a></b> tab is selected

                <!-- Insert the employee list here -->
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                @foreach ($employeeuser as $employees)
                                    <ul class="list-group list-group-light">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="" alt="Employee Image"
                                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ $employees->full_name }}
                                                        {{ $employees->employee_name }}</p>
                                                    <p class="fw-bold mb-1">{{ $employees->first_name }}
                                                        {{ $employees->middle_name }} {{ $employees->last_name }}</p>
                                                    <p class="text-muted mb-0">{{ $employees->contact1 }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="selectedTab === 'qualifications'" id="tabpanelQualifications" role="tabpanel"
                aria-label="qualifications">
                <b><a href="#" class="underline">Qualifications</a></b> tab is selected
            </div>
        </div>
</x-app-layout>

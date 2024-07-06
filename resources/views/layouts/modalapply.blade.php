<div x-data="{ showModal: false }">
    <div class="text-right mt-4">

        @if ($applicationStatus === 'pending')
            <button
                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                Already Applied
            </button>
        @elseif ($applicationStatus === 'hired')
            <button
                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                Hired
            </button>
        @else
            <button @click="showModal = true"
                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                Apply
            </button>
        @endif
    </div>

    <!-- Modal Content -->
    <template x-if="showModal" class="modal-wrapper">
        <div x-show="showModal" x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition-opacity ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <!-- Modal dialog -->
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 p-8 rounded-lg shadow-lg max-w-xl w-full">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Job Application</h2>
                    <!-- Close Button -->
                    <button @click="showModal = false" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                        </svg>
                    </button>
                </div>
                <!-- Modal Body (Description) -->
                <form action="{{ route('applyForJob', ['company_name' => $job->company_name, 'id' => $job->id]) }}"
                    method="POST">
                    @csrf
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" x-model="description"
                        class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{!! addslashes("Hi, I'm interested to apply for the {$job->title} position.") !!}</textarea>

                    <!-- Apply Button -->
                    <div class="mt-4 text-right">
                        <button @click="applyJob()" type="submit"
                            :disabled="{{ $applicationStatus == 'pending' ? 'true' : 'false' }}"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition duration-300 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed">
                            {{ $applicationStatus == 'pending' ? 'Already Applied' : 'Apply Now' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>

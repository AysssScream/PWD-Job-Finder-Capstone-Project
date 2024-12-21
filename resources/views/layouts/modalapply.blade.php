<div x-data="{ showModal: false, modalTitle: '', modalMessage: '', showCancelModal: false }">
    <div class="text-right mt-4">
        @if ($job->vacancy > 0)
            @if ($applicationStatus === 'pending')
                <div class="flex flex-col sm:flex-row items-center justify-end space-y-4 sm:space-y-0 sm:space-x-4">
                    <!-- Already Applied Button -->
                    <button aria-label="Pending"
                        class="w-full sm:w-auto bg-green-700 hover:bg-green-600 text-white p-3 py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        {!! __('messages.job_application.already_applied') !!}
                    </button>

                    <div x-data="{ showCancelModal: false }">
                        <!-- Cancel Application Button -->
                        <button type="button" aria-label="Cancel Application" @click="showCancelModal = true"
                            class="w-full p-3 sm:w-auto bg-red-700 hover:bg-red-600 text-white py-2 px-4 mb-4 sm:mb-0 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {!! __('messages.job_application.cancel_application') !!}
                        </button>

                        <!-- Cancel Modal -->
                        <div x-show="showCancelModal"
                            class="fixed inset-0 flex z-50 items-center justify-center bg-black bg-opacity-50"
                            @click.away="showCancelModal = false" @keydown.escape.window="showCancelModal = false"
                            style="display: none;">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 lg:w-1/2 sm:w-11/12"
                                style="max-height: 90vh;">
                                <div class="flex-1 overflow-y-auto p-6" style="max-height: calc(90vh - 140px);">
                                    <h2 class="text-2xl text-left font-bold text-gray-800 dark:text-gray-200 mb-4 mt-4">
                                        {!! __('messages.job_application.cancel_job_application') !!}</h2>
                                    <hr class="border-gray-300 dark:border-gray-600 mb-4">
                                    <div class="flex flex-col items-center mb-4">
                                        <i class="fas fa-exclamation-triangle text-red-500 text-8xl mb-2"></i>
                                        <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">
                                            {!! __('messages.job_application.confirm_cancellation') !!}</h2>
                                    </div>
                                    <p class="text-gray-600 text-center dark:text-gray-400">{!! __('messages.job_application.cancel_confirmation_message') !!}</p>
                                    <hr class="mt-2 border-gray-300 dark:border-gray-600 mb-4">

                                    <div
                                        class="flex flex-col lg:flex-row justify-end p-4 mt-4 space-y-2 lg:space-y-0 lg:space-x-2">
                                        <!-- Cancel Modal Actions -->
                                        <button @click="showCancelModal = false"
                                            class="bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600 w-full">
                                            {!! __('messages.job_application.no_keep_my_application') !!}
                                        </button>

                                        <!-- Form to cancel the application -->
                                        <form
                                            action="{{ route('applications.cancel', ['userId' => auth()->id(), 'jobId' => $job->id]) }}"
                                            method="POST" class="w-full">
                                            @csrf
                                            @method('DELETE')

                                            <button @click="showCancelModal = false"
                                                class="bg-red-500 dark:bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-600 dark:hover:bg-red-700 w-full mt-2 lg:mt-0 lg:ml-2">
                                                {!! __('messages.job_application.yes_cancel_application') !!}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($hiredCountAtSameCompany > 0)
                <!-- Informational note about current employment -->
                <div class="mb-4">
                    <p class="text-blue-600 text-sm mb-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        Note: You are currently employed by this company
                    </p>
                    <!-- Apply button -->
                    <button @click="showModal = true" aria-label="{!! __('messages.job_application.apply_for_this_job') !!}"
                        class="bg-blue-700 p-3 hover:bg-blue-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <i class="fas fa-paper-plane mr-2"></i>
                        {!! __('messages.job_application.apply_for_this_job') !!}
                    </button>
                </div>
            @elseif ($applicationStatus === 'hired')
                <!-- Already hired for this job -->
                <button aria-label="Hired"
                    class="bg-green-700 hover:bg-green-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    <i class="fas fa-check-circle mr-2"></i>
                    {!! __('messages.job_application.hired') !!}
                </button>
            @else
                <!-- Apply button -->
                <button @click="showModal = true" aria-label="{!! __('messages.job_application.apply_for_this_job') !!}"
                    class="bg-blue-700 p-3 hover:bg-blue-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                    <i class="fas fa-paper-plane mr-2"></i>
                    {!! __('messages.job_application.apply_for_this_job') !!}
                </button>
            @endif
        @else
            <!-- No vacancy -->
            <button
                class="bg-red-700 hover:bg-gray-600 text-white py-2 px-4 ml-2 rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                {!! __('messages.job_application.no_vacancy') !!}
            </button>
        @endif
    </div>

    <!-- For Applying Jobs -->
    <template x-if="showModal" class="modal-wrapper">
        <div x-show="showModal"
            class="fixed inset-0 z-50 overflow-auto bg-gray-900 bg-opacity-50 flex justify-center items-center p-6">
            <div
                class="bg-white text-black dark:bg-gray-800 dark:text-gray-200 p-8 rounded-lg shadow-lg max-w-xl w-full">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-2xl text-gray-700 dark:text-gray-200">
                        <i class="fas fa-briefcase mr-2"></i> <!-- Briefcase icon -->
                        Job Application
                    </h2>
                    <!-- Close Button -->
                    <button @click="showModal = false"
                        class="text-gray-600 dark:text-white text-2xl font-bold hover:text-gray-800 focus:outline-none">
                        X
                    </button>
                </div>
                <form action="{{ route('applyForJob', ['company_name' => $job->company_name, 'id' => $job->id]) }}"
                    method="POST">
                    @csrf
                    <label for="description"
                        class="block  font-medium text-gray-700 dark:text-gray-200">Description:</label>
                    <textarea id="description" name="description" rows="4" x-model="description" aria-label="{!! addslashes("Hi, I'm interested to apply for the {$job->title} position.") !!}"
                        class="mt-1 block w-full p-2 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">{!! addslashes("Hi, I'm interested to apply for the {$job->title} position.") !!}</textarea>

                    <div class="mt-4 text-right">
                        {{-- <span class="mr-2 text-gray-700">
                            {{ $applicationStatus == 'pending' ? __('messages.job_application.already_applied') : __('messages.job_application.apply_for_this_job') }}
                        </span> --}}
                        <button @click="applyJob()" type="submit"
                            :disabled="{{ $applicationStatus == 'pending' ? 'true' : 'false' }}"
                            aria-label="{{ $applicationStatus == 'pending' ? __('messages.job_application.already_applied') : __('messages.job_application.apply_now') }}"
                            class="bg-blue-700
                                text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition duration-300
                                ease-in-out disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                            {{ $applicationStatus == 'pending' ? __('messages.job_application.already_applied') : __('messages.job_application.apply_for_this_job') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </template>
</div>

<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/layouts.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="/images/team.png" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between  ">
                            <h2 class="font-semibold  text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                <a href="{{ route('dashboard') }}" aria-label=" {!! __('messages.savedjobs.back_to_dashboard') !!}"
                                    class="text-lg  font-lg text-blue-500 hover:text-gray-700 dark:text-blue-500 dark:hover:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    {!! __('messages.savedjobs.back_to_dashboard') !!}
                                </a>
                            </h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="overflow-x-auto rounded-lg ">

                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 ">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            {!! __('messages.savedjobs.name') !!} </th>
                                        <th scope="col"
                                            class=" text-center  px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            {!! __('messages.savedjobs.title') !!} </th>
                                        </th>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            {!! __('messages.savedjobs.location') !!} </th>
                                        </th>
                                        <th scope="col"
                                            class=" text-center px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            {!! __('messages.savedjobs.action') !!} </th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-gray-200 dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach ($savedJobs as $job)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap font-medium text-center text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label=" {{ $job->company_name }}">
                                                {{ $job->company_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label=" {{ $job->title }}">
                                                {{ $job->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                                                tabindex="0" aria-label=" {{ $job->location }}">
                                                {{ $job->location }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium">

                                                <a href="{{ route('jobs.info', ['company_name' => Str::slug($job->company_name), 'id' => $job->job_id]) }}"
                                                    aria-label="{!! __('messages.savedjobs.view_job') !!}"
                                                    class="inline-flex items-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                    <i class="fas fa-briefcase mr-1"></i> {!! __('messages.savedjobs.view_job') !!}
                                                </a>
                                                <form action="{{ url('') }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" aria-label="{!! __('messages.savedjobs.delete_job') !!}"
                                                        class="ml-2 inline-flex items-center bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none focus:bg-red-700 focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                                                        <i class="fas fa-trash-alt mr-1"></i> {!! __('messages.savedjobs.delete_job') !!}
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

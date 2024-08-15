<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"
    integrity="sha512-8MHhFGF8xlJgCr5QmnV8Wmk1VB0AxFYggqtXXMtDlz0Z1WzpCF4zmnuK9HVYN3lS/DYDZ6B9P2B6GSU8+RIMUQ=="
    crossorigin="anonymous"></script>

<x-app-layout>
    <div class="py-12 ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Go Back to Dashboard') }}
                    </a>
                </div>
                @if ($type === 'disabilityoccurence')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">PWD Information of
                                PWDs</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Disability Occurence
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportDisabilityOccurence.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportDisabilityOccurence.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityOccurrences as $disabilityOccurrence => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $disabilityOccurrence }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totaldisabilityOccurences) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totaldisabilityOccurences) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($type === 'disabilitytype')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">PWD Information of
                                PWDs</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Disability Type
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportDisabilityType.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportDisabilityType.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityType as $type => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $type }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totaldisabilityType) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totaldisabilityType) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($type === 'skills')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                                Skills</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Skills
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportskills.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportskills.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @elseif ($type === 'leastskills')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number of
                                Skills</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Disability Type
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportskills.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportskills.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Skill
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Employed
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastEmployableSkills as $skill => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $skill }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totalSkillsCount) * 100, 1) }}%"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @elseif ($type === 'education')
                    <!-- Most Employable Education Levels -->
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                                Education Levels</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Education
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exporteducation.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exporteducation.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($educationLevels as $education => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $education }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @elseif ($type === 'leasteducation')
                    <div class="mt-4 mx-4">

                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number of
                                Education Levels</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Education
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exporteducation.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exporteducation.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastEmployableEducationLevels as $education => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $education }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($type === 'mostemployment')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Most Number of
                                Employment Type</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Employment Type
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportEmploymentType.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportEmploymentType.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mostEmployableEmploymentTypes as $mostemployment => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $mostemployment }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($type === 'leastemployment')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number of
                                Employment Type</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Employment Type
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportDisabilityType.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportDisabilityType.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastEmployableEmploymentTypes as $leastemployment => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $leastemployment }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($type === 'mostagesbins')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Most Number
                                of
                                Age Bins</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Age Bins
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportageBins.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportageBins.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mostCommonAges as $mostage => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $mostage }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($type === 'leastagesbins')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Least Number
                                of
                                Age Bins</h2>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                <div>
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                                        @click="open = !open">
                                        Export Age Bins
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false" x-cloak
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white text-gray-700 dark:bg-gray-700 dark:text-gray-200  ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('exportDisabilityType.csv') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                        <a href="{{ route('exportDisabilityType.pdf') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Export to PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Education Level
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            Percentage
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leastEmployableEducationLevels as $education => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $education }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span class="mr-2">
                                                        {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}
                                                    </span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                            <div style="width: {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

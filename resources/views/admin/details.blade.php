<style>
    .responsive-margin {
        margin-left: 16rem;
    }

    @media (max-width: 1024px) {

        .responsive-margin {
            margin-left: 16rem;
        }
    }

    @media (max-width: 768px) {

        .responsive-margin {
            margin-left: 3rem;
        }
    }
</style>
<x-app-layout>
    <div class="py-12 responsive-margin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-blue-500 text-lg  hover:text-blue-700  flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Go Back to Dashboard') }}
                    </a>
                </div>
                @if ($type === 'disabilityoccurence')
                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Disability Occurence
                            </h2>
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
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability Occurrence
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityOccurrences as $disabilityOccurrence => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $disabilityOccurrence }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
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

                    <div class="mt-20 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col ml-4 mb-4">
                                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4 mb-4">
                                    Other Disability Occurrences
                                </h2>
                                <p class="ml-4 text-gray-600 dark:text-gray-400">
                                    If the PWD choose "Others." Here are the following different kinds of disability
                                    occurrences:
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability Occurrence
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($otherdisabilityDetails as $otherdisabilityDetails => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $otherdisabilityDetails }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totalotherdisabilityOccurences) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totalotherdisabilityOccurences) * 100, 1) }}%"
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
                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Disability
                                Type
                            </h2>
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
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Disability Type
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            PWD Count
                                        </th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"
                                            style=" padding-left: 38px;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityType as $type => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $type }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totaldisabilityType) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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

                    <div class="mt-4 mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col  mb-4">
                                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4 mb-4">Specific
                                    Disability
                                    Type
                                </h2>
                                <p class="ml-4 text-gray-600 dark:text-gray-400">
                                    If the PWD choose a "Disability Type" Here are the following different kinds of
                                    specific disabilities
                                    they've provided:
                                </p>
                            </div>
                            <div class="relative inline-block text-left mr-4" x-data="{ open: false }">

                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-1 p-2 gap-4">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 bg-gray-100 text-left dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Specified Disability
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            PWD Count
                                        </th>
                                        <th
                                            class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disabilityDetails as $details => $count)
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $details }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                <div class="flex items-center">
                                                    <span
                                                        class="mr-2">{{ number_format(($count / $totaldisabilityDetails) * 100, 1) }}%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
                                                            <div style="width: {{ number_format(($count / $totaldisabilityDetails) * 100, 1) }}%"
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
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Skill
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employed
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $skill }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Skills</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Skill
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employed
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leastEmployableSkills as $skill => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $skill }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span
                                                class="mr-2">{{ number_format(($count / $totalSkillsCount) * 100, 1) }}%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Education Level
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educationLevels as $education => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $education }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Education Levels</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Education Level
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leastEmployableEducationLevels as $education => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $education }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalEducationLevelsCount > 0 ? number_format(($count / $totalEducationLevelsCount) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employment Type
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mostEmployableEmploymentTypes as $mostemployment => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $mostemployment }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">Least Number
                        of
                        Employment Type</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employment Type
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leastEmployableEmploymentTypes as $leastemployment => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $leastemployment }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalEmployableEmploymentTypes > 0 ? number_format(($count / $totalEmployableEmploymentTypes) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Most
                        Number
                        of
                        Age Bins</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Age Bins
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mostCommonAges as $mostage => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $mostage }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">Least
                        Number
                        of
                        Age Bins</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Age Bins
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leastCommonAges as $leastage => $count)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $leastage }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ $totalCommonAges > 0 ? number_format(($count / $totalCommonAges) * 100, 1) . '%' : '0%' }}
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
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
        @elseif($type === 'employeecount')
            <div class="mt-4 mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">
                        Top Companies for PWDs with Employee Count</h2>
                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                                Export Companies
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
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="{{ route('exportCompanies.csv') }}"
                                    class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                <a href="{{ route('exportCompanies.pdf') }}"
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
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Employer
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Count
                                </th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Percentage
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Calculate total occurrences for percentage calculations
                                $totalEmployerCounts = $employerCounts->sum();
                            @endphp
                            @foreach ($employerCounts as $employer_name => $count)
                                @php
                                    // Calculate percentage
                                    $percentage = $totalEmployerCounts > 0 ? ($count / $totalEmployerCounts) * 100 : 0;
                                @endphp
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $employer_name }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $count }}
                                    </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">
                                                {{ number_format($percentage, 1) }}%
                                            </span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
                                                    <div style="width: {{ $percentage }}%"
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
            @elseif($type === 'yearsofexperience')
                <div class="mt-4 mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4 ml-4">
                            Top Companies for PWDs with Years of Experience</h2>
                        <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center w-full rounded-md  shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true"
                                    @click="open = !open">
                                    Export Companies
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
                                    <a href="{{ route('yearsofExperience.csv') }}"
                                        class="text-gray-700 block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Export to CSV</a>
                                    <a href="{{ route('yearsofExperience.pdf') }}"
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
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Employer
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Total Years
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-lg uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        Percentage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Calculate total years for percentage calculations
                                    $totalEmployerYears = $employerYearsCounts->sum();
                                @endphp
                                @foreach ($employerYearsCounts as $employer_name => $totalYears)
                                    @php
                                        // Calculate percentage
                                        $percentage =
                                            $totalEmployerYears > 0 ? ($totalYears / $totalEmployerYears) * 100 : 0;

                                        // Round total years to nearest whole number
                                        $totalMonths = ($totalYears - floor($totalYears)) * 12; // Calculate months from decimal years
                                        $totalWholeYears = floor($totalYears); // Get the whole number of years
                                        $totalYearsFormatted = number_format($totalYears, 2); // Format years to 2 decimal places

                                    @endphp
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $employer_name }}
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            {{ $totalYearsFormatted }} years ({{ floor($totalMonths) }} months)
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <span class="mr-2">
                                                    {{ number_format($percentage, 1) }}%
                                                </span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-md flex rounded bg-blue-200">
                                                        <div style="width: {{ $percentage }}%"
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
                
                        @elseif($type === 'tophiringcompanies')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        All Hiring Companies Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('hiringCompanies.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('hiringCompanies.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalCompanyHires > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-building mr-2 text-white"></i>
                                    {{ $totalCompanyHires }} TOTAL HIRES FROM ALL COMPANIES
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Company Name
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Hired Count
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hiringCompanies as $company)
                                                @php
                                                    $percentage = $totalCompanyHires > 0 ? 
                                                        number_format(($company->hired_count / $totalCompanyHires) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company->company_name }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company->hired_count }} Hires
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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
                        @elseif($type === 'topcompaniesvacancies')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        Companies with Most Vacancies Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('companiesVacancies.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('companiesVacancies.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalVacancies > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-building mr-2 text-white"></i>
                                    {{ $totalVacancies }} TOTAL AVAILABLE VACANCIES FROM ALL COMPANIES
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Company Name
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Total Vacancies
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($companiesWithVacancies as $company)
                                                @php
                                                    $percentage = $totalVacancies > 0 ? 
                                                        number_format(($company['total_vacancies'] / $totalVacancies) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company['company_name'] }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company['total_vacancies'] }} Positions
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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
                        @elseif($type === 'topjobpostingcompanies')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        Top Companies by Job Postings Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('jobPostingCompanies.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('jobPostingCompanies.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalJobPosts > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-file-alt mr-2 text-white"></i>
                                    {{ $totalJobPosts }} TOTAL JOB POSTINGS FROM ALL COMPANIES
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Company Name
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Number of Job Posts
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobPostingCompanies as $company)
                                                @php
                                                    $percentage = $totalJobPosts > 0 ? 
                                                        number_format(($company->job_count / $totalJobPosts) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company->company_name }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $company->job_count }} Posts
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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
                        @elseif($type === 'topappliedjobs')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        Most Applied Job Positions Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('appliedJobs.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('appliedJobs.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalApplications > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-file-signature mr-2 text-white"></i>
                                    {{ $totalApplications }} TOTAL APPLICATIONS ACROSS ALL JOB POSITIONS
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Job Title
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Applications Count
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($appliedJobs as $job)
                                                @php
                                                    $percentage = $totalApplications > 0 ? 
                                                        number_format(($job['application_count'] / $totalApplications) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $job['title'] }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $job['application_count'] }} Applications
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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
                        @elseif($type === 'tophiredpositions')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        Most Hired Job Titles Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('hiredPositions.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('hiredPositions.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalPositionHires > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-briefcase mr-2 text-white"></i>
                                    {{ $totalPositionHires }} TOTAL HIRES ACROSS ALL JOB TITLES
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Job Title
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Hired Count
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hiredPositions as $position)
                                                @php
                                                    $percentage = $totalPositionHires > 0 ? 
                                                        number_format(($position['hired_count'] / $totalPositionHires) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $position['title'] }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $position['hired_count'] }} Hires
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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
                            @elseif($type === 'topvacantjobs')
                            <div class="mt-4 mx-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ml-4">
                                        Jobs with Most Vacancies Statistics
                                    </h2>
                                    <div class="relative inline-block text-left mr-4" x-data="{ open: false }">
                                        <div>
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500"
                                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                                @click="open = !open">
                                                Export Data
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                        
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('vacantJobs.exportCSV') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to CSV
                                                </a>
                                                <a href="{{ route('vacantJobs.exportPDF') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    Export to PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <h2 class="text-center text-white font-bold mb-4 p-4 ml-4 mr-4 shadow-3d 
                                    @if($totalVacancies > 0) bg-gradient-to-r from-green-500 to-green-600 
                                    @else bg-gradient-to-r from-red-500 to-red-600 @endif rounded">
                                    <i class="fas fa-door-open mr-2 text-white"></i>
                                    {{ $totalVacancies }} TOTAL AVAILABLE VACANCIES
                                </h2>
                        
                                <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-600">
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Job Title
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Company
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Vacancies
                                                </th>
                                                <th class="px-4 text-gray-500 dark:text-gray-100 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    Percentage
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vacantJobs as $job)
                                                @php
                                                    $percentage = $totalVacancies > 0 ? 
                                                        number_format(($job->vacancy / $totalVacancies) * 100, 1) : 0;
                                                @endphp
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $job->title }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $job->company_name }}
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        {{ $job->vacancy }} Positions
                                                    </td>
                                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">{{ $percentage }}%</span>
                                                            <div class="relative w-full">
                                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: {{ $percentage }}%" 
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

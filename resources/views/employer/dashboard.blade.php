<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layouts.css') }}" rel="stylesheet">
        <link rel="preload" href="/images/team.webp" as="image">
        <link href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title>Employer Dashboard</title>

    </head>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-6 lg:px-8 grid lg:gap-8  gap-4 lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg shadow-lg">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <!-- Wrapper for gradient background -->
                        <div class="w-full bg-gradient-to-r from-blue-600 to-blue-400 p-4 rounded-t-lg shadow-lg">
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="flex items-center text-white">
                                    <li class="flex items-center">
                                        <a href="#" class="text-white hover:text-gray-200">Home</a>
                                        <i class="fas fa-chevron-right mx-2 text-white"></i>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="#" class="text-white hover:text-gray-200"
                                            aria-current="page">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div
                        class="w-full h-full p-6 text-gray-900 dark:text-gray-100 rounded-lg flex flex-col justify-between">
                        @if (Auth::user()->employer->company_logo)
                            <div
                                class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden mx-auto mb-4 border-2 border-blue-700 shadow-lg">
                                <img id="imagePreview"
                                    src="{{ asset('storage/' . Auth::user()->employer->company_logo) }}"
                                    alt="Profile Picture" class="w-full h-full object-contain"
                                    onerror="this.onerror=null; this.src='{{ asset('/images/avatar.png') }}';">
                            </div>
                        @else
                            <div
                                class="w-48 h-48 md:w-40 md:h-40 sm:w-36 sm:h-36 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden mx-auto mb-4 border-2 border-blue-700 shadow-lg">
                                <img id="imagePreview" src="/images/avatar.png" alt="Profile Picture"
                                    class="w-full h-full object-contain">
                            </div>
                        @endif


                        <div class="text-center">
                            <div
                                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg custom-shadow transition-all duration-300 hover:shadow-2xl">
                                <div
                                    class="bg-gradient-to-r from-blue-600 to-blue-400 dark:from-blue-800 dark:to-blue-600 overflow-hidden sm:rounded-t-lg p-4">
                                    <h2 class="text-white text-2xl font-bold flex items-center justify-center">
                                        <i class="fas fa-building mr-3 text-3xl"></i>
                                        {{ $profile->businessname }}
                                    </h2>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-800 dark:text-gray-200 text-lg font-semibold mb-3">
                                        {{ $profile->contact_person }}</p>
                                    <div class="flex justify-center items-center space-x-4 mb-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt text-blue-500 dark:text-blue-400 mr-2"></i>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $profile->locationtype }}</p>
                                        </div>
                                        <span class="text-gray-400 dark:text-gray-500">|</span>
                                        <div class="flex items-center">
                                            <i class="fas fa-briefcase text-blue-500 dark:text-blue-400 mr-2"></i>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $profile->employertype }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('employer.profile') }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Company Profile
                                    </a>
                                </div>
                            </div>

                            <div class="mt-6">
                                <div
                                    class="w-full text-md font-medium text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg custom-shadow">
                                    <div
                                        class="bg-gradient-to-r from-blue-600 to-blue-400 dark:from-blue-800 dark:to-blue-600 p-4 rounded-t-lg">
                                        <h2 class="text-white text-xl font-bold flex items-center">
                                            <i class="fas fa-th-list mr-3"></i>
                                            Menu Items
                                        </h2>
                                    </div>

                                    <!-- Menu Items -->
                                    @php
                                        $pendingApplicationsCount = $applicant
                                            ->where('employer_id', Auth::id())
                                            ->where('status', 'pending')
                                            ->count();
                                        $menuItems = [
                                            [
                                                'route' => 'employer.profile',
                                                'icon' => 'fa-user-circle',
                                                'text' => 'Company Profile',
                                            ],
                                            [
                                                'route' => 'employer.review',
                                                'icon' => 'fa-address-card',
                                                'text' => 'Review Applicants',
                                                'notification' => $pendingApplicationsCount,
                                            ],
                                            [
                                                'route' => 'employer.reviewhired',
                                                'icon' => 'fa-user',
                                                'text' => 'Review Hired Applicants',
                                            ],
                                            [
                                                'route' => 'employer.manage',
                                                'icon' => 'fa-file-alt',
                                                'text' => 'Created Job Orders',
                                            ],
                                            [
                                                'route' => 'employer.messages',
                                                'icon' => 'fa-comments',
                                                'text' => 'Provide Feedback',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($menuItems as $item)
                                        <button type="button" onclick="window.location='{{ route($item['route']) }}'"
                                            class="flex items-center w-full px-4 py-3 font-medium text-left border-b border-gray-200 dark:border-gray-700 cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-700 dark:focus:ring-blue-500 focus:text-blue-700 dark:focus:text-blue-400 transition duration-300 ease-in-out">
                                            <i
                                                class="fas {{ $item['icon'] }} mr-3 text-blue-500 dark:text-blue-400"></i>
                                            <span class="flex-1">{{ $item['text'] }}</span>
                                            @if (isset($item['notification']) && $item['notification'] > 0)
                                                <span
                                                    class="bg-red-500 text-white text-xs font-bold rounded-full px-2 py-1 ml-2">
                                                    {{ $item['notification'] }}
                                                </span>
                                            @endif
                                            <i class="fas fa-chevron-right text-gray-400 dark:text-gray-500 ml-2"></i>
                                        </button>
                                    @endforeach

                                    <button type="button" onclick="toggleModal('modalId')"
                                        class="flex items-center w-full px-4 py-3 font-medium text-left border-b border-gray-200 dark:border-gray-700 cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-700 dark:focus:ring-blue-500 focus:text-blue-700 dark:focus:text-blue-400 transition duration-300 ease-in-out">
                                        <i class="fas fa-question-circle mr-3 text-blue-500 dark:text-blue-400"></i>
                                        <span class="flex-1">Frequently Asked Questions</span>
                                        <i class="fas fa-chevron-right text-gray-400 dark:text-gray-500"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Modal -->
                        <div id="modalId"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden p-6 z-50">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg"
                                style="max-height: 90vh; overflow-y: auto;">
                                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Frequently Asked
                                    Questions</h2>
                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">What are the benefits of
                                    hiring PWDs?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">Hiring PWDs can enhance workplace
                                    diversity and bring unique perspectives that drive innovation. PWDs often
                                    demonstrate strong problem-solving skills and resilience, valuable traits in any
                                    work environment. Businesses can also benefit from various government incentives,
                                    such as tax deductions and grants, aimed at promoting inclusive employment
                                    practices. </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">Why should employers consider
                                    hiring people with disabilities?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">Employers should consider hiring people
                                    with disabilities because these individuals are fully capable of performing job
                                    duties with the appropriate accommodations. Statistics from the 1996 Census reveal
                                    that more than one-third of Canadians with disabilities have attained some form of
                                    post-secondary education, with a significant portion holding college diplomas or
                                    university degrees, a number that continues to rise. </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">What types of jobs are
                                    suitable for people with disabilities?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">As society continues to shed historical
                                    biases, there are increasingly more job opportunities for individuals with
                                    disabilities. Regardless of the nature of their disability, people can leverage
                                    their skills to make significant contributions to the workforce. Everyone has the
                                    potential to work, and workplaces now offer a diverse range of positions for those
                                    living with disabilities. Here are some jobs that are suitable for people with
                                    disabilities:
                                    <br>
                                    <br>
                                    1. Finance: Financial institutions are major employers of individuals with
                                    disabilities, with large accounting firms like PriceWaterhouseCoopers leading the
                                    way in hiring people with disabilities.<br>
                                    <br>
                                    <br>
                                    2. Accounting: Accountants manage and review financial records, making this role
                                    ideal for those with physical disabilities due to its desk-based nature. A
                                    bachelor’s degree in accounting is required.
                                    <br>
                                    <br>
                                    3. Technology: Careers in technology suit those interested in computers and
                                    programming. They are well-suited for individuals with intellectual disabilities who
                                    prefer solitary work.
                                    <br>
                                    <br>
                                    4. Computer Support: Computer support specialists handle IT issues and can adapt to
                                    various disabilities. For instance, braille displays assist the visually impaired,
                                    while voice commands help those who are deaf.
                                    <br>
                                    <br>
                                    5. Trades: Trade jobs often involve repetitive, physical tasks that can benefit
                                    individuals with psychiatric or emotional disabilities. These roles are usually
                                    outdoor and engaging for the senses.
                                    <br>
                                    <br>
                                    6. Welding: Welders fabricate metal structures and often work alone for extended
                                    periods. This focus on the task at hand can be therapeutic for individuals with
                                    emotional or psychiatric disabilities.
                                    <br>
                                    <br>
                                    7. Carpentry: Carpenters build and repair structures, making this hands-on job
                                    suitable for those with psychiatric or emotional disabilities, as well as those who
                                    are hearing impaired.
                                    <br>
                                    <br>
                                    8. Arts: The arts offer diverse opportunities for everyone, including those with
                                    disabilities. There are roles in the arts that accommodate a wide range of
                                    abilities.
                                    <br>
                                    <br>
                                    9. Music Production: Music production, which involves recording and mixing, is ideal
                                    for visually impaired individuals, as heightened auditory skills can enhance their
                                    ability to produce great music.
                                    <br>
                                    <br>
                                    10. Performing Arts: Performing arts, including acting and stage work, offer roles
                                    for individuals with various disabilities. Actors with hearing or vision
                                    impairments, as well as those with physical or emotional disabilities, can find
                                    success and enjoyment in this field.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">What legal obligations do
                                    employers have when hiring PWDs in the Philippines?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">Employers in the Philippines are
                                    required to comply with the Magna Carta for Disabled Persons (Republic Act No.
                                    7277), which mandates non-discriminatory hiring practices and reasonable
                                    accommodations for PWDs. This includes making physical modifications to the
                                    workplace and providing necessary assistive devices or software. Employers must also
                                    ensure that PWDs are not discriminated against during the hiring process and are
                                    given equal opportunities for training and advancement. Failure to comply with these
                                    legal requirements can result in penalties and legal action. It is essential for
                                    employers to stay informed about these obligations to foster an inclusive and
                                    compliant workplace.</p>

                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">Are there incentives or
                                    support available for companies that hire PWDs?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">Yes, there are several incentives and
                                    supports available for companies that hire persons with disabilities (PWDs) under RA
                                    7277, also known as the Magna Carta for Persons with Disabilities. Private entities
                                    employing PWDs who meet the required skills or qualifications as regular employees,
                                    apprentices, or learners can benefit from a tax deduction of 25% of the total
                                    salaries and wages paid to these individuals. To qualify, employers must obtain
                                    certifications from the Department of Labor and Employment (DOLE) and the Department
                                    of Health (DOH) confirming the employment and disability status of the PWDs.
                                    Additionally, companies that enhance their physical facilities to accommodate PWDs
                                    can receive a tax deduction equivalent to 50% of the direct costs associated with
                                    these improvements. However, this incentive does not apply to modifications required
                                    under Batas Pambansa Bilang 344, the Accessibility Law. These incentives aim to
                                    encourage employers to hire and support PWDs, promoting their inclusion and
                                    employment opportunities.</p>

                                <p class="text-gray-600 dark:text-gray-300 mb-6 font-bold">How can we promote a culture
                                    of inclusivity and diversity in our organization?</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-6">Promote awareness and understanding of
                                    disability issues among employees. Offer training on inclusive practices and
                                    encourage an open dialogue about diversity. Actively seek feedback from PWD
                                    employees to improve accessibility and support.</p>

                                <button onclick="toggleModal('modalId')"
                                    class="mt-4 px-6 py-2 bg-blue-600 dark:bg-blue-700 text-white rounded-full hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-700 dark:focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                                    Close
                                </button>
                            </div>
                        </div>
                        <script>
                            function toggleModal(modalId) {
                                const modal = document.getElementById(modalId);
                                modal.classList.toggle('hidden');
                            }
                        </script>
                    </div>
                    <div class="mb-6">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg sm:col-span-2 shadow-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 rounded-lg">
                    <div class="mb-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                            <!-- Jobs Created Card -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                                <a href="{{ route('employer.manage') }}" class="block">
                                    <div
                                        class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 p-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-xl font-bold text-white">Jobs Created</h3>
                                            <i class="fas fa-briefcase text-3xl text-white opacity-75"></i>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between">
                                            <span class="text-4xl font-bold text-blue-600 dark:text-blue-400">
                                                {{ $jobs->where('employer_id', Auth::id())->count() }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-300">Total Jobs</span>
                                        </div>
                                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                            Click to view all created jobs
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Pending Applications Card -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                                <a href="{{ route('employer.review') }}" class="block">
                                    <div
                                        class="bg-gradient-to-r from-yellow-400 to-yellow-600 dark:from-yellow-500 dark:to-yellow-700 p-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-xl font-bold text-white">Pending Applications</h3>
                                            <i class="fas fa-clock text-3xl text-white opacity-75"></i>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between">
                                            <span class="text-4xl font-bold text-yellow-500 dark:text-yellow-400">
                                                {{ $applicant->where('employer_id', Auth::id())->where('status', 'pending')->count() }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-300">Awaiting
                                                Review</span>
                                        </div>
                                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                            Click to review pending applications
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Approved Applications Card -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                                <a href="{{ route('employer.reviewhired') }}" class="block">
                                    <div
                                        class="bg-gradient-to-r from-green-500 to-green-700 dark:from-green-600 dark:to-green-800 p-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-xl font-bold text-white">Approved Applications</h3>
                                            <i class="fas fa-check-circle text-3xl text-white opacity-75"></i>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between">
                                            <span class="text-4xl font-bold text-green-600 dark:text-green-400">
                                                {{ $applicant->where('employer_id', Auth::id())->where('status', 'hired')->count() }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-300">Hired
                                                Applicants</span>
                                        </div>
                                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                            Click to view approved applications
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Applications Received Chart -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Applications Received
                                </h2>
                                <select id="timeRangeSelect"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="15days" selected>Last 15 Days</option>
                                    <option value="daily">Daily (30 Days)</option>
                                    <option value="weekly">Weekly (12 Weeks)</option>
                                    <option value="monthly">Monthly (12 Months)</option>
                                </select>
                            </div>
                            <div class="h-80">
                                <canvas id="applicationsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                            Hired Applicants by Disability Type
                        </h2>
                        <div class="h-80">
                            <canvas id="hiredApplicantsChart"></canvas>
                        </div>
                    </div>
                    <div
                        class="dark:bg-gray-800 py-4 p-2 h-screen overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600 scrollbar-track-gray-100 dark:scrollbar-track-gray-700 rounded-lg">
                        <div
                            class="flex flex-col sm:flex-row items-center justify-between mb-6 bg-gradient-to-r from-blue-600 to-blue-400 dark:from-blue-800 dark:to-blue-600 shadow-lg rounded-lg p-6">
                            <h2 class="text-2xl font-bold flex items-center text-white mb-4 sm:mb-0">
                                <i class="fas fa-briefcase mr-3 text-white"></i>
                                Recently Added Jobs
                            </h2>
                            <a href="{{ route('employer.add') }}"
                                class="bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 text-white px-6 py-3 rounded-full flex items-center transition-all duration-300 transform hover:scale-105 shadow-md">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Add New Job
                            </a>
                        </div>
                        @if ($jobs->isEmpty())
                            <div
                                class="flex flex-col items-center justify-center p-8 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-inner">
                                <div class="text-center">
                                    <div class="relative inline-block mb-4">
                                        <!-- Sad face emoji -->
                                        <div class="text-6xl animate-bounce">😢</div>
                                        <!-- Animated tears -->
                                        <div
                                            class="absolute top-12 left-4 w-1 h-4 bg-blue-400 rounded-full animate-tear-fall">
                                        </div>
                                        <div
                                            class="absolute top-12 right-4 w-1 h-4 bg-blue-400 rounded-full animate-tear-fall animation-delay-300">
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Oops! No
                                        Jobs
                                        Found</h3>
                                    <p class="text-gray-600 dark:text-gray-400">It looks like there are no job listings
                                        at
                                        the moment.</p>
                                </div>
                                <a href="{{ route('employer.add') }}"
                                    class="mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Create a New Job
                                </a>
                            </div>
                            <style>
                                @keyframes tear-fall {
                                    0% {
                                        transform: translateY(0) scale(1);
                                        opacity: 0.7;
                                    }

                                    100% {
                                        transform: translateY(20px) scale(0.5);
                                        opacity: 0;
                                    }
                                }

                                .animate-tear-fall {
                                    animation: tear-fall 1.5s infinite;
                                }

                                .animation-delay-300 {
                                    animation-delay: 0.3s;
                                }
                            </style>
                        @endif
                        @foreach ($jobs as $job)
                            <div class="mb-4 transform transition duration-300 hover:scale-102 hover:shadow-lg">
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                    <div class="p-6">
                                        <div
                                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                            <div class="flex-grow">
                                                <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-white">
                                                    <i
                                                        class="fas fa-briefcase mr-2 text-blue-500 dark:text-blue-400"></i>
                                                    {{ $job->title }}
                                                </h3>
                                                <p class="text-lg text-gray-600 dark:text-gray-300 mb-2">
                                                    <span
                                                        class="inline-flex items-center bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 rounded-full px-3 py-1 text-sm font-semibold mr-2">
                                                        <i class="fas fa-clipboard-list mr-1"></i>
                                                        {{ $job->job_type }}
                                                    </span>
                                                    <span
                                                        class="inline-flex items-center bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 rounded-full px-3 py-1 text-sm font-semibold">
                                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                                        {{ $job->location }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="flex flex-col items-end mt-4 sm:mt-0">
                                                <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">
                                                    <i class="fas fa-calendar-alt mr-1"></i>
                                                    Created
                                                    {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                                </p>
                                                <a href="{{ route('employer.edit', $job->id) }}"
                                                    class="inline-block bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-semibold rounded-full px-6 py-2 transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                                                    View Details
                                                    <i class="fas fa-arrow-right ml-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal"
        class="fixed inset-0 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center"
        style="background-color: rgba(0, 0, 0, 0.7);">
        <div
            class="relative p-8 w-11/12 max-w-2xl rounded-lg shadow-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <div class="mt-3 text-center">
                <div
                    class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 dark:bg-yellow-900">
                    <i class="fas fa-exclamation-triangle text-3xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
                <h3 class="text-2xl leading-6 font-bold text-gray-900 dark:text-white mt-6 mb-4">Pending Applications
                </h3>
                <div class="mt-4 px-7 py-3">
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        You have <span id="pendingCount"
                            class="font-bold text-yellow-600 dark:text-yellow-400"></span> job applications waiting for
                        your review.
                    </p>
                </div>
                <div class="items-center px-4 py-5">
                    <a href="{{ route('employer.review') }}" id="reviewButton"
                        class="px-6 py-3 bg-yellow-500 dark:bg-yellow-600 text-white text-lg font-medium rounded-md w-full inline-block hover:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">
                        Review Applications
                    </a>
                </div>
                <button id="closeModal"
                    class="mt-4 text-base text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition duration-300 ease-in-out">
                    I'll review later
                </button>
            </div>
        </div>
    </div>



    @if (Session::has('dashboard'))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                    Z
                }
                toastr.info("{{ Session::get('dashboard') }}", 'Hello, {{ $profile->contact_person }}!', {
                    timeOut: 4000
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function isDarkMode() {
                return document.documentElement.classList.contains('dark');
            }

            function getColors() {
                return isDarkMode() ? {
                    text: 'rgba(255, 255, 255, 0.87)',
                    grid: 'rgba(255, 255, 255, 0.1)',
                    background: 'rgba(30, 41, 59, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 0.8)',
                    gradientFrom: 'rgba(59, 130, 246, 0.8)',
                    gradientTo: 'rgba(59, 130, 246, 0.2)'
                } : {
                    text: 'rgba(0, 0, 0, 0.87)',
                    grid: 'rgba(0, 0, 0, 0.1)',
                    background: 'rgba(255, 255, 255, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    gradientFrom: 'rgba(59, 130, 246, 0.8)',
                    gradientTo: 'rgba(59, 130, 246, 0.2)'
                };
            }

            function createGradient(ctx, colors) {
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, colors.gradientFrom);
                gradient.addColorStop(1, colors.gradientTo);
                return gradient;
            }

            function createCharts() {
                var colors = getColors();

                // Hired Applicants Chart
                var hiredApplicantsCtx = document.getElementById('hiredApplicantsChart').getContext('2d');
                var hiredApplicantsData = @json($hiredApplicantsData);

                var hiredApplicantsChart = new Chart(hiredApplicantsCtx, {
                    type: 'bar',
                    data: {
                        labels: hiredApplicantsData.map(item => item.disability),
                        datasets: [{
                            label: 'Number of Hired Applicants',
                            data: hiredApplicantsData.map(item => item.count),
                            backgroundColor: createGradient(hiredApplicantsCtx, colors),
                            borderColor: colors.borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    color: colors.text,
                                    font: {
                                        size: 12,
                                        family: 'Poppins' // Updated font family to Poppins
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: colors.background,
                                titleColor: colors.text,
                                bodyColor: colors.text,
                                borderColor: colors.grid,
                                borderWidth: 1,
                                cornerRadius: 5,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return `Hired: ${context.parsed.y}`;
                                    }
                                },
                                titleFont: {
                                    family: 'Poppins' // Updated font family for tooltip title
                                },
                                bodyFont: {
                                    family: 'Poppins' // Updated font family for tooltip body
                                }
                            },
                            title: {
                                display: true,
                                text: 'Hired Applicants by Disability Type',
                                color: colors.text,
                                font: {
                                    size: 16,
                                    weight: 'bold',
                                    family: 'Poppins' // Updated font family for chart title
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for Y-axis labels
                                    }
                                },
                                grid: {
                                    color: colors.grid,
                                    drawBorder: false
                                },
                                title: {
                                    display: true,
                                    text: 'Number of Applicants',
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for Y-axis title
                                    }
                                }
                            },
                            x: {
                                ticks: {
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for X-axis labels
                                    }
                                },
                                grid: {
                                    color: colors.grid,
                                    drawBorder: false
                                },
                                title: {
                                    display: true,
                                    text: 'Disability Type',
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for X-axis title
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 1500,
                            easing: 'easeInOutQuart'
                        }
                    }
                });


                // Applications Received Chart
                var applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
                var applicationData = @json($applicationData);

                var applicationsChart = new Chart(applicationsCtx, {
                    type: 'line',
                    data: {
                        labels: applicationData['15days'].dates,
                        datasets: [{
                            label: 'Applications Received',
                            data: applicationData['15days'].counts,
                            borderColor: colors.borderColor,
                            backgroundColor: createGradient(applicationsCtx, colors),
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    color: colors.text,
                                    font: {
                                        size: 12,
                                        family: 'Poppins' // Updated font family to Poppins
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: colors.background,
                                titleColor: colors.text,
                                bodyColor: colors.text,
                                borderColor: colors.grid,
                                borderWidth: 1,
                                cornerRadius: 5,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return `Applications: ${context.parsed.y}`;
                                    }
                                },
                                titleFont: {
                                    family: 'Poppins' // Updated font family for tooltip title
                                },
                                bodyFont: {
                                    family: 'Poppins' // Updated font family for tooltip body
                                }
                            },
                            title: {
                                display: true,
                                text: 'Applications Received (Last 15 Days)',
                                color: colors.text,
                                font: {
                                    size: 16,
                                    weight: 'bold',
                                    family: 'Poppins' // Updated font family for chart title
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for Y-axis labels
                                    }
                                },
                                grid: {
                                    color: colors.grid,
                                    drawBorder: false
                                },
                                title: {
                                    display: true,
                                    text: 'Number of Applications',
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for Y-axis title
                                    }
                                }
                            },
                            x: {
                                ticks: {
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for X-axis labels
                                    }
                                },
                                grid: {
                                    color: colors.grid,
                                    drawBorder: false
                                },
                                title: {
                                    display: true,
                                    text: 'Date',
                                    color: colors.text,
                                    font: {
                                        family: 'Poppins' // Updated font family for X-axis title
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 1500,
                            easing: 'easeInOutQuart'
                        }
                    }
                });

                return {
                    hiredApplicantsChart,
                    applicationsChart
                };

            }

            let charts = createCharts();
            const applicationData = @json($applicationData);

            // Time range selector
            document.getElementById('timeRangeSelect').addEventListener('change', function() {
                var selectedRange = this.value;
                charts.applicationsChart.data.labels = applicationData[selectedRange].dates;
                charts.applicationsChart.data.datasets[0].data = applicationData[selectedRange].counts;

                // Update chart title
                var chartTitle = 'Applications Received';
                switch (selectedRange) {
                    case '15days':
                        chartTitle += ' (Last 15 Days)';
                        break;
                    case 'daily':
                        chartTitle += ' (Daily - 30 Days)';
                        break;
                    case 'weekly':
                        chartTitle += ' (Weekly - 12 Weeks)';
                        break;
                    case 'monthly':
                        chartTitle += ' (Monthly - 12 Months)';
                        break;
                }
                charts.applicationsChart.options.plugins.title.text = chartTitle;
                charts.applicationsChart.update();
            });

            function updateCharts() {
                const colors = getColors();

                // Destroy existing charts
                charts.hiredApplicantsChart.destroy();
                charts.applicationsChart.destroy();

                // Recreate charts with new colors
                charts = createCharts();
            }

            // Listen for dark mode changes
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        updateCharts();
                    }
                });
            });

            observer.observe(document.documentElement, {
                attributes: true
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const pendingCount = {{ $pendingApplicationsCount }};
            const notificationModal = document.getElementById('notificationModal');
            const closeModal = document.getElementById('closeModal');
            const pendingCountElement = document.getElementById('pendingCount');
            const reviewButton = document.getElementById('reviewButton');

            function showModal() {
                notificationModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }

            function hideModal() {
                notificationModal.classList.add('hidden');
                document.body.style.overflow = ''; // Re-enable scrolling
            }

            if ({{ $showNotification ? 'true' : 'false' }}) {
                pendingCountElement.textContent = pendingCount;
                showModal();

                // Disable all interactive elements outside the modal
                document.querySelectorAll('a, button, input, select, textarea').forEach(el => {
                    if (!notificationModal.contains(el)) {
                        el.setAttribute('tabindex', '-1');
                        el.setAttribute('aria-hidden', 'true');
                    }
                });
            }

            closeModal.addEventListener('click', function() {
                hideModal();
                // Re-enable all interactive elements
                document.querySelectorAll('a, button, input, select, textarea').forEach(el => {
                    el.removeAttribute('tabindex');
                    el.removeAttribute('aria-hidden');
                });
            });

            reviewButton.addEventListener('click', function(e) {
                e.preventDefault();
                hideModal();
                window.location.href = this.href;
            });

            // Prevent closing modal by clicking outside
            notificationModal.addEventListener('click', function(e) {
                if (e.target === notificationModal) {
                    e.stopPropagation();
                }
            });
        });
    </script>


</x-app-layout>


<style>
    .centered-shadow {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
    }

    .clock-icon {
        color: orange;
    }


    .custom-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0.4, 0.2), 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .custom-shadow:hover {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.08);
    }
</style>

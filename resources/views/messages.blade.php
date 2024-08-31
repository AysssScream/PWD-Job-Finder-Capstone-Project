<x-app-layout>
    <title>User Messages</title>

    <div class="font-poppins h-screen">
        <div class="flex flex-col md:flex-row  bg-gray-100">
            <!-- Sidebar and Email List Combined -->
            <style>
                /* Custom Scrollbar Styles */
                .messages-list::-webkit-scrollbar {
                    width: 8px;
                    /* Width of the scrollbar */
                }

                .messages-list::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    /* Background of the track */
                    border-radius: 8px;
                    /* Rounded corners for the track */
                }

                .messages-list::-webkit-scrollbar-thumb {
                    background: #888;
                    /* Color of the scrollbar */
                    border-radius: 8px;
                    /* Rounded corners for the scrollbar */
                }

                .messages-list::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    /* Color of the scrollbar when hovered */
                }

                /* Scrollbar for WebKit browsers */
                #replyContainer::-webkit-scrollbar {
                    width: 12px;
                }

                /* Track */
                #replyContainer::-webkit-scrollbar-track {
                    background: transparent;
                }

                /* Handle */
                #replyContainer::-webkit-scrollbar-thumb {
                    background: #888;
                    border-radius: 10px;
                }

                /* Handle on hover */
                #replyContainer::-webkit-scrollbar-thumb:hover {
                    background: #555;
                }

                /* Dark mode styles */
                #replyContainer.dark-mode::-webkit-scrollbar-thumb {
                    background: #4a5568;
                }

                #replyContainer.dark-mode::-webkit-scrollbar-thumb:hover {
                    background: #2c5282;
                }

                /* Firefox scrollbar styling */
                #replyContainer {
                    scrollbar-width: thin;
                    scrollbar-color: #888 transparent;
                }

                #replyContainer.dark-mode {
                    scrollbar-color: #4a5568 transparent;
                }
            </style>

            <div
                class="w-full md:w-1/3 lg:w-1/4 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 border-r border-gray-400 flex flex-col ">
                <!-- Fixed top section -->
                <div class="flex-none">
                    <!-- Go Back Button -->
                    @if (Auth::user()->account_verification_status == 'declined' && Auth::user()->usertype == 'user')
                        <div class="p-4 border-b border-gray-400">
                            <a href="{{ route('pendingapproval') }}"
                                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-600 transition duration-200 flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Go Back
                            </a>
                        </div>
                    @else
                        <div class="p-4 border-b border-gray-400">
                            <a href="{{ route('dashboard') }}"
                                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-600 transition duration-200 flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Go Back
                            </a>
                        </div>
                    @endif

                    <div class="p-4 border-b border-gray-400">
                        <button id="composeButton"
                            class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-600 transition duration-200 flex items-center justify-center">
                            <i class="fas fa-pen mr-2"></i>
                            Compose
                        </button>
                    </div>


                    <!-- Modal -->
                    <div id="composeModal" class="fixed z-10 inset-0 overflow-y-auto hidden"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div
                            class="flex items-center justify-center min-h-screen px-4 py-6 text-center sm:block sm:p-0">
                            <!-- Modal backdrop -->
                            <div class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity" aria-hidden="true">
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>

                            <!-- Modal panel -->
                            <div
                                class="inline-block align-bottom bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div
                                    class="bg-white text-gray-900 mr-4 dark:bg-gray-900 dark:text-gray-200 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-gray-200"
                                                id="modal-title">
                                                Compose Message
                                            </h3>
                                            <div class="mt-2">
                                                <form action="{{ route('user.messages.store') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="to"
                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">To:</label>
                                                        <div class="relative">
                                                            <input type="text" id="to" name="to"
                                                                placeholder="Enter recipient's email"
                                                                class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                                                autocomplete="off" value="pdad@gmail.com" r>
                                                            <div id="suggestions"
                                                                class="absolute left-0 right-0 mt-1 max-h-40 overflow-y-auto border border-gray-300 bg-white dark:bg-gray-900 rounded-md shadow-lg z-10 hidden">
                                                                <!-- Suggestions will be inserted here by JavaScript -->
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="mb-4">
                                                        <label for="subject"
                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Subject:</label>
                                                        <input type="text" id="subject" name="subject"
                                                            placeholder="Enter subject"
                                                            class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="message"
                                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Message:</label>
                                                        <textarea id="message" name="message" rows="6" placeholder="Type your message here" maxlength="1200"
                                                            class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"></textarea>
                                                        <div id="charCount"
                                                            class="text-sm mt-1 text-gray-500 dark:text-gray-400">
                                                            <span id="currentCharCount">0</span> / <span
                                                                id="maxCharCount">1200</span> characters
                                                        </div>
                                                    </div>

                                                    <script>
                                                        // JavaScript to update the character count
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const textarea = document.getElementById('message');
                                                            const currentCharCount = document.getElementById('currentCharCount');
                                                            const maxCharCount = document.getElementById('maxCharCount');
                                                            const maxLength = textarea.getAttribute('maxlength');

                                                            textarea.addEventListener('input', function() {
                                                                const charCount = textarea.value.length;
                                                                currentCharCount.textContent = charCount;
                                                            });

                                                            // Initialize character count on page load
                                                            currentCharCount.textContent = textarea.value.length;
                                                            maxCharCount.textContent = maxLength;
                                                        });
                                                    </script>

                                                    <div class="flex items-center justify-between">
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                            <svg class="w-5 h-5 mr-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                            </svg>
                                                            Send
                                                        </button>
                                                        <button type="button" id="cancelCompose"
                                                            class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const input = document.getElementById('to');
                            const suggestionsContainer = document.getElementById('suggestions');
                            const users = @json($users->pluck('email')); // Pass the email list from your server-side

                            input.addEventListener('input', function() {
                                const value = input.value.toLowerCase();
                                suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                                if (value) {
                                    const filteredUsers = users.filter(email => email.toLowerCase().includes(value));
                                    if (filteredUsers.length) {
                                        suggestionsContainer.classList.remove('hidden');
                                        filteredUsers.forEach(email => {
                                            const option = document.createElement('div');
                                            option.textContent = email;
                                            option.classList.add('px-4', 'py-2', 'cursor-pointer',
                                                'hover:bg-gray-100', 'dark:hover:bg-gray-800');
                                            option.addEventListener('click', function() {
                                                input.value = email;
                                                suggestionsContainer.classList.add('hidden');
                                            });
                                            suggestionsContainer.appendChild(option);
                                        });
                                    } else {
                                        suggestionsContainer.classList.add('hidden');
                                    }
                                } else {
                                    suggestionsContainer.classList.add('hidden');
                                }
                            });

                            document.addEventListener('click', function(event) {
                                if (!input.contains(event.target) && !suggestionsContainer.contains(event.target)) {
                                    suggestionsContainer.classList.add('hidden');
                                }
                            });
                        });
                    </script>


                    <!-- Main folders -->
                    <div
                        class="flex justify-between px-4 py-2 bg-gray-100 border-b border-gray-400 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                        <a href="{{ route('user.messages') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2 text-gray-700 dark:text-gray-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span class="text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">
                                Inbox
                            </span>
                        </a>

                        {{--  <button
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200  dark:hover:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2 text-gray-700 dark:text-gray-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            <span class="hidden sm:inline text-gray-700 dark:text-gray-200">Unread</span>
                        </button> --}}
                        <a href="{{ route('user.sentmessages') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2 text-gray-700 dark:text-gray-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span
                                class="hidden sm:inline text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">
                                Sent
                            </span>
                        </a>

                    </div>

                    <!-- Search Bar -->
                    <div class="p-4 border-b border-gray-400">
                        <div class="relative">
                            <input type="text" placeholder="Search mail"
                                class="w-full pl-10 pr-4 py-2 bg-white text-black dark:bg-gray-800 dark:text-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                            <svg class="w-5 h-5 text-gray-500 absolute left-3 top-3" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto">
                    @php
                        $currentRoute = Route::currentRouteName();
                    @endphp
                    <h1 class="text-2xl font-bold mb-4 p-4">
                        @if ($currentRoute == 'user.messages')
                            Messages
                        @elseif ($currentRoute == 'user.sentmessages')
                            Sent Messages
                        @else
                            Messages
                        @endif
                    </h1>
                    @if ($messages->isEmpty())
                        <div class="messages-list overflow-y-auto h-screen"> <!-- Added classes for scrollable area -->
                            <p class="text-gray-600 ml-4">No messages found.</p>
                        </div>
                    @else
                        <div class="messages-list overflow-y-auto h-screen">
                            <!-- Added classes for scrollable area -->
                            @foreach ($messages as $message)
                                <div class="email-item p-4 border-b border-gray-400 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800"
                                    data-id="{{ $message->id }}" data-from="{{ $message->from }}"
                                    data-subject="{{ $message->subject }}" data-message="{{ $message->message }}"
                                    data-created-at="{{ $message->created_at->format('g:i A') }}"
                                    data-to="{{ $message->to }}" onclick="showReplies({{ $message->id }})">

                                    <div class="flex items-center mb-1">
                                        <div
                                            class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-1">
                                            {{ substr($message->from, 0, 1) }}
                                        </div>
                                        <h3 class="font-semibold text-sm text-gray-700 dark:text-gray-200">
                                            {{ $message->from }}</h3>
                                    </div>
                                    <h4 class="text-md font-medium text-gray-700 dark:text-gray-200">
                                        {{ $message->subject }}</h4>
                                    <p class="text-sm text-gray-700 dark:text-gray-200 truncate">
                                        {{ $message->message }}</p>
                                    <span class="ml-auto text-xs text-gray-700 dark:text-gray-200">
                                        {{ $message->created_at->setTimezone('Asia/Singapore')->format('g:i A') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <div id="replyModal"
                            class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-800 bg-opacity-75">
                            <div
                                class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-xl w-full max-w-lg mx-4">
                                <div class="p-4 border-b border-gray-400 dark:border-gray-700">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Reply to Email
                                    </h3>
                                </div>
                                <div class="p-6">
                                    <form id="replyForm" action="{{ route('user.replies.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="message_id" name="message_id" value="">
                                        <div class="mb-4">
                                            <label for="replyMessage"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Message:</label>
                                            <textarea id="replyMessage" name="replyMessage" rows="4" placeholder="Type your reply here"
                                                class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"></textarea>
                                        </div>
                                        <div class="flex items-center justify-end">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                Send
                                            </button>
                                            <button type="button" id="closeModal"
                                                class="ml-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <script>
                    function showReplies(messageId) {
                        fetch(`/user/messages/${messageId}/replies`)
                            .then(response => response.json())
                            .then(data => {
                                const replyContainer = document.getElementById('replyContainer');
                                replyContainer.innerHTML = '';

                                if (data.replies.length > 0) {
                                    data.replies.forEach(reply => {
                                        const replyDiv = document.createElement('div');
                                        replyDiv.classList.add('reply', 'p-4', 'mb-2', 'bg-gray-100', 'dark:bg-gray-800',
                                            'rounded');

                                        replyDiv.innerHTML = `
                            <p class="dark:text-gray-300"><strong>Reply From:</strong> ${reply.reply_from}</p>
                            <p class="dark:text-gray-300 mt-5 mb-10"><strong>Message:</strong><br>${reply.message}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">${new Date(reply.created_at).toLocaleString()}</p>
                        `;

                                        replyContainer.appendChild(replyDiv);
                                    });
                                } else {
                                    replyContainer.innerHTML = '<p class="dark:text-gray-300">No replies found.</p>';
                                }
                            })
                            .catch(error => console.error('Error fetching replies:', error));
                    }
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const messageItems = document.querySelectorAll('.email-item');
                        const replyModal = document.getElementById('replyModal');
                        const messageIdInput = document.getElementById('message_id');
                        const closeModalButton = document.getElementById('closeModal');

                        messageItems.forEach(item => {
                            item.addEventListener('click', () => {
                                const messageId = item.getAttribute('data-id');
                                messageIdInput.value = messageId;
                            });
                        });

                        closeModalButton.addEventListener('click', () => {
                            replyModal.classList.add('hidden');
                        });
                    });
                </script>
            </div>


            <div id="emailContent"
                class=" flex-1 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 flex flex-col overflow-hidden">

                <!-- Top section with Reply button and email details -->
                <div class="p-4 border-b border-gray-400 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <!-- Email Details Section -->
                    <div class="flex-1 mb-4 sm:mb-0">
                        <h2 id="emailSubject" class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-200">
                            Select an email to view
                        </h2>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center text-sm text-gray-600">
                            <span id="emailFrom" class="mr-4 mb-1 sm:mb-0 text-gray-700 dark:text-gray-200"></span>
                            <span id="emailTo" class="text-gray-700 dark:text-gray-200">To: Me
                                &lt;me@example.com&gt;</span>
                        </div>
                    </div>
                </div>

                <!-- Email body content -->
                <div class="flex-1 overflow-hidden p-5">
                    <div id="emailBody" class="h-64 md:h-96 overflow-y-auto p-6 ">
                        <p class="mb-4">Please select an email to view its content.</p>
                    </div>

                    <button id="replyButton"
                        class="hidden inline-flex items-center px-4 ml-3 mb-5 mt-5 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                        onclick="showReplyModal()">
                        <i class="fas fa-reply w-5 h-5 mr-2"></i>
                        Reply
                    </button>


                    <div id="replyContainer"
                        class="new-content w-full  p-4 bg-gray-50 dark:bg-gray-900 rounded shadow-inner">
                        <p class="dark:text-gray-300">Please select a message to view its replies.</p>
                    </div>


                </div>


                <!-- JavaScript to handle email item click -->
                <script>
                    document.querySelectorAll('.email-item').forEach(item => {
                        item.addEventListener('click', () => {
                            const messageId = item.getAttribute('data-id');
                            const from = item.getAttribute('data-from');
                            const subject = item.getAttribute('data-subject');
                            const message = item.getAttribute('data-message');
                            const createdAt = item.getAttribute('data-created-at');
                            const to = item.getAttribute('data-to');

                            document.getElementById('emailSubject').innerText = subject;
                            document.getElementById('emailFrom').innerHTML = `From: ${from}`;
                            document.getElementById('emailTo').innerHTML = `To: ${to}`;
                            document.getElementById('emailBody').innerHTML = `<p>${message}</p>`;

                            // Show reply button and store message ID
                            const replyButton = document.getElementById('replyButton');
                            replyButton.classList.remove('hidden');
                            replyButton.setAttribute('data-message-id',
                                messageId);
                        });
                    });




                    document.getElementById('composeButton').addEventListener('click', () => {
                        document.getElementById('composeModal').classList.remove('hidden');
                    });

                    document.getElementById('cancelCompose').addEventListener('click', () => {
                        document.getElementById('composeModal').classList.add('hidden');
                    });

                    document.getElementById('replyButton').addEventListener('click', () => {
                        showReplyModal();
                    });

                    document.getElementById('closeModal').addEventListener('click', () => {
                        document.getElementById('replyModal').classList.add('hidden');
                    });

                    function showReplyModal() {
                        const messageId = replyButton.getAttribute('data-message-id'); // Get message ID from button
                        messageIdInput.value = messageId; // Set message ID in the hidden input

                        // Show modal
                        replyModal.classList.remove('hidden');
                    }
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const replyButton = document.getElementById('replyButton');
                        const replyModal = document.getElementById('replyModal');
                        const closeModal = document.getElementById('closeModal');

                        // Show modal when reply button is clicked
                        replyButton.addEventListener('click', () => {
                            replyModal.classList.remove('hidden');
                        });

                        // Hide modal when close button is clicked
                        closeModal.addEventListener('click', () => {
                            replyModal.classList.add('hidden');
                        });

                        // Optionally, hide modal when clicking outside of the modal content
                        replyModal.addEventListener('click', (e) => {
                            if (e.target === replyModal) {
                                replyModal.classList.add('hidden');
                            }
                        });
                    });
                </script>

</x-app-layout>

<x-app-layout>
    <title>Employer Messages</title>

    <div class="font-poppins h-screen">
        <div class="flex flex-col md:flex-row  bg-gray-100">
            <!-- Sidebar and Email List Combined -->
            <style>
                .messages-list::-webkit-scrollbar {
                    width: 8px;
                }

                .messages-list::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    border-radius: 8px;
                }

                .messages-list::-webkit-scrollbar-thumb {
                    background: #888;
                    border-radius: 8px;
                }

                .messages-list::-webkit-scrollbar-thumb:hover {
                    background: #555;
                }

                #replyContainer::-webkit-scrollbar {
                    width: 12px;
                }

                #replyContainer::-webkit-scrollbar-track {
                    background: transparent;
                }

                #replyContainer::-webkit-scrollbar-thumb {
                    background: #888;
                    border-radius: 10px;
                }

                #replyContainer::-webkit-scrollbar-thumb:hover {
                    background: #555;
                }

                #replyContainer.dark-mode::-webkit-scrollbar-thumb {
                    background: #4a5568;
                }

                #replyContainer.dark-mode::-webkit-scrollbar-thumb:hover {
                    background: #2c5282;
                }

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
                <div class="flex-none">
                    @if (Auth::user()->account_verification_status == 'declined' && Auth::user()->usertype == 'employer')
                        <div class="p-4 border-b-2 border-gray-400">
                            <a href="{{ route('pendingapproval') }}"
                                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-700 transition duration-200 flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Go Back
                            </a>
                        </div>
                    @else
                        <div class="p-4 border-b-2 border-gray-400">
                            <a href="{{ route('employer.dashboard') }}"
                                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-700 transition duration-200 flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Go Back
                            </a>
                        </div>
                    @endif

                    <div class="p-4 border-b-2 border-gray-400">
                        <button id="composeButton"
                            class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow hover:bg-blue-700 transition duration-200 flex items-center justify-center">
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
                                <div class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 ">
                                    <div class="sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0  sm:text-left">
                                            <div
                                                class="bg-gradient-to-r from-blue-500 to-blue-700 p-2 rounded-t-lg p-6">
                                                <h3 class="text-lg leading-6 text-white flex items-center"
                                                    id="modal-title">
                                                    <i class="fas fa-envelope mr-2"></i>
                                                    Compose Message
                                                </h3>
                                            </div>
                                            <div class="mt-2 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <form action="{{ route('employer.messages.store') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="to"
                                                            class="block text-gray-700 dark:text-gray-200 mb-1">To:</label>
                                                        <div class="relative">
                                                            <input type="text" id="to" name="to"
                                                                placeholder="Enter recipient's email"
                                                                class="w-full px-3 py-2 border border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 									focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                                                autocomplete="off" />
                                                            <div id="dropdown"
                                                                class="absolute left-0 right-0 mt-1 max-h-40 overflow-y-auto border border-gray-300 bg-white dark:bg-gray-900 rounded-md shadow-lg z-10 hidden">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="subject"
                                                            class="block text-gray-700 dark:text-gray-200 mb-1">Subject:</label>
                                                        <input type="text" id="subject" name="subject"
                                                            placeholder="Enter subject"
                                                            class="w-full px-3 py-2 border border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="message"
                                                            class="block text-gray-700 dark:text-gray-200 mb-1">Message:</label>
                                                        <textarea id="message" name="message" rows="6" placeholder="Type your message here" maxlength="1200"
                                                            class="w-full px-3 py-2 border border-gray-500 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"></textarea>
                                                        <div id="charCount"
                                                            class="mt-1 text-gray-500 dark:text-gray-400">
                                                            <span id="currentCharCount">0</span> / <span
                                                                id="maxCharCount">1200</span> characters
                                                        </div>
                                                    </div>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const textarea = document.getElementById('message');
                                                            const currentCharCount = document.getElementById('currentCharCount');
                                                            const maxCharCount = document.getElementById('maxCharCount');
                                                            const maxLength = textarea.getAttribute('maxlength');

                                                            textarea.addEventListener('input', function() {
                                                                const charCount = textarea.value.length;
                                                                currentCharCount.textContent = charCount;
                                                            });

                                                            currentCharCount.textContent = textarea.value.length;
                                                            maxCharCount.textContent = maxLength;
                                                        });
                                                    </script>

                                                    <div
                                                        class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0 sm:space-x-2">
                                                        <!-- Send Button -->
                                                        <button type="submit"
                                                            class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                            <svg class="w-5 h-5 mr-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                            </svg>
                                                            Send
                                                        </button>
                                                        <!-- Cancel Button -->
                                                        <button type="button" id="cancelCompose"
                                                            class="w-full sm:w-auto ml-0 sm:ml-2 inline-flex items-center justify-center px-4 py-2 border border-gray-500 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
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
                            const dropdown = document.getElementById('dropdown');
                            const users = @json($users); // Pass admin user emails from the server-side

                            // Function to populate dropdown
                            function populateDropdown(emails) {
                                dropdown.innerHTML = ''; // Clear previous options
                                emails.forEach(email => {
                                    const option = document.createElement('div');
                                    option.textContent = email;
                                    option.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100',
                                        'dark:hover:bg-gray-800');
                                    option.addEventListener('click', function() {
                                        selectEmail(email);
                                    });
                                    dropdown.appendChild(option);
                                });
                            }

                            input.addEventListener('focus', function() {
                                populateDropdown(users); // Populate dropdown when input is focused
                                dropdown.classList.remove('hidden'); // Show dropdown
                            });

                            document.addEventListener('click', function(event) {
                                if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                                    dropdown.classList.add('hidden'); // Hide dropdown if click is outside
                                }
                            });

                            function selectEmail(email) {
                                input.value = email; // Set the input value to the selected email
                                dropdown.classList.add('hidden'); // Hide the dropdown after selection
                            }
                        });
                    </script>



                    <!-- Main folders -->
                    <div
                        class="flex justify-between px-4 py-2 bg-gray-100 border-b-2 border-gray-400 bg- text-gray-900 dark:bg-gray-900 dark:text-gray-200">
                        <a href="{{ route('employer.messages') }}"
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


                        <a href="{{ route('employer.sentmessages') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2 text-gray-700 dark:text-gray-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span
                                class="text-gray-700 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">
                                Sent
                            </span>
                        </a>

                    </div>

                    <!-- Search Bar -->
                    <div class="p-4 border-b-2 border-gray-400">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Search mail"
                                aria-label="Search Mail"
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
                        @if ($currentRoute == 'employer.messages')
                            Messages
                        @elseif ($currentRoute == 'employer.sentmessages')
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
                            @foreach ($messages as $message)
                                <div class="email-item p-4 border-b-2 border-gray-400 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 {{ is_null($message->read_at) ? 'bg-gray-200 dark:bg-gray-700' : 'bg-gray-50 dark:bg-gray-900' }}"
                                    data-id="{{ $message->id }}" data-from="{{ $message->from }}"
                                    data-subject="{{ $message->subject }}" data-message="{{ $message->message }}"
                                    data-created-at="{{ $message->created_at->format('g:i A') }}"
                                    data-to="{{ $message->to }}"
                                    onclick="markAsRead({{ $message->id }}); showReplies({{ $message->id }}); openEditModal({{ $message->id }}, '{{ addslashes($message->message) }}'); openDeleteModal({{ $message->id }})">

                                    <div class="flex items-center mb-1">
                                        <div
                                            class="w-8 h-8 bg-blue-500 border-2 border-blue-300 rounded-full flex items-center justify-center text-white font-bold mr-1">
                                            {{ substr($message->from, 0, 1) }}
                                        </div>
                                        <h3 class="font-semibold text-blue-700 dark:text-gray-200">
                                            {{ $message->from }}
                                        </h3>

                                        <!-- Icon based on read_at status -->
                                        <span class="ml-2">
                                            <i
                                                class="fas {{ is_null($message->read_at) ? 'fa-eye-slash text-red-500' : 'fa-eye text-green-500' }}"></i>

                                        </span>
                                    </div>
                                    <h3 class="text-gray-700 dark:text-gray-200">{{ $message->subject }}</h3>
                                    <p class="text-gray-700 dark:text-gray-200 truncate">{{ $message->message }}</p>
                                    <span class="ml-auto text-xs text-gray-700 dark:text-gray-200">
                                        {{ $message->created_at->setTimezone('Asia/Singapore')->format('g:i A') }}
                                    </span>
                                </div>
                            @endforeach

                        </div>

                        <script>
                            function markAsRead(messageId) {
                                fetch(`/employer/messages/mark-as-read/${messageId}`, {
                                        method: 'PATCH', // Use PATCH or PUT depending on your route definition
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                        },
                                        body: JSON.stringify({
                                            read_at: new Date()
                                        }) // You can send additional data if necessary
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Success:', data);
                                        // Update the UI for the clicked message
                                        const messageItem = document.querySelector(`.email-item[data-id="${messageId}"]`);
                                        if (messageItem) {
                                            messageItem.classList.remove('bg-gray-200', 'dark:bg-gray-700'); // Remove the unread classes
                                            messageItem.classList.add('bg-gray-50', 'dark:bg-gray-900'); // Add the read classes

                                            // Change the icon to read icon
                                            const icon = messageItem.querySelector('i.fas');
                                            if (icon) {
                                                icon.classList.remove('fa-envelope', 'text-red-500');
                                                icon.classList.add('fa-check-circle', 'text-green-500');
                                            }
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }


                            document.getElementById('searchInput').addEventListener('input', function() {
                                const searchTerm = this.value.toLowerCase();
                                const emailItems = document.querySelectorAll('.email-item');

                                emailItems.forEach(item => {
                                    const from = item.getAttribute('data-from').toLowerCase();
                                    const subject = item.getAttribute('data-subject')
                                        .toLowerCase();
                                    const message = item.getAttribute('data-message')
                                        .toLowerCase();

                                    if (from.includes(searchTerm) || subject.includes(searchTerm) || message.includes(
                                            searchTerm)) {
                                        item.style.display = '';
                                    } else {
                                        item.style.display = 'none';
                                    }
                                });
                            });
                        </script>

                        @if (Route::currentRouteName() == 'employer.sentmessages')
                            <div id="editModal"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg  max-w-3xl w-full mx-4 sm:mx-0 overflow-auto"
                                    style="max-height: 90vh;">
                                    <div
                                        class="p-4 border-b-2 border-blue-400  bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-lg">
                                        <h3 class="text-lg font-medium text-white dark:text-gray-200">
                                            <i class="fas fa-pen mr-2"></i>
                                            Edit Message
                                        </h3>
                                    </div>
                                    <div class="p-6">
                                        <form id="editMessageForm" method="POST">
                                            @csrf
                                            @method('PATCH') <!-- Ensure this is set if you're using PATCH -->
                                            <textarea name="message" id="editMessageText" aria-label="Edit Message"
                                                class="w-full p-4 border rounded-md mb-4 bg-gray-100 text-black dark:bg-gray-900 dark:text-white" rows="8"
                                                required></textarea>
                                            <div class="flex justify-end">
                                                <button type="button" id="cancelEditButton"
                                                    class="mr-4 px-5 py-3 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none transition duration-200"
                                                    onclick="closeEditModal()">
                                                    <i class="fas fa-times mr-1"></i> Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-5 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                                                    <i class="fas fa-save mr-1"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="deleteModal"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 max-w-sm mx-4 sm:mx-0 overflow-auto"
                                    style="max-height: 90vh;">
                                    <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                                        Confirm
                                        Deletion</h3>
                                    <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to
                                        delete
                                        this
                                        message? This action cannot be undone.</p>
                                    <hr class="border-gray-300 dark:border-gray-600 my-4">
                                    <div class="flex justify-end">
                                        <button id="cancelButton"
                                            class="mr-2 px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none transition duration-200"
                                            onclick="closeDeleteModal()">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </button>
                                        <button id="confirmDeleteButton"
                                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div id="replyModal"
                            class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-800 bg-opacity-75">
                            <div
                                class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-xl w-full max-w-lg mx-4 max-h-[90vh] flex flex-col">
                                <div
                                    class="p-4 border-b-2 border-blue-400  bg-gradient-to-r from-blue-500 to-blue-700">
                                    <h3 class="text-lg font-medium text-white dark:text-gray-200">
                                        <i class="fas fa-reply mr-2"></i>
                                        Reply to Email
                                    </h3>
                                </div>
                                <div class="p-6 flex-1 overflow-y-auto" style="max-height: calc(90vh - 120px);">
                                    <form id="replyForm" action="{{ route('employer.replies.store') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" id="message_id" name="message_id" value="">
                                        <div class="mb-4">
                                            <label for="replyMessage"
                                                class="block text-sm text-gray-700 dark:text-gray-200 mb-1"
                                                aria-label="Reply Message Label"></label>
                                            <textarea id="replyMessage" name="replyMessage" rows="4" placeholder="Type your reply here"
                                                class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2   focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                                aria-label="Reply Message"></textarea>
                                        </div>
                                        <div
                                            class="flex flex-col sm:flex-row items-center justify-end space-y-2 sm:space-y-0 sm:space-x-4">
                                            <!-- Send Button -->
                                            <button type="submit"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                Send
                                            </button>
                                            <!-- Cancel Button -->
                                            <button type="button" id="closeModal" onclick="closeReplyModal()"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
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
                    function openEditModal(messageId, messageContent) {
                        currentMessageId = messageId;
                        document.getElementById('editMessageText').value = messageContent;
                        document.getElementById('editMessageForm').action = "{{ url('user/messages') }}/" + messageId + "/edit";
                    }

                    function closeEditModal() {
                        document.getElementById('editModal').classList.add('hidden');
                    }

                    function openDeleteModal(id) {
                        document.getElementById('confirmDeleteButton').setAttribute('onclick', `deleteMessage(${id})`);
                    }

                    function closeDeleteModal() {
                        document.getElementById('deleteModal').classList.add('hidden');
                    }

                    function deleteMessage(messageId) {
                        fetch(`/employer/destroymessages/${messageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message === 'Message deleted successfully.') {
                                    alert('Message deleted successfully.');
                                    window.location.reload();
                                } else {
                                    alert('Failed to delete message.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while deleting the message.');
                            });
                    }

                    function showReplies(messageId) {
                        document.getElementById('actionButtons').style.display = 'block';

                        fetch(`/employer/messages/${messageId}/replies`)
                            .then(response => response.json())
                            .then(data => {
                                const replyContainer = document.getElementById('replyContainer');
                                replyContainer.innerHTML = '';

                                if (data.replies.length > 0) {
                                    data.replies.forEach(reply => {
                                        const replyDiv = document.createElement('div');
                                        replyDiv.classList.add('reply', 'mb-2', 'bg-gray-100', 'shadow-3d',
                                            'dark:bg-gray-800',
                                            'rounded-lg');

                                        replyDiv.innerHTML = `
                                            <div class=" p-4 rounded-t-lg border-b-2 border-blue-400 dark:border-gray-700 bg-gradient-to-r from-blue-500 to-blue-700">
                                                <h3 class="text-lg font-medium text-white">
                                                    <i class="fas fa-reply mr-2"></i>
                                                    Reply From: ${reply.reply_from}
                                                </h3>
                                            </div>
                                            <div class="p-4 pt-0">
                                            <p class="dark:text-gray-300 mt-5 mb-10"><br>${reply.message}</p>
                                            <p class="text-gray-700 dark:text-gray-300 text-sm">${new Date(reply.created_at).toLocaleString()}</p>
                                            </div>
                                        `;

                                        replyContainer.appendChild(replyDiv);
                                    });
                                } else {
                                    replyContainer.innerHTML =
                                        '<p class="text-blue-700 dark:text-blue-300"><i class="fas fa-comments mr-2"></i> No replies found.</p>';
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
                class="flex-1 bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 flex flex-col overflow-hidden">
                <div
                    class="p-4 border-b-2 border-gray-400 flex flex-col sm:flex-row sm:items-center sm:justify-between over">
                    <div class="flex-1 mb-4 sm:mb-0 border-2 border-blue-500 rounded-lg pt-4">
                        <h2 id="emailSubject"
                            class="text-xl font-semibold ml-4 mb-2 text-gray-700 dark:text-gray-200">
                            Select an email to view
                        </h2>
                        <div
                            class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white rounded-t-lg flex flex-col sm:flex-row items-start sm:items-center text-sm">
                            <span id="emailFrom" class="mr-4 mb-1 sm:mb-0 text-white"></span>
                            <span id="emailTo" class="text-white">To: Me &lt;me@example.com&gt;</span>
                        </div>
                    </div>

                    @if (Route::currentRouteName() == 'employer.sentmessages')
                        <div class="p-4">
                            <div id="actionButtons" class="p-4" style="display: none;">
                                <!-- Initially hidden -->
                                <div class="actionButtons">
                                    <button id="deleteButton"
                                        class="w-full top-4 right-4 bg-red-600 text-white rounded-md px-3 py-1 text-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>

                                    <button id="editButton"
                                        class="w-full mt-2 bg-blue-600 text-white rounded-md px-3 py-1 text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <script>
                        // Get elements
                        const deleteButton = document.getElementById('deleteButton');
                        const editButton = document.getElementById('editButton');
                        const deleteModal = document.getElementById('deleteModal');
                        const editModal = document.getElementById('editModal');
                        const cancelButton = document.getElementById('cancelButton');
                        const cancelEditButton = document.getElementById('cancelEditButton');
                        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
                        // const confirmEditButton = document.getElementById('confirmEditButton');

                        deleteButton.addEventListener('click', () => {
                            deleteModal.classList.remove('hidden');
                        });

                        cancelButton.addEventListener('click', () => {
                            deleteModal.classList.add('hidden');
                        });

                        confirmDeleteButton.addEventListener('click', () => {
                            console.log('Message deleted');
                            deleteModal.classList.add('hidden');
                        });

                        editButton.addEventListener('click', () => {
                            editModal.classList.remove('hidden');
                        });

                        cancelEditButton.addEventListener('click', () => {
                            editModal.classList.add('hidden');
                        });

                        // confirmEditButton.addEventListener('click', () => {
                        //     console.log('Message edited');
                        //     editModal.classList.add('hidden');
                        // });

                        function editMessage(messageId) {
                            const newMessage = document.getElementById('editMessageText').value;
                        }
                    </script>

                </div>
                <!-- Email body content -->
                <div class="flex-1 overflow-hidden p-5">
                    <div id="emailBody" class="h-64 md:h-96 overflow-y-auto p-6">
                        <p class="mb-4 text-center text-blue-600 dark:text-blue-300 flex flex-col items-center">
                            <i class="fas fa-envelope fa-4x mb-2"></i>
                            Please select an email to view its content.
                        </p>

                    </div>

                    <!-- Button Container -->
                    <div id="buttonContainer" class="flex space-x-2 mt-4 mb-4 hidden"> <!-- Initially hidden -->
                        <!-- Gmail-style Reply Button -->
                        <button id="replyButton" onclick="showReplyModal(this)"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                            <i class="fas fa-reply w-5 h-5 mr-2"></i>
                            Reply
                        </button>


                        <!-- Additional Action Button (e.g., Forward) -->
                        <button id="replytoGmailButton"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out"
                            onclick="openGmailCompose()">
                            <i class="fas fa-share w-5 h-5 mr-2"></i>
                            Reply to Gmail
                        </button>
                    </div>

                    <div id="replyContainer"
                        class="new-content w-full p-4 bg-gray-200 dark:bg-gray-700 rounded shadow-inner">
                        <div class="flex items-center">
                            <i class="fas fa-reply text-blue-700 dark:text-blue-300 mr-2"></i>
                            <p class="text-blue-700 dark:text-blue-300 ">No replies yet.</p>
                        </div>
                    </div>

                </div>
                @if (Session::has('storemessage'))
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.success("{{ Session::get('storemessage') }}", 'Message Stored.', {
                                timeOut: 5000
                            });
                        });
                    </script>
                @endif
                @if (Session::has('editmessage'))
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.success("{{ Session::get('editmessage') }}", 'Message Edited.', {
                                timeOut: 5000
                            });
                        });
                    </script>
                @endif
                @if (Session::has('destroymessage'))
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.error("{{ Session::get('destroymessage') }}", 'Message Deleted.', {
                                timeOut: 5000
                            });
                        });
                    </script>
                @endif
                @if (Session::has('storereply'))
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.success("{{ Session::get('storereply') }}", 'Message Thread Replied', {
                                timeOut: 5000
                            });
                        });
                    </script>
                @endif

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

                            // Show reply button container and store message ID
                            const replyButton = document.getElementById('replyButton');
                            const buttonContainer = document.getElementById('buttonContainer');
                            replyButton.classList.remove('hidden');
                            buttonContainer.classList.remove('hidden'); // Show the button container
                            replyButton.setAttribute('data-message-id', messageId);
                        });
                    });

                    document.getElementById('composeButton').addEventListener('click', () => {
                        document.getElementById('composeModal').classList.remove('hidden');
                    });

                    document.getElementById('cancelCompose').addEventListener('click', () => {
                        document.getElementById('composeModal').classList.add('hidden');
                    });

                    document.getElementById('closeModal').addEventListener('click', () => {
                        document.getElementById('replyModal').classList.add('hidden');
                    });

                    function showReplyModal(button) {
                        const messageId = button.getAttribute('data-message-id');
                        document.getElementById('message_id').value = messageId;
                        document.getElementById('replyModal').classList.remove('hidden');
                    }

                    function closeReplyModal() {
                        document.getElementById('replyModal').classList.add('hidden');
                    }

                    document.getElementById('replyModal').addEventListener('click', (event) => {
                        if (event.target === document.getElementById('replyModal')) {
                            closeReplyModal();
                        }
                    });

                    function openGmailCompose() {
                        const authEmail = "{{ auth()->user()->email }}"; // Get authenticated user's email
                        const subject = document.getElementById('emailSubject').innerText;
                        const from = document.getElementById('emailFrom').innerText.replace('From: ', '');
                        const to = document.getElementById('emailTo').innerText.replace('To: ',
                            ''); // Assuming you have a field for "To" as well
                        const finalTo = (to === authEmail) ? from : to; // Change to "From" if it matches
                        const message = 'Please type your message here.';
                        const gmailUrl =
                            `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(finalTo)}&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(message)}`;
                        window.open(gmailUrl, '_blank');
                    }
                </script>
</x-app-layout>

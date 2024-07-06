<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="py-12" style="font-family: 'Figtree', sans-serif;">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="lg:w-5/6">
                    <form action="submit_url" method="POST" enctype="multipart/form-data">
                        <div class="bg-white shadow-md rounded-lg mb-4">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Applicant Profile</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 1:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="textbox1" class="block mb-1">Last Name</label>
                                        <input type="text" id="lastname" name="middlename"
                                            class="w-full p-2 border rounded" required />
                                    </div>
                                    <div>
                                        <label for="textbox2" class="block mb-1">First Name</label>
                                        <input type="text" id="firstname" name="middlename"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                    <div>
                                        <label for="textbox3" class="block mb-1">Middle Name</label>
                                        <input type="text" id="middlename" name="middlename"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                    <div>
                                        <label for="suffix" class="block mb-1">Suffix</label>
                                        <select id="suffix" name="suffix" class="w-full p-2 border rounded">
                                            <option value="none">None</option>
                                            <option value="sr">SR</option>
                                            <option value="jr">JR</option>
                                            <option value="i">I</option>
                                            <option value="ii">II</option>
                                            <option value="iii">III</option>
                                            <option value="iv">IV</option>
                                            <option value="v">V</option>
                                            <option value="vi">VI</option>
                                            <option value="vii">VII</option>
                                            <option value="viii">VIII</option>
                                            <option value="ix">IX</option>
                                            <option value="x">X</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="gender" class="block mb-1">Gender</label>
                                        <select id="gender" name="gender" class="w-full p-2 border rounded">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="birthdate" class="block mb-1">Birthdate</label>
                                        <input type="date" id="birthdate" name="birthdate"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                    <div>
                                        <label for="fileUpload" class="block mb-1">Upload Profile Picture</label>
                                        <div class="relative border rounded overflow-hidden">
                                            <input type="file" id="fileUpload" name="fileUpload"
                                                class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*"
                                                onchange="showFileName()" />
                                            <button type="button" class="py-2 px-4 bg-black text-white">Choose
                                                File</button>
                                        </div>
                                        <div id="fileName" class="mt-2 text-gray-600"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Personal Information</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 2:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="civilStatus" class="block mb-1">Civil Status</label>
                                        <select id="civilStatus" name="civilStatus" class="w-full p-2 border rounded">
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widowed</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="city" class="block mb-1">City</label>
                                        <input type="text" id="city" name="city"
                                            class="w-full p-2 border rounded" list="city-list" />
                                        <datalist id="city-list"></datalist>
                                    </div>

                                    <div id="barangay-container">
                                        <label for="barangay" class="block mb-1">Barangay</label>
                                        <input type="text" id="barangay" name="barangay"
                                            class="w-full p-2 border rounded" list="barangay-list" />
                                        <datalist id="barangay-list"></datalist>
                                    </div>

                                    <div>
                                        <label for="presentAddress" class="block mb-1">Present Address</label>
                                        <input type="text" id="presentAddress" name="presentAddress"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="tin" class="block mb-1">TIN</label>
                                        <input type="text" id="tin" name="tin"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="landlineNo" class="block mb-1">Landline No.</label>
                                        <input type="text" id="landlineNo" name="landlineNo"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
                                        <input type="text" id="cellphoneNo" name="cellphoneNo"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="religion" class="block mb-1">Religion</label>
                                        <select id="religion" name="religion" class="w-full p-2 border rounded">
                                            <option value="" disabled selected>Please select...</option>
                                            <option value="romanCatholic">Roman Catholic</option>
                                            <option value="iglesiaNiCristo">Iglesia ni Cristo</option>
                                            <option value="islam">Islam</option>
                                            <option value="philippineIndependentChurch">Philippine Independent Church
                                            </option>
                                            <option value="seventhDayAdventistChurch">Seventh-day Adventist Church
                                            </option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>



                                    <div class="mt-4">
                                        <label class="block mb-2 font-semibold">Disability Status:</label>
                                        <div class="flex flex-wrap justify-start items-center">
                                            <div class="radio-group">
                                                <input type="radio" id="disability_visual" name="disability"
                                                    value="visual" class="mr-2" onchange="showTextBox()">
                                                <label for="disability_visual" class="mr-4">Visual</label>
                                            </div>

                                            <div class="radio-group">
                                                <input type="radio" id="disability_psychosocial" name="disability"
                                                    value="psychosocial" class="mr-2" onchange="showTextBox()">
                                                <label for="disability_psychosocial"
                                                    class="mr-4">Psychosocial</label>
                                            </div>

                                            <div class="radio-group">
                                                <input type="radio" id="disability_physical" name="disability"
                                                    value="physical" class="mr-2" onchange="showTextBox()">
                                                <label for="disability_physical" class="mr-4">Physical</label>
                                            </div>

                                            <div class="radio-group">
                                                <input type="radio" id="disability_hearing" name="disability"
                                                    value="hearing" class="mr-" onchange="showTextBox()">
                                                <label for="disability_hearing" class="mr-4">Hearing</label>
                                            </div>

                                            <div class="radio-group">
                                                <input type="radio" id="disability_others" name="disability"
                                                    value="others" class="mr-" onchange="showTextBox()">
                                                <label for="disability_others" class="mr-4">Others</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="disabilityTextBox" class="mt-4 hidden">
                                        <label class="block mb-2 font-semibold">Specify Disability:</label>
                                        <input type="text" id="disabilityDetails" name="disabilityDetails"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block mb-2 font-semibold">4Ps Beneficiary</label>
                                        <div class="flex items-center">
                                            <input type="radio" id="4ps-yes" name="4ps-beneficiary"
                                                value="Yes" class="mr-2">
                                            <label for="4ps-yes" class="mr-4">Yes</label>

                                            <input type="radio" id="4ps-no" name="4ps-beneficiary"
                                                value="No" class="mr-2">
                                            <label for="4ps-no" class="mr-4">No</label>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block mb-2 font-semibold">Are you a former OFW?</label>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="ofw-checkbox" name="ofw-status"
                                                class="mr-2">
                                            <label for="ofw-checkbox" class="mr-4">Yes</label>
                                        </div>
                                    </div>

                                    <div id="ofw-country-details" class="mt-2 hidden">
                                        <label for="ofw-country" class="block mb-1 font-semibold">Latest Country
                                            of
                                            Deployment</label>
                                        <input type="text" id="ofw-country" name="ofw-country"
                                            class="w-full p-2 border rounded mb-2"
                                            placeholder="Please specify the country" />
                                    </div>

                                    <div id="ofw-return-details" class="mt-2 hidden">
                                        <label for="ofw-return" class="block mb-1 font-semibold">Month and Year of
                                            Return
                                            to
                                            Philippines</label>
                                        <input type="month" id="ofw-return" name="ofw-return"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Employment Information</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 3:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="employment-status" class="block mb-1">Employment
                                            Status</label>
                                        <select id="employment-status" name="employment-status"
                                            class="w-full p-2 border rounded" onchange="toggleEmploymentOptions()">
                                            <option value="" selected disabled>Please select...</option>
                                            <option value="employed">Employed</option>
                                            <option value="unemployed">Unemployed</option>
                                        </select>
                                    </div>
                                    <!-- For Employed Only -->
                                    <div id="employed-options" style="display: none;">
                                        <label for="employed-type" class="block mb-1">Specify your
                                            Employment:</label>
                                        <select id="employed-type" name="employed-type"
                                            class="w-full p-2 border rounded">
                                            <option value="wage">Wage Employment</option>
                                            <option value="self">Self Employed</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>

                                    <!-- For Unemployed Only -->
                                    <div id="unemployed-options" style="display: none;">
                                        <label for="unemployed-type" class="block mb-1">Specify your
                                            Unemployment:</label>
                                        <select id="unemployed-type" name="unemployed-type"
                                            class="w-full p-2 border rounded">
                                            <option value="new-entrant">New Entrant/Fresh Graduate</option>
                                            <option value="finished-contract">Finished Contract</option>
                                            <option value="resigned">Resigned</option>
                                            <option value="retired">Retired</option>
                                            <option value="terminated-calamity">Terminated/Laid off due to calamity
                                            </option>
                                            <option value="terminated-local">Terminated/Laid off (Local)</option>
                                            <option value="terminated-abroad">Terminated/Laid off (abroad)</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Job Preferences</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 4:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="preferredOccupation" class="block mb-1">Preferred
                                            Occupation</label>
                                        <input type="text" id="preferredOccupation" name="preferredOccupation"
                                            class="w-full p-2 border rounded"
                                            value="{{ old('preferredOccupation') }}" />
                                    </div>

                                    <div>
                                        <label for="local-location" class="block mb-1">Preferred Work Location -
                                            Local</label>
                                        <input type="text" id="local-location" name="local-location"
                                            class="w-full p-2 border rounded" list="local-location-list" />
                                        <datalist id="local-location-list"></datalist>
                                    </div>
                                    <div>
                                        <label for="overseas-location" class="block mb-1">Preferred Work Location
                                            -
                                            Overseas</label>
                                        <input type="text" id="overseas-location" name="overseas-location"
                                            class="w-full p-2 border rounded" list="overseas-location-list" />
                                        <datalist id="overseas-location-list"></datalist>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Language/Dialects</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 5:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="language-input" class="block mb-1">Language 1:</label>
                                        <input type="text" id="language-input" name="language-input"
                                            class="w-full p-2 border rounded" list="language-list" />
                                        <datalist id="language-list"></datalist>
                                    </div>
                                    <div>
                                        <label for="language-input2" class="block mb-1">Language 2:</label>
                                        <input type="text" id="language-input2" name="language-input2"
                                            class="w-full p-2 border rounded" list="language-list2" />
                                        <datalist id="language-list2"></datalist>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Educational Background</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 6:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="educationLevel" class="block mb-1">Education Level</label>
                                        <select id="educationLevel" name="educationLevel"
                                            class="w-full p-2 border rounded" autocomplete="on" required>
                                            <option value=""selected disabled>Select Education Level...
                                            </option>
                                            <!-- Populate options dynamically from JSON data -->
                                        </select>
                                    </div>

                                    <div>
                                        <label for="school" class="block mb-1">School</label>
                                        <input type="text" id="school" name="school"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                    <div>
                                        <label for="course" class="block mb-1">Course</label>
                                        <input type="text" id="course" name="course"
                                            class="w-full p-2 border rounded" />
                                    </div>
                                    <div>
                                        <label for="yearGraduated" class="block mb-1">Year Graduated</label>
                                        <input type="number" id="yearGraduated" name="yearGraduated"
                                            class="w-full p-2 border rounded" min="1900" max="2099"
                                            placeholder="Year Graduated"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="4" />
                                    </div>


                                    <div>
                                        <label for="awards" class="block mb-1">Awards</label>
                                        <textarea id="awards" name="awards" class="w-full p-2 border rounded"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Work Experience</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 7:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="employerName" class="block mb-1">Employer Name</label>
                                        <input type="text" id="employerName" name="employerName"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="employerAddress" class="block mb-1">Address</label>
                                        <input type="text" id="employerAddress" name="employerAddress"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="positionHeld" class="block mb-1">Position Held</label>
                                        <input type="text" id="positionHeld" name="positionHeld"
                                            class="w-full p-2 border rounded" />
                                    </div>

                                    <div>
                                        <label for="fromDate" class="block mb-1">From:</label>
                                        <input type="date" id="fromDate" name="fromDate"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <div>
                                        <label for="toDate" class="block mb-1">To:</label>
                                        <input type="date" id="toDate" name="toDate"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <div class="mb-4">
                                        <label for="employmentStatus" class="block mb-1">Status:</label>
                                        <select id="employmentStatus" name="employmentStatus"
                                            class="w-full p-2 border rounded" required>
                                            <option value="" selected disabled>Select Status...</option>
                                            <option value="PERMANENT">Permanent</option>
                                            <option value="CONTRACTUAL">Contractual</option>
                                            <option value="PROBATIONARY">Probationary</option>
                                            <option value="PART-TIME">Part-Time</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Other Skills</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 8:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="autoMechanic" class="flex items-center">
                                                <input type="checkbox" id="autoMechanic" name="skills"
                                                    value="AUTO MECHANIC" class="mr-2">
                                                Auto Mechanic
                                            </label>
                                        </div>

                                        <div>
                                            <label for="gardening" class="flex items-center">
                                                <input type="checkbox" id="gardening" name="skills"
                                                    value="GARDENING" class="mr-2">
                                                Gardening
                                            </label>
                                        </div>

                                        <div>
                                            <label for="beautician" class="flex items-center">
                                                <input type="checkbox" id="beautician" name="skills"
                                                    value="BEAUTICIAN" class="mr-2">
                                                Beautician
                                            </label>
                                        </div>

                                        <div>
                                            <label for="masonry" class="flex items-center">
                                                <input type="checkbox" id="masonry" name="skills" value="MASONRY"
                                                    class="mr-2">
                                                Masonry
                                            </label>
                                        </div>

                                        <div>
                                            <label for="carpentry" class="flex items-center">
                                                <input type="checkbox" id="carpentry" name="skills"
                                                    value="CARPENTRY WORK" class="mr-2">
                                                Carpentry Work
                                            </label>
                                        </div>

                                        <div>
                                            <label for="painter" class="flex items-center">
                                                <input type="checkbox" id="painter" name="skills"
                                                    value="PAINTER/ARTIST" class="mr-2">
                                                Painter/Artist
                                            </label>
                                        </div>

                                        <div>
                                            <label for="computerLiteracy" class="flex items-center">
                                                <input type="checkbox" id="computerLiteracy" name="skills"
                                                    value="COMPUTER LITERATE" class="mr-2">
                                                Computer Literate
                                            </label>
                                        </div>

                                        <div>
                                            <label for="paintingJobs" class="flex items-center">
                                                <input type="checkbox" id="paintingJobs" name="skills"
                                                    value="PAINTING JOBS" class="mr-2">
                                                Painting Jobs
                                            </label>
                                        </div>

                                        <div>
                                            <label for="domesticChores" class="flex items-center">
                                                <input type="checkbox" id="domesticChores" name="skills"
                                                    value="DOMESTIC CHORES" class="mr-2">
                                                Domestic Chores
                                            </label>
                                        </div>

                                        <div>
                                            <label for="photography" class="flex items-center">
                                                <input type="checkbox" id="photography" name="skills"
                                                    value="PHOTOGRAPHY" class="mr-2">
                                                Photography
                                            </label>
                                        </div>

                                        <div>
                                            <label for="driving" class="flex items-center">
                                                <input type="checkbox" id="driving" name="skills" value="DRIVING"
                                                    class="mr-2">
                                                Driving
                                            </label>
                                        </div>

                                        <div>
                                            <label for="sewingDresses" class="flex items-center">
                                                <input type="checkbox" id="sewingDresses" name="skills"
                                                    value="SEWING DRESSES" class="mr-2">
                                                Sewing Dresses
                                            </label>
                                        </div>

                                        <div>
                                            <label for="electrician" class="flex items-center">
                                                <input type="checkbox" id="electrician" name="skills"
                                                    value="ELECTRICIAN" class="mr-2">
                                                Electrician
                                            </label>
                                        </div>

                                        <div>
                                            <label for="stenography" class="flex items-center">
                                                <input type="checkbox" id="stenography" name="skills"
                                                    value="STENOGRAPHY" class="mr-2">
                                                Stenography
                                            </label>
                                        </div>

                                        <div>
                                            <label for="embroidery" class="flex items-center">
                                                <input type="checkbox" id="embroidery" name="skills"
                                                    value="EMBROIDERY" class="mr-2">
                                                Embroidery
                                            </label>
                                        </div>

                                        <div>
                                            <label for="tailoring" class="flex items-center">
                                                <input type="checkbox" id="tailoring" name="skills"
                                                    value="TAILORING" class="mr-2">
                                                Tailoring
                                            </label>
                                        </div>
                                        <div>
                                            <label for="masonry" class="flex items-center">
                                                <input type="checkbox" id="masonry" name="skills" value="MASONRY"
                                                    class="mr-2">
                                                Masonry
                                            </label>
                                        </div>

                                        <div>
                                            <label for="otherSkills" class="flex items-center">
                                                <input type="checkbox" id="otherSkillsCheckbox" name="skills"
                                                    value="OTHER_SKILLS" class="mr-2" onchange="toggleTextBox()">
                                                Other:
                                            </label>
                                            <br>
                                            <input type="text" id="otherSkills" name="otherSkills"
                                                class="w-full p-2 border rounded" disabled>
                                        </div>
                                    </div>
                                    <br>



                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Certification/Authorization</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 9:</span>
                                <!-- Added Step 1 on the hard right -->
                                {{ __("You're logged in!") }}
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                    <label for="acceptTerms" class="flex items-center text-justify">
                                        <input type="checkbox" id="acceptTerms" name="acceptTerms" class="mr-4">
                                        This is to certify that all data/information that I have
                                        provided in this form are true to the best of my knowledge. This
                                        is also to authorize PDAD Mandaluyong to include my profile in
                                        the Employment Information System and use my personal
                                        information for employment facilitation.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit"
                            class="px-4 py-2 bg-black text-white rounded hover:bg-black">Submit</button>
                    </form>
                </div>
            </div>

            <br><br>
        </div>
    </div>
    </div>
</body>
<script src="{{ asset('js/registration.js') }}"></script>

</html>

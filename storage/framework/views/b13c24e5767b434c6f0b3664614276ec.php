<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Work Experience</title>
    <style>
        .border {
            border: 1px solid #ccc;
        }

        .rounded {
            border-radius: 5px;
        }

        .p-2 {
            padding: 10px;
        }

        .mt-6 {
            margin-top: 24px;
        }

        .text-red-600 {
            color: red;
        }

        .btn {
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: red;
        }

        .btn-success {
            background-color: green;
        }
    </style>
</head>

<body>
    <div id="employmentFields">
        <form id="employmenthistory" onsubmit="return handleSubmit(event)">
            <div class="mt-6">
                <label for="employerName" class="block mb-1">Employer Name</label>
                <input type="text" id="employerName" name="employerName" class="w-full p-2 border rounded"
                    placeholder="Ex. XYZ Tech Solutions" value="<?php echo e(old('employerName')); ?>" />
                <?php $__errorArgs = ['employerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Employer Address -->
            <div class="mt-6">
                <label for="employerAddress" class="block mb-1">Employer Address</label>
                <input type="text" id="employerAddress" name="employerAddress" class="w-full p-2 border rounded"
                    placeholder="Ex. Street Name, Building, House. No" value="<?php echo e(old('employerAddress')); ?>" />
                <?php $__errorArgs = ['employerAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Position Held -->
            <div class="mt-6">
                <label for="positionHeld" class="block mb-1">Position Held</label>
                <input type="text" id="positionHeld" name="positionHeld" class="w-full p-2 border rounded"
                    pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only"
                    placeholder="Ex. Web Developer" value="<?php echo e(old('positionHeld')); ?>" />
                <?php $__errorArgs = ['positionHeld'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Skills Gained -->
            <div class="mt-6">
                <label for="skillSearch" class="block mb-1">Skills Gained (Press <b>Enter</b> to Add Items)</label>
                <input type="text" id="skillSearch" name="skillSearch[]" class="w-full p-2 border rounded"
                    list="skillSuggestions" placeholder="Ex. Soft Skills, Bilingual Communication">
                <div id="skillSuggestions" class="mt-2 grid grid-cols-3 gap-2"></div>
                <?php $__errorArgs = ['skillSearch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-red-600 mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Skill Table -->
            <div class="mt-6">
                <table id="skillTable" class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-gray-200">Skills</th>
                            <th class="p-2 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="skillTableBody">
                        <!-- Skills rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>

            <!-- Hidden Input -->
            <div class="mb-4">
                <label for="hiddenInput" class="block text-sm font-medium text-black-700">Selected Skills:</label>
                <textarea id="hiddenInput" name="hiddenInput"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    readonly><?php echo e(old('hiddenInput')); ?></textarea>
            </div>

            <!-- Form Actions -->
            <div class="mt-4 d-flex justify-content-end gap-2">
                <button type="button" id="clearFormDataButton"
                    class="btn btn-danger text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Clear Records
                </button>
                <button type="submit"
                    class="btn btn-success rounded-md shadow-md hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    id="submitButton">
                    Add Work Experience
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('employmenthistory').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form values
            const employerName = document.getElementById('employerName').value;
            const employerAddress = document.getElementById('employerAddress').value;
            const positionHeld = document.getElementById('positionHeld').value;
            const skillSearch = document.getElementById('skillSearch').value;
            const hiddenInput = document.getElementById('hiddenInput');

            if (employerName && employerAddress && positionHeld && skillSearch) {
                // Update hidden input with skills
                hiddenInput.value += skillSearch + '\n';

                // Create a new row in the table
                const tableBody = document.getElementById('skillTableBody');
                const newRow = tableBody.insertRow();

                const skillCell = newRow.insertCell(0);
                skillCell.textContent = skillSearch;

                const actionsCell = newRow.insertCell(1);
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.className = 'btn btn-danger';
                deleteButton.onclick = function() {
                    tableBody.removeChild(newRow);
                };
                actionsCell.appendChild(deleteButton);

                // Clear the form fields
                document.getElementById('employerName').value = '';
                document.getElementById('employerAddress').value = '';
                document.getElementById('positionHeld').value = '';
                document.getElementById('skillSearch').value = '';

                // Manually trigger form submission after adding the row
                document.getElementById('employmenthistory').submit();
            } else {
                alert('Please fill all fields.');
            }
        });

        document.getElementById('clearFormDataButton').addEventListener('click', function() {
            document.getElementById('employmenthistory').reset();
            document.getElementById('hiddenInput').value = '';
            document.getElementById('skillTableBody').innerHTML = '';
        });



        document.addEventListener("DOMContentLoaded", function() {
            let allSkills = []; // Store all skills

            fetch("/userskills/listofskills.txt")
                .then((response) => response.text())
                .then((data) => {
                    console.log("Fetched data:", data);
                    allSkills = data
                        .split("\n")
                        .map((skill) => skill.trim().replace(/,/g, ''))
                        .filter((skill) => skill !== "");
                    console.log("All skills:", allSkills);
                })
                .catch((error) => console.error("Error fetching skills:", error));

            const skillSuggestions = document.getElementById("skillSuggestions");
            const skillSearchInput = document.getElementById("skillSearch");

            skillSearchInput.addEventListener("input", function() {
                const keyword = this.value.trim().toLowerCase();
                const matchingSkills = allSkills.filter(skill =>
                    skill.toLowerCase().includes(keyword) && skill.toLowerCase() !==
                    keyword // Exclude the currently typed skill
                );

                // Clear previous suggestions
                skillSuggestions.innerHTML = '';

                // Add matching suggestions to the div
                matchingSkills.slice(0, 9).forEach((skill) => {
                    const suggestionItem = document.createElement("div");
                    suggestionItem.textContent = skill;
                    suggestionItem.classList.add("p-2", "bg-gray-200", "rounded", "cursor-pointer",
                        "hover:bg-blue-300");
                    suggestionItem.addEventListener("click", function() {
                        skillSearchInput.value =
                            skill; // Set the input value to the clicked skill
                    });
                    skillSuggestions.appendChild(suggestionItem);
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            var skillSearch = document.getElementById('skillSearch');
            var skillTableBody = document.getElementById('skillTableBody');
            var hiddenInput = document.getElementById('hiddenInput');

            skillSearch.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission

                    var skills = skillSearch.value.split(',').map(function(skill) {
                        return skill.trim();
                    });

                    // Clear the input field
                    skillSearch.value = '';

                    // Add each skill as a new row in the table
                    skills.forEach(function(skill) {
                        if (skill && skillTableBody.rows.length < 5 && !isSkillDuplicate(skill)) {
                            var row = skillTableBody.insertRow();
                            var cell = row.insertCell();
                            cell.textContent = skill;
                            var actionCell = row.insertCell();
                            var
                                removeButton = document.createElement('button');
                            removeButton.textContent = 'Remove';
                            removeButton.type = 'button';
                            removeButton.classList.add('px-2', 'py-1', 'bg-red-500', 'text-white',
                                'rounded');
                            removeButton.addEventListener('click', function() {
                                skillTableBody.deleteRow(row.rowIndex -
                                    1);
                                updateHiddenInput();
                            });
                            actionCell.appendChild(removeButton);
                        } else if (isSkillDuplicate(skill)) { //
                            alert('Skill "' + skill + '" is already added.');
                        }
                    }); // Update hidden
                    updateHiddenInput();
                }
            }); // Function to check if a skill already

            function isSkillDuplicate(skill) {
                var rows = skillTableBody.rows;
                for (var i = 0; i <
                    rows.length; i++) {
                    var cellValue = rows[i].cells[0].textContent.trim();
                    if (cellValue.toLowerCase() === skill.toLowerCase()) {
                        return true;
                    }
                }
                return false;
            } // Function to update

            function updateHiddenInput() {
                var
                    skills = Array.from(skillTableBody.rows).map(function(row) {
                        return row.cells[0].textContent.trim();
                    }).join(', ');
                hiddenInput.value = skills;
            }
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\partials\update-workexp.blade.php ENDPATH**/ ?>
<h2 class="text-2xl font-bold mb-2" aria-label="Personal Profile">PERSONAL PROFILE</h2>
<hr class="border-bottom border-2 border-primary mb-4">

<form action="<?php echo e(route('profile.update.personal-info')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="mt-6">
        <label for="civilStatus" class="block mb-1"><?php echo e(__('messages.personal.civil_status')); ?></label>
        <select id="civilStatus" name="civilStatus" aria-label="<?php echo e(__('messages.personal.civil_status')); ?>"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
            <option value="Single" <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Single' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.single')); ?></option>
            <option value="Married"
                <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Married' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.married')); ?></option>
            <option value="Widowed"
                <?php echo e(old('civilStatus', $personal->civilStatus ?? '') == 'Widowed' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.widowed')); ?></option>
        </select>
        <?php $__errorArgs = ['civilStatus'];
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

    <div id="barangay-container" class="mt-6 relative">
        <label for="barangay" class="block mb-1"><?php echo e(__('messages.personal.barangay')); ?></label>
        <div class="flex items-center">
            <!-- Dropdown (Select) for Barangay -->
            <select id="barangay" name="barangay" aria-label="<?php echo e(__('messages.personal.barangay')); ?>"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                value="<?php echo e(old('barangay', $personal->barangay ?? '')); ?>">
            </select>
        </div>
        <!-- Error Message -->
        <div id="barangay-error" class="text-red-600 mt-1 hidden">Error fetching barangay data</div>
    </div>

    <!-- Assuming you also have a ZIP code input somewhere -->
    <div id="zipcode-container" class="mt-4">
        <label for="zipcode" class="block mb-1"><?php echo e(__('messages.personal.zipcode')); ?></label>
        <input id="zipcode" type="text" name="zipcode" value="<?php echo e(old('zipcode', $personal->zipCode ?? '')); ?>"
            placeholder="Enter Zip Code" readonly
            aria-label="<?php echo e(__('messages.personal.zipcode')); ?><?php echo e(old('zipcode', $personal->zipCode ?? '')); ?>"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
            readonly>
        <?php $__errorArgs = ['zipcode'];
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

    

    

    <div class="mt-6">
        <label for="presentAddress" class="block mb-1"><?php echo e(__('messages.personal.present_address')); ?></label>
        <input type="text" id="presentAddress" name="presentAddress"
            aria-label="<?php echo e(__('messages.personal.present_address')); ?> <?php echo e(old('presentAddress', $personal->presentAddress ?? '')); ?>"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
            placeholder="Ex. Street Name, Building, House. No"
            value="<?php echo e(old('presentAddress', $personal->presentAddress ?? '')); ?>" placeholder="" />
        <?php $__errorArgs = ['presentAddress'];
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



    <div class="mt-6">
        <div class="mt-6">
            <label for="tin"
                class="block mb-1 font-medium text-black dark:text-gray-200"><?php echo e(__('messages.personal.saved_tin')); ?></label>
            <input type="text" id="tin" name="tin" value="<?php echo e(old('tin', $personal->tin ?? '')); ?>"
                maxlength="9" aria-label="<?php echo e(__('messages.personal.saved_tin')); ?>"
                class="w-full  py-2 rounded-md border-dark shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-black dark:bg-gray-900 dark:text-gray-200 cursor-not-allowed"
                placeholder="(9 Digits)" readonly>
        </div>
    </div>



    <div class="mt-6">
        <label for="religion" class="block mb-1"><?php echo e(__('messages.personal.religion')); ?></label>
        <select id="religion" name="religion"
            aria-label="<?php echo e(__('messages.personal.religion')); ?>  <?php echo e(old('religion', $personal->religion ?? '')); ?>"
            class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
            <option value="" disabled><?php echo e(__('messages.personal.please_select')); ?></option>
            <option value="Roman Catholic"
                <?php echo e(old('religion', $personal->religion ?? '') == 'Roman Catholic' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.roman_catholic')); ?>

            </option>
            <option value="Iglesia Ni Cristo"
                <?php echo e(old('religion', $personal->religion ?? '') == 'Iglesia Ni Cristo' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.iglesia_ni_cristo')); ?>

            </option>
            <option value="Islam" <?php echo e(old('religion', $personal->religion ?? '') == 'Islam' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.islam')); ?>

            </option>
            <option value="Philippine Independent Church"
                <?php echo e(old('religion', $personal->religion ?? '') == 'Philippine Independent Church' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.philippine_independent_church')); ?>

            </option>
            <option value="Seventh Day Adventist Church"
                <?php echo e(old('religion', $personal->religion ?? '') == 'Seventh Day Adventist Church' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.seventh_day_adventist_church')); ?>

            </option>
            <option value="Others" <?php echo e(old('religion', $personal->religion ?? '') == 'Others' ? 'selected' : ''); ?>>
                <?php echo e(__('messages.personal.others')); ?>

            </option>
        </select>
        <?php $__errorArgs = ['religion'];
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

    <div>
        <div class="mt-6">
            <label for="landlineNo" class="block mb-1">Landline No.</label>
            <input type="tel" id="landlineNo" name="landlineNo" aria-label="Landline Number "
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                pattern="[0-9]+"
                title="Please enter numerical characters only"value="<?php echo e(old('landlineNo', $personal->landlineNo ?? '')); ?>"
                placeholder="89839463" maxlength="8" readonly />
            <?php $__errorArgs = ['landlineNo'];
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

        <div class="mt-6">
            <label for="cellphoneNo" class="block mb-1">Cellphone No.</label>
            <input type="tel" id="cellphoneNo" name="cellphoneNo" aria-label="Cellphone Number"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                pattern="[0-9]+" title="Please enter numerical characters only" placeholder="09673411171"
                maxlength="11" value="<?php echo e(old('cellphoneNo', $personal->cellphoneNo ?? '')); ?>" readonly />
            <?php $__errorArgs = ['cellphoneNo'];
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

        <div class="mt-6">
            <label class="block mb-2 "><?php echo e(__('messages.personal.4ps_beneficiary')); ?></label>
            <div class="flex items-center">
                <input type="radio" id="4ps-yes" name="beneficiary-4ps" value="Yes"
                    aria-label="<?php echo e(__('messages.personal.4ps_beneficiary')); ?> <?php echo e(old('beneficiary-4ps', $personal->beneficiary_4ps ?? '')); ?>"
                    class="mr-2 border  border-dark"
                    <?php echo e(old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'Yes' ? 'checked' : ''); ?>>
                <label for="4ps-yes" class="mr-4"><?php echo e(__('messages.personal.yes')); ?></label>

                <input type="radio" id="4ps-no" name="beneficiary-4ps" value="No"
                    class="mr-2 border border-dark"
                    aria-label="<?php echo e(__('messages.personal.4ps_beneficiary')); ?> <?php echo e(old('beneficiary-4ps', $personal->beneficiary_4ps ?? '')); ?>"
                    <?php echo e(old('beneficiary-4ps', $personal->beneficiary_4ps ?? '') == 'No' ? 'checked' : ''); ?>>
                <label for="4ps-no" class="mr-4"><?php echo e(__('messages.personal.no')); ?></label>
            </div>
            <?php $__errorArgs = ['beneficiary-4ps'];
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

        <div class="mt-10">
            <div class="my-4">
                <label
                    class="block mb-2 font-semibold focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="<?php echo e(__('messages.personal.former_ofw')); ?>"
                    tabindex="0"><?php echo e(__('messages.personal.former_ofw')); ?></label>

                <p class="block mb-2  focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400"
                    aria-label="<?php echo e(__('messages.personal.if_yes_provide')); ?>" tabindex="0">
                    <?php echo e(__('messages.personal.if_yes_provide')); ?></p>

                <ul class="list-disc pl-6">
                    <li aria-label="<?php echo e(__('messages.personal.latest_country_of_deployment')); ?>" tabindex="0"
                        class="
                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <?php echo e(__('messages.personal.latest_country_of_deployment')); ?></li>
                    <li aria-label="<?php echo e(__('messages.personal.return_date')); ?>" tabindex="0"
                        class="
                        focus:outline-none focus:ring-4 focus:ring-orange-400 focus:border-orange-400">
                        <?php echo e(__('messages.personal.return_date')); ?>

                    </li>
                </ul>
            </div>
        </div>

        <div id="ofw-country-details" class="mt-6">
            <label for="ofw-country"
                class="block mb-1"><?php echo e(__('messages.personal.latest_country_of_deployment')); ?></label>
            <div class="flex items-center relative">
                <!-- Dropdown (Select) for Country -->
                <select id="ofw-country" name="ofw-country"
                    class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm">
                    <option value="<?php echo e(old('ofw-country', $personal->ofw_country ?? '')); ?>">
                        <?php echo e(old('ofw-country', $personal->ofw_country ?? 'Select a Country')); ?>

                    </option>
                </select>
                <button id="editCountryButton" type="button" class="btn btn-primary ml-2"
                    aria-label="Edit">Edit</button>
            </div>
            <input type="text" id="countryLocation" name="countryLocation"
                value="<?php echo e(old('countryLocation', $personal->ofw_country ?? '')); ?>" hidden />
            <?php $__errorArgs = ['ofw-country'];
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


        <?php
            $formattedDate = $personal->ofw_return ? \Carbon\Carbon::parse($personal->ofw_return)->format('F Y') : '';
        ?>

        <div id="ofw-return-details" class="mt-6 <?php echo e(old('ofw-return') ? '' : 'disabled'); ?>">
            <label for="ofw-return" class="block mb-1"><?php echo e(__('messages.personal.month_year_return')); ?></label>

            <!-- Month-Year Picker Input -->
            <input type="month" id="ofw-return" name="ofw-return"
                aria-label="<?php echo e(__('messages.personal.month_year_return')); ?> is <?php echo e(old('ofw-return', $formattedDate ?? '')); ?>"
                class="w-full border-1 border-black dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-4 focus:border-orange-400 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-400 dark:focus:ring-orange-400 rounded-md shadow-sm"
                value="<?php echo e(old('ofw-return', $personal->ofw_return ?? '')); ?>" />

            <?php $__errorArgs = ['ofw-return'];
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

        <br>
    </div>

    <div class="flex items-center gap-4 ">
        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'mt-6','ariaLabel' => 'Save Changes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','aria-label' => 'Save Changes']); ?><?php echo e(__('Save Changes')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

        <?php if(session('status') === 'profile-updated'): ?>
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-md font-semibold text-green-400 dark:text-gray-400">
                <?php echo e(__('Saved.')); ?>

            </p>
        <?php endif; ?>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangaySelect = document.getElementById('barangay');
        const errorDiv = document.getElementById('barangay-error');
        const zipCodeInput = document.getElementById('zipcode');
        const editButton = document.getElementById('editButton');


        const savedBarangay = "<?php echo e(old('barangay', $personal->barangay ?? '')); ?>";

        let mandaluyongBarangays = [];

        // Fetch barangay data
        fetch('/locations/barangays.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mandaluyongBarangays = data.Mandaluyong;

                // Populate the dropdown
                populateBarangayDropdown(mandaluyongBarangays, savedBarangay);
            })
            .catch(error => {
                console.error('Error fetching barangay data:', error);
                errorDiv.classList.remove('hidden');
            });


        function populateBarangayDropdown(barangays, savedBarangay) {
            barangaySelect.innerHTML = '<option value="" disabled>Select A Barangay</option>'; // Default option


            barangays.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.location;
                option.textContent = barangay.location;
                option.setAttribute('data-zip', barangay.zip); // Store zip code in a data attribute
                barangaySelect.appendChild(option);
            });

            barangaySelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const zip = selectedOption.getAttribute('data-zip');
                zipCodeInput.value = zip ? zip : ''; // Set the zip code
                editButton.style.display = 'inline-block'; // Show edit button
                barangaySelect.disabled = true; // Disable dropdown after selection
            });
        }

        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default button behavior
            barangaySelect.disabled = false; // Enable the dropdown for editing
            barangaySelect.focus(); // Focus on the select field
            barangaySelect.value = ''; // Clear the selected value
            zipCodeInput.value = ''; // Clear the zip code input value
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('ofw-country');
        const editButton = document.getElementById('editCountryButton');
        const ofwLocation = document.getElementById('countryLocation');

        // Fetch country data from the JSON file
        fetch('/locations/countries.json')
            .then(response => response.json())
            .then(data => {
                const countries = data.map(countryObj => countryObj.country);

                // Populate the dropdown with country options
                countrySelect.innerHTML =
                    '<option value="" disabled selected><?php echo e($personal->ofw_country); ?></option>';
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country;
                    option.textContent = country;
                    countrySelect.appendChild(option);
                });

                // Set selected value to the saved country if available
                if (ofwLocation.value) {
                    countrySelect.value = ofwLocation.value;
                }

                // Update hidden input value on selection change
                countrySelect.addEventListener('change', function() {
                    ofwLocation.value = this.value;
                });
            })
            .catch(error => console.error('Error fetching country data:', error));

        // Edit button functionality
        editButton.addEventListener('click', function(event) {
            event.preventDefault();
            countrySelect.removeAttribute('disabled'); // Enable dropdown for editing
            countrySelect.focus(); // Focus on the select field
        });

        // Disable the select field by default if a country is already selected
        if (countrySelect.value) {
            countrySelect.setAttribute('disabled', true);
        }
    });
</script>








<style>
    .suggestion-text {
        flex: 1;
    }

    .plus-container {
        background-color: #5cb85c;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        margin-left: 8px;
    }

    .plus-container:hover {
        background-color: #4cae4c;
    }
</style>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\profile\sections\personal.blade.php ENDPATH**/ ?>
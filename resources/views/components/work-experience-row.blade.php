<!-- resources/views/components/work-experience-row.blade.php -->
<tr class="hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-gray-900">
    <td class="border-b border-gray-300 py-2 px-3">
        <form action="{{ route('workexp.destroy', $workExperience->id) }}" method="POST" style="display: inline;">
            @method('delete')
            {{ csrf_field() }}
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                {{ __('messages.workexperience.delete') }}
            </button>
        </form>
    </td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->employer_name }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->employer_address }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->position_held }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->skills }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->employment_status }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->from_date }}</td>
    <td class="border-b border-gray-300 py-2 px-3">{{ $workExperience->to_date }}</td>
</tr>

<div class="mx-auto py-4 sm:px-6 lg:px-4">
    Your mocks for {{ $team->name }} 

    <br><br>
    <table class="min-w-full" width="100%">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    id
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    method
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    templates
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    last call
                </th>
                 <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    total calls
                </th>
                <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mocks as $mock)
            <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $mock->id }}
                </td>
                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $mock->methodLabel }}
                </td>
                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $mock->templates()->latest()->first()?->id ?? 'no templates' }}
                </td>
                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $mock->lastCall }}
                </td>
                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $mock->requests->count() }}
                </td>
                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <center>
                        <a href="{{ route( 'mock-edit', [ $mock->id ] ) }}" class="text-blue-600 dark:text-blue-500 hover:underline"> Edit </a> | 
                        <a href="{{ route( 'mock-request', [ $mock->id ] ) }}" class="text-blue-600 dark:text-blue-500 hover:underline"> Request Log </a>
                    </center>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $mocks->links() }}

</div>
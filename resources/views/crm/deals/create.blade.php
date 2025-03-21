<!DOCTYPE html>
<html lang="pl">
@include('layouts.head', ['title' => 'Add new deal'])
<body class="bg-gray-100">

<div class="flex h-screen" x-data="{ sidebarOpen: false }">
    @include('layouts.sidebar')

    <div class="flex-1 flex flex-col">
        @include('layouts.header')

        <main class="flex-1 p-6 overflow-y-auto">
            <div>
                @include('layouts.flash-messages')
            </div>

            <div class="w-full bg-white shadow-md rounded-lg mb-3">
                <div class="p-6 flex justify-between items-center">
                    <p class="text-xl">Add new deal</p>
                    <a href="{{ url()->previous() }}">
                        <button class="bg-gray-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150" type="button">
                            Back
                        </button>
                    </a>
                </div>
            </div>

            <div class="w-full bg-white shadow-md rounded-lg">
                <div class="p-6">
                    <form action="{{ route('deals.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                @include('layouts.components.forms.input', [
                                    'name' => 'Name',
                                    'inputId' => 'name',
                                    'inputName' => 'name',
                                    'inputType' => 'text',
                                    'inputRequired' => true
                                ])

                                @include('layouts.components.forms.input', [
                                    'name' => 'Start date',
                                    'inputId' => 'start_time',
                                    'inputName' => 'start_time',
                                    'inputType' => 'date',
                                    'inputValue' => \Carbon\Carbon::now()->format('Y-m-d'),
                                    'inputRequired' => true
                                ])

                                @include('layouts.components.forms.input', [
                                    'name' => 'End date',
                                    'inputId' => 'end_time',
                                    'inputName' => 'end_time',
                                    'inputType' => 'date',
                                    'inputValue' => \Carbon\Carbon::now()->format('Y-m-d'),
                                    'inputRequired' => true
                                ])

                                <div class="mb-4">
                                    <label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign company</label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                            <span class="text-gray-500"><i class="fa fa-pencil"></i></span>
                                        </span>
                                        <select id="company_id" name="company_id" required
                                                class="rounded-none rounded-e-lg border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" disabled selected>Select an option</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div>

                                @include('layouts.components.forms.input', [
                                    'name' => 'Date',
                                    'inputId' => 'date',
                                    'inputName' => 'date',
                                    'inputType' => 'date',
                                    'inputRequired' => true
                                ])

                            </div>
                        </div>

                        <div class="flex justify-end border-t border-gray-200">
                            <button type="submit" class="bg-blue-500 mt-3 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add deal</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>

        @include('layouts.footer')
    </div>
</div>

</body>
</html>

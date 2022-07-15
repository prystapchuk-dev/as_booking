<x-layout>
    <x-slot name="title">
        Аккаунт партнера
    </x-slot>
<div class="min-h-full">
    <x-partner-account-header>
        <x-slot name="heading">
            Ваші помешкання
        </x-slot>
    </x-partner-account-header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <a href="{{ route('offers.create') }}" class="px-4 py-2 bg-green-600 text-white rounded">Додати житло</a>
            <div class="px-4 py-6 sm:px-0">
                <div class="p-4 border-4 border-dashed border-gray-200 rounded-lg h-96">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Назва
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Ціна
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Рейтинг
                                </th>
                                <th scope="col" class="py-3 px-6">

                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="py-4 px-6">
                                    Sliver
                                </td>
                                <td class="py-4 px-6">
                                    Laptop
                                </td>
                                <td class="py-4 px-6">
                                    $2999
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Microsoft Surface Pro
                                </th>
                                <td class="py-4 px-6">
                                    White
                                </td>
                                <td class="py-4 px-6">
                                    Laptop PC
                                </td>
                                <td class="py-4 px-6">
                                    $1999
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="py-4 px-6">
                                    Black
                                </td>
                                <td class="py-4 px-6">
                                    Accessories
                                </td>
                                <td class="py-4 px-6">
                                    $99
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Google Pixel Phone
                                </th>
                                <td class="py-4 px-6">
                                    Gray
                                </td>
                                <td class="py-4 px-6">
                                    Phone
                                </td>
                                <td class="py-4 px-6">
                                    $799
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple Watch 5
                                </th>
                                <td class="py-4 px-6">
                                    Red
                                </td>
                                <td class="py-4 px-6">
                                    Wearables
                                </td>
                                <td class="py-4 px-6">
                                    $999
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>
    </x-layout>
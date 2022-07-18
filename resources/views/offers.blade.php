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
                                    Фото
                                </th>
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
                                    <span class="sr-only">Дії</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($offers))
                                @foreach($offers as $offer)
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row" class="flex justify-start -space-x-10 relative py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                            @foreach($offer->images as $image)
                                                    <img src="{{ asset('/storage/' . $image->path )}}" class="transition ease-in-out duration-500 delay-150 hover:z-10 hover:-translate-y-2 hover:scale-150  w-16 h-16 rounded-lg border-2 border-gray-200 shadow"  alt="">
                                            @endforeach
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $offer->title }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $offer->price }}
                                        </td>
                                        <td class="py-4 px-6">
                                            н/д
                                        </td>
                                        <td class="w-6 py-4 px-6">
                                            <div class="flex items-center space-x-4">
                                                <form action="{{ route('offers.destroy', $offer) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="h-6 w-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <a href="{{ route('offers.edit', $offer) }}" class="h-6 w-6 self-start">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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

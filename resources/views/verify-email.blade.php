<x-layout>
    <x-slot name="title">
        Підтвердження email
    </x-slot>
    <div class="p-4 w-1/2 mx-auto mt-12 text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 rounded-md">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Підтвердіть будь-ласка поштову скриньку</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">
        @if (session('message'))
              <span class="font-semibold">Повторно надіслано</span>  електронного листа. Прочитайте цей лист та натисніть кнопку "Підтвердити пошту"
            @else
            На пошту вказану вами при реєстрації надіслано електронного листа. Прочитайте цей лист та натисніть кнопку "Підтвердити пошту"
        @endif
        </p>
        <div class="justify-center items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded">
                    Відправити лист повторно
                </button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-blue-500 underline">
                    Вийти
                </button>
            </form>
        </div>
    </div>

</x-layout>

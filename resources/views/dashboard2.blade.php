<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificate user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Send message user
                    <form action="{{ route('send.message') }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Type') }}*</label>
                            <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                @error('type') border-red-500 @enderror">
                                <option disabled selected>{{ __('Select Type') }}</option>
                                @foreach ($notifTypes as $type => $name)
                                    <option value="{{ $type }}">
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Title') }}*</label>
                            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('title') border-red-500 @enderror">
                        </div>

                        <div class="mb-6">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Body') }}*</label>
                            <input type="text" id="body" name="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('body') border-red-500 @enderror">
                        </div>

                        <div class="mb-6">
                            <label for="link" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Link URL') }}</label>
                            <input type="text" id="link" name="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                        </div>

                        <div class="mb-6">
                            <label for="linkText" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Link Text') }}</label>
                            <input type="text" id="linkText" name="text_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                        </div>

                        <div class="mb-6">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Enter user name') }}</label>
                            <div @error('user_id') style="border: 1px solid #ff313d; border-radius: 6px" @enderror>
                                <select style="width: 100%" class='js-data-user-ajax' name="user_id"></select>
                            </div>

                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">{{ __('Send') }}</button>

                    </form>
                </div>

            </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}" defer></script>
</x-app-layout>

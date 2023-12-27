<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('dashboard') }}"><i class="ri-arrow-left-s-line mr-3"></i></a> <i class="ri-user-fill mr-1 text-lg"></i>{{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="bg-slate-200 flex justify-center items-center py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 lg:gap-8 max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid-cols-1 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col flex-grow-0">

            <div class="flex flex-col justify-start p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg md:col-span-2 md:row-span-2">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="flex flex-col justify-start p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg md:col-span-2 md:row-span-2">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="flex justify-end">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

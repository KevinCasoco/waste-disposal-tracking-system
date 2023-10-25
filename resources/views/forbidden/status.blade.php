@extends('layouts.guest')
@section('content')

    <body class="flex min-h-screen items-center justify-center bg-gray-200">
        <div class="lg:flex lg:justify-center">
            <div class="mx-4 rounded-lg bg-white p-8 md:mx-auto md:max-w-md lg:max-w-lg">
                <div class="text-center">
                    <img src="{{ asset('image/403.jpg') }}" alt="Forbidden" class="mx-auto mb-4 w-32">
                    <h1 class="mb-4 text-2xl font-bold">Forbidden</h1>
                    <p class="text-gray-700">You don't have permission to access this page.</p>
                    <p class="text-gray-700">Please contact the administrator for assistance.</p>
                    <div class="my-5 flex justify-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-primary">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

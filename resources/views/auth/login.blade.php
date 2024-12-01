<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-slot name="title">
            <h1 class="mt-3 text-xl font-black sm:text-2xl text-slate-600">
                Financial System
            </h1>
        </x-slot>


        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="w-full space-y-7 py-2">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-slate-600 sm:text-2xl">
                    Welcome Back</h1>

                <x-validation-errors class="mb-4" />

                <div>
                    <x-inputs.label for="user_id" value="{{ __('User ID') }}" />
                    <x-inputs.text id="user_id" class="mt-1 block w-full" type="text" name="email" :value="old('user_id')"
                                   required autofocus autocomplete="username" class="py-2.5 w-full mt-2" />
                </div>

                <div>
                    <x-inputs.password name="password" label="Password" class="py-2.5 w-full mt-2" />
                </div>

                <div>
                    <label for="captcha" class="block text-sm font-medium leading-6 text-gray-900">
                        Verify Captcha
                    </label>
                    <div class="flex items-end mt-2">
                        <x-inputs.text label="Verify Captcha" type="number" id="captcha" name="captcha"
                                       class="py-2.5 w-full" required />
                        <div
                            class="captcha max-w-[110px] w-auto border rounded-md flex h-[42px] ml-2 border-gray-300 items-center justify-center">
                            {!! captcha_img() !!}
                        </div>
                    </div>
                    @if($errors->has('captcha'))
                        <p id="captcha_error_help" class="mt-2 text-xs text-red-600">
                            <span class="font-medium">Invalid Captcha</span>
                        </p>
                    @endif
                </div>


            @if (Route::has('admin.password.request'))
                    <div>
                        <a class="rounded-md text-sm text-red-500 underline hover:text-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-center">
                    <x-buttons.primary class="justify-center w-full sm:w-4/5 py-2.5">
                        {{ __('Log in') }}
                    </x-buttons.primary>
                </div>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>

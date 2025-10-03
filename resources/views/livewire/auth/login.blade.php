<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle login request
     */
    public function login(): void
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure login is not rate limited
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));
        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Throttle key
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
};
?>
{{-- col1 --}}
<div class="w-full sm:w-[80%] md:w-[70%] lg:w-[60%] mx-auto relative lg:left-[-15%] lg:top-[-10%] px-4 sm:px-6">

    <!-- Header -->
    {{-- <x-auth-header 
        :title="__('Log in to your account')" 
        :description="__('Enter your email and password below to log in')" 
    /> --}}

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <!-- Form -->
    <form wire:submit="login" class="w-full flex flex-col gap-6 mt-6">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/meemgoldlogo.png') }}" 
                 alt="Meem Gold Logo" 
                 class="w-32 sm:w-40 md:w-48 h-auto" />
        </div>

        <!-- Email Address -->
        <div class="w-full">
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email address') }}
            </label>
            <input
                wire:model="email"
                id="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                class="mt-1 block w-full rounded-lg border border-black px-3 py-2 text-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none"
            />
            @error('email') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Password -->
        <div class="w-full">
            <label for="password" class="block text-sm font-medium text-gray-700">
                {{ __('Password') }}
            </label>
            <input
                wire:model="password"
                id="password"
                type="password"
                required
                autocomplete="current-password"
                placeholder="{{ __('Password') }}"
                class="mt-1 block w-full rounded-lg border border-black px-3 py-2 text-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none"
            />
            @error('password') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="block mt-2 text-sm text-blue-600 hover:underline">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center gap-2">
            <input 
                wire:model="remember"
                id="remember"
                type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-yellow-500 focus:ring-yellow-400"
            />
            <label for="remember" class="text-sm text-gray-700">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Submit -->
        <div class="w-full">
            <button 
                type="submit" 
                class="w-full rounded-lg bg-yellow-500 px-4 py-2 text-white font-medium hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400"
            >
                {{ __('Log in') }}
            </button>
        </div>
    </form>

    {{-- Register link (optional) --}}
    {{-- 
    @if (Route::has('register'))
        <div class="text-center text-sm text-zinc-600 mt-6">
            <span>{{ __('Don\'t have an account?') }}</span>
            <a href="{{ route('register') }}" class="text-yellow-600 hover:underline">
                {{ __('Sign up') }}
            </a>
        </div>
    @endif 
    --}}
</div>

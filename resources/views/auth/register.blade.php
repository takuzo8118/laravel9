<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
               FishingSpot
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('名前')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('メールアドレス')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- パスワード -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

                <x-password-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- パスワード確認 -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('パスワード確認')" />
                {{-- ここのインプットタグも別のコンポーネントを参照 --}}
                <x-password-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- 初期値で0をコントローラーに渡す -->
            <input type="hidden" name="role" value="0"/>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('登録済みの方はこちら') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('新規登録') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

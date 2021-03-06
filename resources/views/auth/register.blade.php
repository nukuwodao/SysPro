<html class="is-transition_pc">
<x-guest-layout>
    <h2 class="login">新規登録</h2>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('ユーザ名') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" placeholder="制シス太郎" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-1">
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-1">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-1">
                <x-jet-label for="password_confirmation" value="{{ __('パスワード(確認用)') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-1">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('ログインはこちら') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('新規登録') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <div class ="pb-4"></div>
</x-guest-layout>
</html>

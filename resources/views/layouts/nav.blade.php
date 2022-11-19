<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- guestで表示されるナビゲーションメニュー -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-blue-400">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- サイトロゴ -->
                <div class=" flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- ナビゲーションリンク -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('ログイン') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>

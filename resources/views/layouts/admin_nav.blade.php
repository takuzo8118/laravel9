
{{-- このナビゲーションは新規登録とログイン画面以外は表示させない+ログインであれば、新規登録、新規登録であればログインと表示したい --}}
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex">
                <!-- サイトロゴ -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                {{-- 管理者としてログインができたらこちらを表示する --}}
                @auth
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('posts')" :active="request()->routeIs('customer')">
                            {{ __('投稿一覧表示') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                            {{ __('利用者一覧ページ') }}
                        </x-nav-link>
                    </div>
                @endauth

            <!-- 各種設定画面 -->

            </div>

            <!-- ハンバーガーメニュー -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- レスポンシブ時に展開されるメニュー -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- こちらのルーティングの処理はまだ出来上がっていないためコメントアウト -->
            {{-- <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('ダッシュボード') }}
            </x-responsive-nav-link> --}}
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                    {{ __('利用者一覧ページ') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>

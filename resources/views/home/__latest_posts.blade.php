<link rel="stylesheet" href="{{ asset('bet/latest_posts.css') }}">
<div class="latest-posts">
    <div class=" container py-8 px-4">
        <div class="wp-block-container ">
            <div class="wp-block-news-tabs">
                <section class="grid grid-cols-12 gap-6 news-grid pt-12 lg:py-12 xl:gap-8"
                    style="grid-template-rows: auto auto 1fr;" x-data="news_grid" data-bt="news-tabs-block">
                    <div class="order-2 col-span-12 gap-3 headline text-center lg:order-1"
                        data-bt="news-tabs-block-header">
                        {{-- <h2 class="text-4xl mb-4 font-bold text-green-100 lg:text-6xl">Betting News</h2> --}}
                        <div class="section-title aos-init mb-3" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="500" data-aos-easing="ease-in">
                            <h3 class="sub-title">{{ __('home.news') }}</h3>
                            <h2 class="title mb-3">{{ __('home.latest_sport_news') }}</h2>
                        </div>
                    </div>
                    <div class="order-3 col-span-12 grid grid-cols-1 gap-8 lg:order-2 lg:col-span-8 lg:row-span-2 lg:grid-cols-3 xl:col-span-9"
                        x-ref="news-grid" data-bt="news-tabs-block-tabs-content">
                        @php
                            $empty = true;
                            foreach ($posts as $post) {
                                if ($post->getAvailableLang()) {
                                    $empty = false;
                                    break;
                                }
                            }
                        @endphp
                        @if ($empty)
                            <h2 class="mt-4 text-4xl font-bold text-green-100 lg:text-gray-95 lg:mt-0 lg:text-2xl">
                                {{ __('home.no_posts') }}
                            </h2>
                        @else
                            <div class="lg:order-2 lg:col-span-2 flex flex-col gap-8">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($posts as $post)
                                    @if ($post->getAvailableLang())
                                        @php
                                            $first_post = $post->getAvailableLang();
                                        @endphp
                                        @if ($count > 0)
                                        @break;
                                    @endif
                                    <a 
                                        href="{{ route('post.detail', ['alias' => $first_post->slug ?? $first_post->id]) }}"
                                        title="{{ $first_post->title }}" class="group !no-underline "
                                        data-bt="tiles-any-cpt-xl">
                                        <img sizes="720px"
                                            src="{{ $first_post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                            alt="{{ $first_post->title }}" width="628" height="353"
                                            class="object-cover object-center bg-cover bg-center aspect-video h-auto w-full"
                                            style=" " loading="lazy">
                                        <div class="flex items-center gap-2 mt-4 text-xs text-gray-40">
                                            <span class="font-semibold text-red-100"
                                                data-bt="tiles-any-cpt-xl-label">{{ $posts[0]->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                                            •
                                            <span data-bt="tiles-any-cpt-xl-published-at">
                                                {{ $first_post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="mt-2 block text-2xl font-semibold text-gray-95 group-hover:underline"
                                            data-bt="tiles-any-cpt-xl-title">
                                            {{ $first_post->title }}
                                        </div>
                                        <p class="mt-2 hidden lg:block text-sm text-gray-95"
                                            data-bt="tiles-any-cpt-xl-content">
                                            {{ Str::limit($first_post->description, 255, '...') }}
                                        </p>
                                        <div class="mt-2 text-xs text-gray-40" data-bt="tiles-any-cpt-xl-author">
                                            {{ __('post.list.by') . ' ' . $posts[0]->user->name }}
                                        </div>
                                    </a>
                                @php
                                    $count++;
                                @endphp
                                @endif
                            @endforeach

                            @php
                                $count = 0;
                            @endphp
                            @foreach ($posts as $post)
                                @if ($post->getAvailableLang())
                                    @php
                                        $post = $post->getAvailableLang();
                                    @endphp
                                    @if ($count == 0)
                                        @php
                                            $count++;
                                        @endphp
                                        @continue;
                                    @endif
                                    @if ($count > 2)
                                    @break;
                                @endif
                                <div class="{{ $count == 2 ? 'post-hide' : '' }}">
                                    <a href="{{ route('post.detail', ['alias' => $post->slug]) }}"
                                        title="{{ $post->title }}"
                                        class="post-border group !no-underline grid grid-cols-[165px,auto] lg:grid-cols-1 xl:grid-cols-2 gap-3 lg:gap-6 lg:border-solid lg:border-t-2 lg:border-black lg:pt-8"
                                        style="
                                            border: none;
                                            border-top: 2px solid black;"
                                        data-bt="tiles-any-cpt-lg">
                                        <div class="flex items-center justify-center xl:order-2">
                                            <img sizes="360px"
                                                src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                                alt="{{ $post->title }}" width="628" height="353"
                                                class="object-cover object-center bg-cover bg-center aspect-square h-auto max-lg:max-h-40 w-full lg:aspect-video"
                                                style=" " loading="lazy">
                                        </div>
                                        <div class="flex flex-col py-1 xl:order-1">
                                            <div
                                                class="flex flex-col sm:flex-row sm:items-center gap-1 md:gap-2 text-xs text-gray-40">
                                                <span class="font-semibold text-red-100"
                                                    data-bt="tiles-any-cpt-lg-label">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                                                <span data-bt="tiles-any-cpt-lg-published-at">
                                                    <span class="hidden sm:inline">•</span>
                                                    {{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="mt-2 text-base font-semibold max-sm:leading-tight text-gray-95 max-sm:line-clamp-4 group-hover:underline lg:text-2xl"
                                                data-bt="tiles-any-cpt-lg-title">
                                                {{ $post->title }}
                                            </div>
                                            <p class="mt-2 hidden text-sm text-gray-95 lg:block lg:flex-grow"
                                                data-bt="tiles-any-cpt-lg-content">
                                                {{ Str::limit($post->description, 50, '...') }}
                                            </p>
                                            <div class="mt-2 text-xs text-gray-40"
                                                data-bt="tiles-any-cpt-lg-author">
                                                {{ __('post.list.by') . ' ' . $post->user->name }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @php
                                $count++;
                            @endphp
                            @endif
                        @endforeach
                    </div>
                    <div class="lg:order-1 flex flex-col gap-8">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($posts as $post)
                                @if ($post->getAvailableLang())
                                    @php
                                        $post = $post->getAvailableLang();
                                    @endphp
                                    @if ($count < 3)
                                        @php
                                            $count++;
                                        @endphp
                                        @continue;
                                    @endif
                                    @if ($count > 6)
                                    @break;
                                @endif
                            <div class="">
                                <a href="{{ route('post.detail', ['alias' => $post->slug]) }}"
                                    title="{{ $post->title }}"
                                    class="post-border grid lg:grid-cols-1 gap-3 max-lg:grid max-lg:grid-cols-[165px,auto] max-lg:gap-3 group !no-underline {{ $count > 3 ? ' lg:border-solid lg:border-t-2 lg:border-black lg:pt-8' : '' }}"
                                    style="
                                        border: none;
                                        border-top: 2px solid black;"
                                    data-bt="tiles-any-cpt-md">
                                    <img sizes="360px"
                                        src="{{ $post->images->first()->url ?? 'https://via.placeholder.com/150x100' }}"
                                        alt="{{ $post->title }}"
                                        width="300" height="169"
                                        class="object-cover object-center bg-cover bg-center aspect-square h-auto max-lg:max-h-40 w-full lg:aspect-video"
                                        style=" " loading="lazy">
                                    <div class="flex flex-col py-1 lg:order-1">
                                        <div
                                            class="flex flex-col sm:flex-row sm:items-center gap-1 md:gap-2 text-xs text-gray-40">
                                            <span class="font-semibold text-red-100"
                                                data-bt="tiles-any-cpt-md-label">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                                            <span data-bt="tiles-any-cpt-md-published-at">
                                                <span class="hidden sm:inline">•</span>
                                                {{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="mt-2 block text-base font-semibold max-md:leading-tight text-gray-95 group-hover:underline lg:text-2xl  max-sm:line-clamp-4"
                                            data-bt="tiles-any-cpt-md-title">
                                            {{ $post->title }}
                                        </div>
                                        <p class="mt-2 hidden text-sm text-gray-95 lg:block lg:flex-grow"
                                            data-bt="tiles-any-cpt-md-content">
                                            {{ Str::limit($post->description, 50, '...') }}
                                        </p>
                                        <div class="mt-2 text-xs text-gray-40"
                                            data-bt="tiles-any-cpt-md-author">
                                            {{ __('post.list.by') . ' ' . $post->user->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        <div class="post-border order-4 col-span-12 gap-8 articles lg:order-3 lg:col-span-4 lg:border-b-2 lg:border-solid lg:border-black lg:pb-8 xl:col-span-3"
            style="
                            border: none;
                            border-top: 2px solid black;"
            data-bt="news-tabs-block-latest-posts">
            <h2 class="mt-4 text-4xl font-bold text-green-100 lg:text-gray-95 lg:mt-0 lg:text-2xl">
                {{ __('post.list.recent') }}
            </h2>
            @if ($posts->count() == 6)
                <div class="mt-4 p-4 bg-gray-100 rounded-md text-center">
                    <p class="text-gray-600">{{ __('home.no_posts') }}</p>
                </div>
            @endif
            @php
                $count = 0;
            @endphp
            @foreach ($posts as $post)
                @if ($post->getAvailableLang())
                    @php
                        $post = $post->getAvailableLang();
                    @endphp
                    @if ($count <= 5)
                        @continue;
                    @endif
                    @if ($count > 10)
                    @break;
                @endif
                <a href="{{ route('post.detail', ['alias' => $post->slug]) }}"
                    title="Hard Rock Bet Forges Innovative Betting Partnership with NHL’s Florida Panthers"
                    class="border-b border-black mt-4 mb-4 pb-2 hover:no-underline group block cursor-pointer lg:border-0 lg:border-transparent lg:mb-0 lg:pb-0 "
                    data-bt="tiles-news-xs">
                    <div class="flex items-center gap-2 text-xs text-gray-40">
                        <span class="font-semibold text-red-100"
                            data-bt="tiles-news-xs-label">{{ $post->categories[0]->getAvailableLang()->name ?? __('post.list.uncategorized') }}</span>
                        •
                        <span
                            data-bt="tiles-news-xs-published-at">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="mt-1 text-base font-semibold text-gray-95 group-hover:underline lg:line-clamp-3"
                        data-bt="tiles-news-xs-title">{{ $post->title }}</div>
                </a>
            @php
                $count++;
            @endphp
            @endif
        @endforeach
    </div>
    <div class="order-3 col-span-12 sport-books lg:col-span-4 lg:order-4 xl:col-span-3"
        data-bt="news-tabs-block-top-sports-books">
        <h2 class="mt-4 text-4xl font-bold text-green-100 lg:text-gray-95 lg:mt-0 lg:text-2xl">
            {{ __('booker.list.popular_page') }}
        </h2>
        <div class="mt-3 flex flex-col gap-2">
            @php
                $count = 0;
            @endphp
            @foreach ($hot_bookers as $booker)
                @if ($count > 3)
                    @break
                @endif
            @if ($booker->getAvailableLang())
                @php
                    $booker = $booker->getAvailableLang();
                @endphp
                @php
                    $count++;
                @endphp
                <a href="{{ route('booker.detail', $booker->id) }}" target="_blank"
                    rel="nofollow noopener" title="{{ $booker->name }}"
                    class="flex flex-grow flex-row items-center bg-white p-2 shadow group hover:no-underline "
                    data-bt="tiles-betting-site-sm">
                    <img sizes="120px" src="{{ $booker->image }}" alt="{{ $booker->name }}"
                        width="120" height="62"
                        class="object-contain object-center bg-cover bg-center flex-shrink-0 w-[120px] lg:w-[100px] aspect-casino"
                        style=" " loading="lazy">
                    <div class="flex flex-col px-3">
                        <div class="text-sm font-semibold !leading-4 text-black duration-300 group-hover:text-red-100 lg:text-base"
                            data-bt="tiles-betting-site-sm-title">
                            {{ $booker->name }}
                        </div>
                        <div class="mt-1 flex flex-row items-center gap-1">
                            <div class="star-rating h-auto w-[60px]"
                                style="--bt-star-percentage: 95.6584%; ">
                                ★★★★★
                            </div>
                            <div class="text-xxs text-gray-60 ml-1"> (4.8/5)</div>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <div
                            class="right-0 flex h-6 w-6 items-center justify-center border border-red-100 bg-white duration-300 group-hover:bg-red-100">
                            <svg class="w-3 h-3 text-red-100 rotate-180 duration-300
                                            "
                                xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                fill="currentColor" viewBox="0 0 18 16">
                                <path
                                    d="M.29 7.315a.94.94 0 0 0 0 1.36l6.874 6.562a.937.937 0 0 0 1.293-1.356l-5.18-4.949h13.285c.52 0 .938-.418.938-.937a.935.935 0 0 0-.938-.938H3.277l5.184-4.945A.937.937 0 0 0 7.168.756L.293 7.32l-.004-.004Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
</section>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('news_grid', () => ({
            active_tab: 0,
            tabs: [
                [{
                    "p": 27402,
                    "l": "NBA"
                }, {
                    "p": 27378,
                    "l": "NBA"
                }, {
                    "p": 25956,
                    "l": "Industry"
                }, {
                    "p": 25699,
                    "l": "States"
                }],
                [{
                    "p": false,
                    "l": ""
                }, {
                    "p": false,
                    "l": ""
                }, {
                    "p": false,
                    "l": ""
                }, {
                    "p": false,
                    "l": ""
                }]
            ],
            init() {
                this.$watch('active_tab', (val, oldVal) => {
                    if (val !== oldVal) {
                        this.$refs['news-grid'].classList.add('opacity-25');
                        // fetch data
                        fetch('https://betting.com/wp-admin/admin-ajax.php?action=news_grid', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                'body': JSON.stringify({
                                    tab: this.tabs[val],
                                    nonce: '4d2882241e'
                                }),
                            })
                            .then(response => {
                                if (!response.ok) {
                                    if (response.status === 403) {
                                        alert(
                                            'Your session has expired. Please refresh the page.'
                                        );
                                        throw new Error('Invalid nonce');
                                    }
                                }
                                return response.text();
                            })
                            .then(data => {
                                this.$refs['news-grid'].innerHTML = data;
                            })
                            .catch(error => {
                                console.error(error)
                            })
                            .finally(() => {
                                this.$refs['news-grid'].classList.remove('opacity-25');
                            });
                    }
                });
            }
        }))
    })
</script>
</div>
</div>
</div>
</div>

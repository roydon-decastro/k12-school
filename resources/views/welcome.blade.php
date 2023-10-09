<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>K-12ph</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="antialiased">
    <div class="w-full">
        <header class="relative w-full border-b bg-white pb-4">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2">
                {{-- fyi k-12 logo --}}
                <div class="inline-flex items-center space-x-2">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 50 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.2732 0.2528C20.8078 1.18964 2.12023 12.2346 1.08477 13.3686C0 14.552 0 14.7493 0 27.7665C0 39.6496 0.0986153 41.1289 0.83823 42.0164C2.12023 43.5449 23.2239 55.4774 24.6538 55.5267C25.9358 55.576 46.1027 44.3832 48.2229 42.4602C49.3077 41.474 49.3077 41.3261 49.3077 27.8158C49.3077 14.3055 49.3077 14.1576 48.2229 13.1714C46.6451 11.7415 27.1192 0.450027 25.64 0.104874C24.9497 -0.0923538 23.9142 0.00625992 23.2732 0.2528ZM20.2161 21.8989C20.2161 22.4906 18.9835 23.8219 17.0111 25.3997C15.2361 26.7803 13.8061 27.9637 13.8061 28.0623C13.8061 28.1116 15.2361 29.0978 16.9618 30.2319C18.6876 31.3659 20.2655 32.6479 20.4134 33.0917C20.8078 34.0286 19.871 35.2119 18.8355 35.2119C17.8001 35.2119 9.0233 29.3936 8.67815 28.5061C8.333 27.6186 9.36846 26.5338 14.3485 22.885C17.6521 20.4196 18.4904 20.0252 19.2793 20.4196C19.7724 20.7155 20.2161 21.3565 20.2161 21.8989ZM25.6893 27.6679C23.4211 34.9161 23.0267 35.7543 22.1391 34.8668C21.7447 34.4723 22.1391 32.6479 23.6677 27.9637C26.2317 20.321 26.5275 19.6307 27.2671 20.3703C27.6123 20.7155 27.1685 22.7864 25.6893 27.6679ZM36.0932 23.2302C40.6788 26.2379 41.3198 27.0269 40.3337 28.1609C39.1503 29.5909 31.6555 35.2119 30.9159 35.2119C29.9298 35.2119 28.9436 33.8806 29.2394 33.0424C29.3874 32.6479 30.9652 31.218 32.7403 29.8867L35.9946 27.4706L32.5431 25.1532C30.6201 23.9205 29.0915 22.7371 29.0915 22.5892C29.0915 21.7509 30.2256 20.4196 30.9159 20.4196C31.3597 20.4196 33.6771 21.7016 36.0932 23.2302Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <span class="font-bold">K-12PH</span>
                </div>
                {{-- fyi home about contact blogs --}}
                <div class="hidden lg:block">
                    <ul class="inline-flex space-x-8">
                        <li>
                            <a href="/" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#faq-section" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                Blogs
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- fyi login register --}}
                <div class="flex flex-wrap items-center">
                    @if (Route::has('login'))
                        <div class="mr-5 hidden w-auto lg:block">
                            @auth
                                <div class="inline-block">
                                    <a href="{{ url('/admin') }}">
                                        <button
                                            class="w-full rounded-xl bg-transparent py-3 px-5 font-medium transition duration-200 ease-in-out"
                                            type="button">
                                            Dashboard
                                        </button>
                                    </a>
                                </div>
                            @else
                                <div class="flex gap-2">


                                    <div class="hidden w-auto lg:block">
                                        <div class="inline-block">
                                            <a href="{{ url('/admin') }}">
                                                <button
                                                    class="w-full rounded-md bg-indigo-600 py-3 px-5 font-semibold text-white">
                                                    Login
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    @if (Route::has('register'))
                                        <div class="hidden w-auto lg:block">
                                            <div class="inline-block">
                                                <a href="{{ url('/register') }}">
                                                    <button
                                                        class="w-full rounded-md bg-indigo-600 py-3 px-5 font-semibold text-white">
                                                        Sign Up
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    @endif
                    {{-- fyi purple cirle at the middle --}}
                    {{-- <div class="w-auto lg:hidden">
                        <a href="#">
                            <svg class="navbar-burger text-indigo-600" width="51" height="51" viewBox="0 0 56 56"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="56" height="56" rx="28" fill="currentColor"></rect>
                                <path d="M37 32H19M37 24H19" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div> --}}
                </div>
                {{-- fyi hamburger menu --}}
                <div class="lg:hidden" x-data x-on:click="$dispatch('toggle-modal')">
                    <svg id="menu" onclick="Menu(this)" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 cursor-pointer z-10  mt-5">
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                    <svg id="closeMe" class="z-10" onclick="closeMenu(this)" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" class="bi bi-x z-20" viewBox="0 0 16 16"
                        style="visibility: hidden">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </div>
            </div>
            {{-- fyi home about contact blogs --}}
            {{-- <div id="myNavi"
                class="lg:hidden pl-5 z-[-1] lg:z-auto lg:static absolute w-full lg:opacity-100 opacity-0 bg-white">
                <ul class="flex-col">
                    <li>
                        <a href="/" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                            Homex
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#faq-section" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#pricing-section" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                            Pricing
                        </a>
                    </li>
                    <li>
                        <a href="#newsletter-section" class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                            Newsletter
                        </a>
                    </li>

                    @if (Route::has('login'))
                        <div class="mr-5 w-auto lg:block">
                            @auth
                                <div class="inline-block">
                                    <a href="{{ url('/admin') }}">
                                        <button
                                            class="w-full rounded-xl bg-transparent py-3 px-5 font-medium transition duration-200 ease-in-out"
                                            type="button">
                                            Dashboard
                                        </button>
                                    </a>
                                </div>
                            @else
                                <div class="flex-col">


                                    <div class="w-auto lg:block">
                                        <div class="inline-block">
                                            <li>
                                                <a href="{{ url('/login') }}"
                                                    class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                                    Login
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                    @if (Route::has('register'))
                                        <div class=" w-auto lg:block">
                                            <div class="inline-block">
                                                <li>
                                                    <a href="{{ url('/register') }}"
                                                        class="text-sm font-semibold text-gray-800 hover:text-gray-900">
                                                        Sign Up
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    @endif

                </ul>
            </div> --}}
            <div x-data="{ show: false }" x-show="show" x-on:toggle-modal.window="show = ! show"
                class="w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                    @if (Route::has('login'))
                        {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
                        <div class="">
                            <hr>
                            @auth
                                <li>
                                    <a href="{{ url('/dashboard') }}" {{-- class="font-semibold text-pink-600 hover:text-pink-900 dark:text-pink-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Log
                                        in</a>
                                </li>

                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}"
                                            class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </header>
        {{-- fyi header-section --}}
        <div class="relative w-full bg-white" id="header-section">
            <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8">
                <div
                    class="flex flex-col justify-center px-4 py-12 md:py-16 lg:col-span-7 lg:gap-x-6 lg:px-6 lg:py-24 xl:col-span-6">
                    <div class="mt-8 flex max-w-max items-center space-x-2 rounded-full bg-gray-100 p-1">
                        <div class="rounded-full bg-white p-1 px-2">
                            <p class="text-sm font-medium">We&#x27; hiring</p>
                        </div>
                        <p class="text-sm font-medium">Join our team →</p>
                    </div>
                    <h1 class="mt-8 text-3xl font-bold tracking-tight text-black md:text-4xl lg:text-6xl">
                        Education that translates to the real world.
                    </h1>
                    <p class="mt-8 text-lg text-gray-700">
                        We believe in fostering a nurturing environment for young minds to flourish. Through engaging
                        curriculum, dedicated
                        educators, and a focus on individualized learning, we strive to empower students to reach their
                        full potential and become lifelong learners.
                    </p>
                    <form action="" class="mt-8 flex items-start space-x-2">
                        <div>
                            <input
                                class="flex w-full rounded-md border border-black/30 bg-transparent px-3 py-2 text-sm placeholder:text-gray-600 focus:outline-none focus:ring-1 focus:ring-black/30 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                type="email" placeholder="Enter your email" id="email" />
                            <p class="mt-2 text-sm text-gray-500">We care about your privacy</p>
                        </div>
                        <div>
                            <button type="button"
                                class="rounded-md bg-black px-3 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
                <div class="relative lg:col-span-5 lg:-mr-8 xl:col-span-6">
                    <img class="aspect-[3/2] bg-gray-50 object-cover lg:aspect-[4/3] lg:h-[700px] xl:aspect-[16/9]"
                        src="https://plus.unsplash.com/premium_photo-1663099230808-ff36ef2545fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                        alt="" />
                </div>
            </div>
        </div>
        <div class="mx-auto my-32 max-w-7xl px-2 lg:px-8">
            <div class="grid grid-cols-1 gap-y-8 text-center sm:grid-cols-2 sm:gap-12 lg:grid-cols-4">
                <div>
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-9 w-9 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mt-8 text-lg font-semibold text-black">Admissions</h3>
                    <p class="mt-4 text-sm text-gray-600">
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                        sint. Velit officia consequat duis enim velit mollit.
                    </p>
                </div>
                <div>
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-orange-100">
                        <svg class="h-9 w-9 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-8 text-lg font-semibold text-black">
                        Billing and Payments
                    </h3>
                    <p class="mt-4 text-sm text-gray-600">
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                        sint. Velit officia consequat duis enim velit mollit.
                    </p>
                </div>
                <div>
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100">
                        <svg class="h-9 w-9 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mt-8 text-lg font-semibold text-black">
                        HR Management
                    </h3>
                    <p class="mt-4 text-sm text-gray-600">
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                        sint. Velit officia consequat duis enim velit mollit.
                    </p>
                </div>
                <div>
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-100">
                        <svg class="h-9 w-9 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mt-8 text-lg font-semibold text-black">Quizzes and Grades</h3>
                    <p class="mt-4 text-sm text-gray-600">
                        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                        sint. Velit officia consequat duis enim velit mollit.
                    </p>
                </div>
            </div>
        </div>
        {{-- fyi faq-section --}}
        <section class="mx-auto max-w-7xl bg-gray-50 px-2 py-10 md:px-0" id="faq-section">
            <div>
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">
                        Frequently Asked Questions
                    </h2>
                    <p class="mt-4 max-w-xl text-base leading-relaxed text-gray-600 lg:mx-auto">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere,
                        assumenda
                    </p>
                </div>
                <div class="mx-auto mt-8 max-w-3xl space-y-4 md:mt-16">
                    <div
                        class="cursor-pointer rounded-md border border-gray-400 shadow-lg transition-all duration-200">
                        <button type="button" class="flex w-full items-center justify-between px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold text-black">
                                How do I get started?
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-500">
                                <polyline points="18 15 12 9 6 15"></polyline>
                            </svg>
                        </button>
                        <div class="px-4 pb-5 sm:px-6 sm:pb-6">
                            <p class="text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat
                                aliquam adipisci iusto aperiam? Sint asperiores sequi nobis
                                inventore ratione deleniti?
                            </p>
                        </div>
                    </div>
                    <div class="cursor-pointer rounded-md border border-gray-400 transition-all duration-200">
                        <button type="button"
                            class="flex w-full items-start justify-between px-4 py-5 sm:p-6 md:items-center">
                            <span class="flex text-start text-lg font-semibold text-black">
                                What is the difference between a free and paid account?
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="hidden h-5 w-5 text-gray-500 md:block">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </div>
                    <div class="cursor-pointer rounded-md border border-gray-400 transition-all duration-200">
                        <button type="button"
                            class="flex w-full items-start justify-between px-4 py-5 sm:p-6 md:items-center">
                            <span class="flex text-start text-lg font-semibold text-black">
                                What is the difference between a free and paid account?
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="hidden h-5 w-5 text-gray-500 md:block">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="textbase mt-6 text-center text-gray-600">
                    Can&#x27;t find what you&#x27;re looking for?
                    <a href="#" title="" class="font-semibold text-black hover:underline">
                        Contact our support
                    </a>
                </p>
            </div>
        </section>
        {{-- fyi pricing-section --}}
        <div class="mx-auto my-12 max-w-7xl md:my-24 lg:my-32" id="pricing-section">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-6">
                <div class="px-4 py-10 lg:col-span-5 lg:px-0">
                    <span class="mb-8 inline-block rounded-full border p-1 px-3 text-xs font-semibold">
                        Pricing that fits your budget
                    </span>
                    <h1 class="text-3xl font-bold md:text-5xl">
                        Transparent and Flexible Pricing: Discover the Best Value for Quality Education.
                    </h1>
                    <p class="mt-8 font-medium">
                        Unlocking Opportunities: Scholarships and Financial Aid for a Brighter Future. Flexible Tuition
                        Options: Tailored to Fit Your Budget and Educational Needs.
                    </p>
                    <div class="mt-8 flex w-full max-w-sm items-center space-x-2">
                        <input
                            class="flex h-10 w-full rounded-md border border-black/30 bg-transparent px-3 py-2 text-sm placeholder:text-gray-600 focus:outline-none focus:ring-1 focus:ring-black/30 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                            type="email" placeholder="Email" />
                        <button type="button"
                            class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                            Subscribe
                        </button>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center md:flex-row lg:col-span-7">
                    <div class="w-full p-5 md:w-1/2">
                        <div class="rounded-md border bg-white bg-opacity-90">
                            <div class=" border-b">
                                <div class="px-9 py-7">
                                    <h3 class="mb-3 text-xl font-bold leading-snug text-gray-900">
                                        Premium
                                    </h3>
                                    <p class="font-medium leading-relaxed text-gray-500">
                                        Lorem ipsum dolor sit amet, consect etur adipiscing maror.
                                    </p>
                                </div>
                            </div>
                            <div class="px-9 pb-9 pt-8">
                                <p class="mb-6 font-medium leading-relaxed text-gray-600">
                                    Features included:
                                </p>
                                <ul class="mb-11">
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">3 Team Members</p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">1200+ UI Blocks</p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">
                                            10 GB Cloud Storage
                                        </p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">
                                            Individual Email Account
                                        </p>
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">Premium Support</p>
                                    </li>
                                </ul>
                                <p class="mb-6 text-lg font-semibold leading-normal text-gray-600">
                                    <span>Starting from</span>
                                    <span class="ml-2 text-gray-900">PHP 50/pupil</span>
                                </p>
                                <div class="md:inline-block">
                                    <button type="button"
                                        class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                        Start your free trial
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-5 md:w-1/2">
                        <div class="rounded-md border bg-white bg-opacity-90">
                            <div class=" border-b">
                                <div class="px-9 py-7">
                                    <h3 class="mb-3 text-xl font-bold leading-snug text-gray-900">
                                        Premium
                                    </h3>
                                    <p class="font-medium leading-relaxed text-gray-500">
                                        Lorem ipsum dolor sit amet, consect etur adipiscing maror.
                                    </p>
                                </div>
                            </div>
                            <div class="px-9 pb-9 pt-8">
                                <p class="mb-6 font-medium leading-relaxed text-gray-600">
                                    Features included:
                                </p>
                                <ul class="mb-11">
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">3 Team Members</p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">1200+ UI Blocks</p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">
                                            10 GB Cloud Storage
                                        </p>
                                    </li>
                                    <li class="mb-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">
                                            Individual Email Account
                                        </p>
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="mr-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <p class="font-semibold leading-normal">Standard Support</p>
                                    </li>
                                </ul>
                                <p class="mb-6 text-lg font-semibold leading-normal text-gray-600">
                                    <span>Starting from</span>
                                    <span class="ml-2 text-gray-900">PHP 150/pupil</span>
                                </p>
                                <div class="md:inline-block">
                                    <button type="button"
                                        class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                        Start your free trial
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- fyi newsletter-section --}}
        <div class="mx-auto max-w-7xl bg-gray-50 px-2 py-10 lg:px-2" id="newsletter-section">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="w-full md:w-2/3 lg:w-1/2">
                    <h2 class="text-3xl font-bold text-black">
                        Sign up for our weekly newsletter
                    </h2>
                    <p class="mt-4 text-gray-600">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at
                        ipsum eu nunc commodo posuere et sit amet ligula.
                    </p>
                    <div class="mt-4">
                        <p class="font-semibold text-gray-800">
                            Trusted by over 100,000+ businesses and individuals
                        </p>
                        <div class="mt-2 flex items-center">
                            <div class="flex space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-400">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-400">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-400">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-400">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-400">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                            </div>
                            <span class="ml-2 inline-block">
                                <span class="text-sm font-semibold text-gray-800">
                                    4.8/5 . 3420 Reviews
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-10 w-full md:w-2/3 lg:mt-0 lg:w-1/2">
                    <form class="flex lg:justify-center">
                        <div class="flex w-full max-w-md flex-col space-y-4">
                            <input
                                class="flex h-10 w-full rounded-md border border-black/30 bg-transparent px-3 py-2 text-sm placeholder:text-gray-600 focus:outline-none focus:ring-1 focus:ring-black/30 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                type="email" placeholder="Email" />
                            <button type="button"
                                class="w-full rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                Subscribe
                            </button>
                        </div>
                    </form>
                    <p class="mt-2 lg:text-center">
                        <span class="text-sm text-gray-600">
                            By signing up, you agree to our terms of service and privacy policy.
                        </span>
                    </p>
                </div>
            </div>
        </div>
        {{-- fyi footer-section --}}
        <div class="mx-auto mt-12 max-w-7xl" id="footer-section">
            <footer class="px-4 py-10">
                <div class="flex flex-col md:flex-row md:items-center">
                    <span>
                        <svg width="40" height="46" viewBox="0 0 50 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.2732 0.2528C20.8078 1.18964 2.12023 12.2346 1.08477 13.3686C0 14.552 0 14.7493 0 27.7665C0 39.6496 0.0986153 41.1289 0.83823 42.0164C2.12023 43.5449 23.2239 55.4774 24.6538 55.5267C25.9358 55.576 46.1027 44.3832 48.2229 42.4602C49.3077 41.474 49.3077 41.3261 49.3077 27.8158C49.3077 14.3055 49.3077 14.1576 48.2229 13.1714C46.6451 11.7415 27.1192 0.450027 25.64 0.104874C24.9497 -0.0923538 23.9142 0.00625992 23.2732 0.2528ZM20.2161 21.8989C20.2161 22.4906 18.9835 23.8219 17.0111 25.3997C15.2361 26.7803 13.8061 27.9637 13.8061 28.0623C13.8061 28.1116 15.2361 29.0978 16.9618 30.2319C18.6876 31.3659 20.2655 32.6479 20.4134 33.0917C20.8078 34.0286 19.871 35.2119 18.8355 35.2119C17.8001 35.2119 9.0233 29.3936 8.67815 28.5061C8.333 27.6186 9.36846 26.5338 14.3485 22.885C17.6521 20.4196 18.4904 20.0252 19.2793 20.4196C19.7724 20.7155 20.2161 21.3565 20.2161 21.8989ZM25.6893 27.6679C23.4211 34.9161 23.0267 35.7543 22.1391 34.8668C21.7447 34.4723 22.1391 32.6479 23.6677 27.9637C26.2317 20.321 26.5275 19.6307 27.2671 20.3703C27.6123 20.7155 27.1685 22.7864 25.6893 27.6679ZM36.0932 23.2302C40.6788 26.2379 41.3198 27.0269 40.3337 28.1609C39.1503 29.5909 31.6555 35.2119 30.9159 35.2119C29.9298 35.2119 28.9436 33.8806 29.2394 33.0424C29.3874 32.6479 30.9652 31.218 32.7403 29.8867L35.9946 27.4706L32.5431 25.1532C30.6201 23.9205 29.0915 22.7371 29.0915 22.5892C29.0915 21.7509 30.2256 20.4196 30.9159 20.4196C31.3597 20.4196 33.6771 21.7016 36.0932 23.2302Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <div class="mt-4 grow md:ml-12 md:mt-0">
                        <p class="text-base font-semibold text-gray-700">
                            © 2023 K12PH Component Library
                        </p>
                    </div>
                </div>
                <div class="mt-16 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                    <div class="mb-8 lg:mb-0">
                        <p class="mb-6 text-lg font-semibold text-gray-700">Company</p>
                        <ul class="flex flex-col space-y-4 text-[14px] font-medium text-gray-500">
                            <li>About us</li>
                            <li>Company History</li>
                            <li>Our Team</li>
                            <li>Our Vision</li>
                            <li>Press Release</li>
                        </ul>
                    </div>
                    <div class="mb-8 lg:mb-0">
                        <p class="mb-6 text-lg font-semibold text-gray-700">Our Stores</p>
                        <ul class="flex flex-col space-y-4 text-[14px] font-medium text-gray-500">
                            <li>Washington</li>
                            <li>New Hampshire</li>
                            <li>Maine</li>
                            <li>Texas</li>
                            <li>Indiana</li>
                        </ul>
                    </div>
                    <div class="mb-8 lg:mb-0">
                        <p class="mb-6 text-lg font-semibold text-gray-700">Services</p>
                        <ul class="flex flex-col space-y-4 text-[14px] font-medium text-gray-500">
                            <li>UI / UX Design</li>
                            <li>App Development</li>
                            <li>API reference</li>
                            <li>API status</li>
                            <li>Documentation</li>
                        </ul>
                    </div>
                    <div class="mb-8 lg:mb-0">
                        <p class="mb-6 text-lg font-semibold text-gray-700">Legal</p>
                        <ul class="flex flex-col space-y-4 text-[14px] font-medium text-gray-500">
                            <li>Privacy Policy</li>
                            <li>Terms of Service</li>
                            <li>Cookie Policy</li>
                            <li>Disclaimer</li>
                            <li>Media Policy</li>
                        </ul>
                    </div>
                    <div class="mb-8 lg:mb-0">
                        <p class="mb-6 text-lg font-semibold text-gray-700">Social Links</p>
                        <ul class="flex flex-col space-y-4 text-[14px] font-medium text-gray-500">
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>Linkedin</li>
                            <li>YouTube</li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function Menu(e) {
            var x = document.getElementById('menu');
            var y = document.getElementById('closeMe');
            var z = document.getElementById('myNavi');
            if (x.style.visibility === 'hidden') {
                x.style.visibility = 'visible';

            } else {
                x.style.visibility = 'hidden';
                y.style.visibility = 'visible';
                z.classList.remove('opacity-0');
                z.classList.remove('z-[-1]');
                z.classList.add('opacity-100');
                z.classList.add('z-10');
                z.classList.add('block');
            }

        }

        function closeMenu(e) {
            var x = document.getElementById('menu');
            var y = document.getElementById('closeMe');
            var z = document.getElementById('myNavi');
            if (y.style.visibility === 'hidden') {
                y.style.visibility = 'visible';

            } else {
                y.style.visibility = 'hidden';
                x.style.visibility = 'visible';
                z.classList.remove('opacity-100');
                z.classList.remove('z-10');
                z.classList.remove('block');

                z.classList.add('opacity-0');
                z.classList.add('z-[-1]');




            }

        }
    </script>

</body>

</html>

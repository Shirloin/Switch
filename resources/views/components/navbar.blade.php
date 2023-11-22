<div class="relative h-20 w-full z-30">
    <div class="fixed top-0 left-0 right-0 h-20 bg-slate-800 border-b-2 border-solid border-slate-500 ">
        <div class="w-full h-full box-border flex justify-center items-center lg:px-12 p-6">
            <div class="w-full h-full flex justify-between items-center lg:gap-8 gap-2 ">
                <div class="h-full flex justify-center items-center">
                    <a href="/" class="w-40 h-full">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="w-full h-full hidden md:flex justify-between items-center gap-4">
                    <input class="input-style w-full bg-none" type="text" placeholder="Search...">
                </div>
                <div class="h-full hidden md:flex justify-center items-center lg:gap-4 gap-2">
                    <div class="h-full flex justify-center items-center  gap-2">
                        <a class="nav-button " href="/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                        <a class="nav-button" href="/shop">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>
                        </a>
                        <a class="nav-button" href="/transaction">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                              </svg>
                        </a>
                    </div>
                    <div class="border-r-[1px] border-gray-400 h-8 opacity-30"></div>
                    @auth
                        <a class="w-36 flex justify-start items-center gap-2 nav-button" href="/profile">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex justify-center items-center bg-gray-50">
                                <img class="w-full h-full rounded-full object-cover object-center"
                                    src="{{ Auth::user()->image }}" alt="">
                            </div>
                            <h1 class="text-md text-white whitespace-nowrap overflow-hidden max-w-full">
                                {{ Auth::user()->username }}</h1>
                        </a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="bg-purple-700 px-4 py-1 border-[1px] border-purple-700 rounded-md text-white font-semibold">
                                Logout
                            </button>
                        </form>
                    @endauth

                    @guest
                        <button class="border-[1px] border-purple-500 px-4 py-1 rounded-md text-purple-500"
                            onclick="Livewire.emit('openModal', 'login')">Login
                        </button>
                        <button
                            class="bg-purple-700 px-4 py-1 border-[1px] border-purple-700 rounded-md text-white font-semibold"
                            onclick="Livewire.emit('openModal', 'register')">
                            Register
                        </button>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative h-20 w-full z-50">
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
                        <button
                            class="bg-purple-700 px-4 py-1 border-[1px] border-purple-700 rounded-md text-white font-semibold">
                            LogOut
                        </button>
                    @endauth

                    @guest
                        <button class="border-[1px] border-purple-500 px-4 py-1 rounded-md text-purple-500" onclick="Livewire.emit('openModal', 'login')">Login
                        </button>
                        <button
                            class="bg-purple-700 px-4 py-1 border-[1px] border-purple-700 rounded-md text-white font-semibold" onclick="Livewire.emit('openModal', 'register')">
                            Register
                        </button>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

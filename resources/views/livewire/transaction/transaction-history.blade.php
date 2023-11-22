<div class="max-w-7xl w-full h-full grid grid-cols-3 justify-start items-start gap-8">
    @foreach ($transactions as $th)
        <div
            class=" rounded-md bg-slate-600 flex flex-col justify-start items-start p-4 box-border gap-4 text-white">
            <div class="w-full flex justify-start items-center gap-4" class="font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#ffffff" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <h1>Transaction</h1>
                <h1>{{ $th->date }}</h1>
                <h1>{{ $th->time }}</h1>
            </div>
            <div class="relative w-full flex flex-col justify-center items-center gap-4" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" @click.away="isOpen = false"
                    class="w-full rounded-md bg-gray-300 p-2 text-black font-semibold flex justify-between">
                    <h1>Transaction Details</h1>
                    <div>
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                        </svg>
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </button>
                <div class="relative w-full flex gap-4 justify-start">
                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="transform translate-y-[-10%] opacity-0"
                        x-transition:enter-end="transform translate-y-0 opacity-100"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="transform translate-y-0 opacity-100"
                        x-transition:leave-end="transform translate-y-[-10%] opacity-0"
                        class="absolute z-10 w-full max-h-60 overflow-y-auto  left-0 bg-gray-300 text-black p-4 flex flex-col  gap-4 shadow-md rounded-md text-sm font-normal text-start">
                        @foreach ($th->TransactionDetails as $td)
                            <div class="w-full flex justify-start items-start gap-2 ">
                                <img class="w-36 h-24 rounded-md object-cover" src="{{ $td->Product->image }}"
                                    alt="">
                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                    <h1>{{ $td->Product->name }}</h1>
                                    <h1>Rp{{ formatPrice($td->Product->price) }}</h1>
                                    <h1>Total Quantity: {{ $td->quantity }}</h1>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

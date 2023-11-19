<div class="w-full flex py-4 flex-col justify-center items-center box-border " id="login-full-screen">
    <div class="w-full sm:block hidden">
        <div class="flex justify-center items-center text-5xl text-purple-500 font-semibold">
            <a href="/">
                <h1 class="font-mandala">SWITCH</h1>
            </a>
        </div>
    </div>
    <div class="w-full h-full flex items-center place-content-evenly justify-evenly ">
        <div
            class="h-full flex flex-col justify-center items-center text-xl w-full ">
            <div
                class="w-full flex sm:w-96 sm:min-h-96 flex-col justify-center bg-white shadow-gray-300 p-8 box-border rounded-md shadow-box gap-4 place-items-center">
                <div class="w-full flex flex-col justify-center items-center gap-2">
                    <h1 class="text-2xl font-bold">Register Now</h1>
                    <div class="w-full flex justify-center items-center text-base gap-1 bg-red">
                        <h1>Already have an account?</h1>
                        <button class="text-purple-500 cursor-pointer font-medium" onclick="Livewire.emit('openModal', 'login')">Login</button>
                    </div>
                </div>
                <div class="w-full h-full flex flex-col justify-start items-center gap-4">
                    <form wire:submit.prevent='register' class="w-full h-full text-sm flex flex-col gap-1">
                        <label for="usernameInput">Username</label>
                        <input type="text" wire:model="username" id="usernameInput" class="modal-input">
                        <p class="text-gray-400">Example: Shirloin</p>
                        <label for="emailInput">Email</label>
                        <input type="text" wire:model="email" id="emailInput" class="modal-input">
                        <p class="text-gray-400">Example: email@gmail.com</p>
                        <label for="passwordInput">Password</label>
                        <input type="password" wire:model="password" id="passwordInput" class="modal-input">
                        <p class="text-gray-400">Example:abc123</p>
                        <label for="phoneInput">Phone</label>
                        <input type="number" wire:model="phone" id="phoneInput" class="modal-input">
                        <p class="text-gray-400">Example:abc123</p>
                        <button class="w-full p-2 my-4 bg-purple-500 rounded-lg text-white text-xl font-bold">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

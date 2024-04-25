<div class="flex flex-col items-center justify-center h-screen dark">
    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-200 mb-4">Register</h2>
        <form class="flex flex-col" wire:submit.prevent='register'>
            <input placeholder="Name" wire:model='name'
                class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                type="text">
            <input placeholder="Email address" wire:model='email'
                class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                type="email">
            <input placeholder="Password" wire:model='password'
                class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                type="password">
            <div class="flex items-center justify-between flex-wrap">
                <p class="text-white mt-4"> already have an account? <a
                        class="text-sm text-blue-500 -200 hover:underline mt-4" href="#" wire:click="navigateTo('login')">Login</a></p>
            </div>
            <button
                class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150"
                type="submit">Register</button>
        </form>
    </div>
</div>
<footer class="bg-gray-800 text-white py-8 mt-15">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Pantau Publik</h3>
                <p class="text-gray-400 text-sm">Monitoring for transparency and accountability</p>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <nav class="flex flex-wrap mb-4 md:mb-0">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white mx-3 my-1">Home</a>
                    
                    <a href="#" class="text-gray-300 hover:text-white mx-3 my-1">Privacy Policy</a>
                    <a href="#" class="text-gray-300 hover:text-white mx-3 my-1">Terms of Service</a>
                </nav>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-6 pt-6 text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Pantau Publik. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- Navigation bar with logo and main menu -->
<nav class="absolute top-0 left-0 right-0 p-1 flex justify-between items-center ml-10 mr-10 bg-gray-600 ">
    <div class="flex items-center space-x-2">
        <div class="w-10 h-20 flex items-center justify-center ml-8">
                <a href="/">
                        <img src="/Logo.png" alt="">
                </a>
        </div>
    </div>

    <!-- Navigation links and authentication buttons -->
    <div class="flex space-x-4 text-sm mr-8">
        <a href="/" class="text-white">BERANDA</a>
        <a href="/laporan/create" class="text-white">LAPOR</a>
        <a href="/portal" class="text-white">PORTAL</a>
        <a href="/laporan" class="text-white">LAPORAN</a>

        @auth
                <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">LOGOUT</button>
                </form>
        @else
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-1 rounded">MASUK</a>
        @endauth
    </div>
</nav>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="h-screen flex overflow-hidden bg-gray-100">
        <div class="flex flex-col w-64">
            <div class="flex flex-col h-0 flex-1 bg-gray-800">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1">
                        <a href="/e-Ticketing Airplane/admin/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                        <a href="/e-Ticketing Airplane/admin/pengguna/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Data User
                        </a>
                        <a href="/e-Ticketing Airplane/admin/maskapai/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Data Maskapai
                        </a>
                        <a href="/e-Ticketing Airplane/admin/kota/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Data Kota
                        </a>
                        <a href="/e-Ticketing Airplane/admin/rute/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Data Rute
                        </a>
                        <a href="/e-Ticketing Airplane/admin/jadwal/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Data Jadwal Penerbangan
                        </a>
                        <a href="/e-Ticketing Airplane/admin/order/index.php" class="group flex items-center px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-150 ease-in-out">
                            Pemesanan Tiket
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex bg-gray-700 p-4">
                    <a href="/e-Ticketing Airplane/logout.php" onclick="return confirm('Apakah anda yakin ingin logout?')" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="ml-3 text-sm font-medium text-white">Logout</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
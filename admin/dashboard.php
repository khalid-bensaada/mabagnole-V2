<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-6 border-b border-slate-800">
                <h1 class="text-xl font-black text-blue-500">MaBagnole <span class="text-white">Admin</span></h1>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="flex items-center space-x-3 p-3 bg-blue-600 rounded-xl transition">
                    <i class="fas fa-chart-pie w-5"></i>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                    <i class="fas fa-car w-5"></i>
                    <span>Vehicles</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                    <i class="fas fa-calendar-check w-5"></i>
                    <span>Reservations</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                    <i class="fas fa-users w-5"></i>
                    <span>Clients</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                    <i class="fas fa-star w-5"></i>
                    <span>Reviews</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800">
                <a href="logout.php"
                    class="flex items-center space-x-3 p-3 text-red-400 hover:bg-red-900/20 rounded-xl transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header class="bg-white border-b border-slate-200 p-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-slate-800">Overview Stats</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-slate-500 italic">2026-01-05</span>
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600 border border-blue-200">
                        A
                    </div>
                </div>
            </header>

            <div class="p-6 md:p-10 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-green-50 text-green-600 rounded-2xl">
                                <i class="fas fa-money-bill-wave text-xl"></i>
                            </div>
                            <span class="text-green-500 text-xs font-bold">+12%</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Total Revenue</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">45,280 <span
                                class="text-sm text-slate-400">MAD</span></h3>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                            <span class="text-blue-500 text-xs font-bold">+5.2%</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Bookings</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">128</h3>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-purple-50 text-purple-600 rounded-2xl">
                                <i class="fas fa-car-side text-xl"></i>
                            </div>
                            <span class="text-slate-400 text-xs font-bold">85% Util.</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Active Fleet</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">42</h3>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-orange-50 text-orange-600 rounded-2xl">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <span class="text-orange-500 text-xs font-bold">New</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">New Clients</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">15</h3>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-800">Recent Reservations</h3>
                        <button class="text-blue-600 text-sm font-bold hover:underline">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase font-black tracking-widest">
                                <tr>
                                    <th class="px-6 py-4">Client</th>
                                    <th class="px-6 py-4">Vehicle</th>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold">
                                            AB</div>
                                        <span class="text-sm font-bold text-slate-700">Ahmed Benani</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">Dacia Logan</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">Jan 05 - Jan 08</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-black uppercase rounded-full">Pending</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button
                                            class="text-blue-500 hover:text-blue-700 font-bold text-xs mr-3">Approve</button>
                                        <button
                                            class="text-red-400 hover:text-red-600 font-bold text-xs">Reject</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
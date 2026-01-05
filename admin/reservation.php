<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 flex">

    <aside class="w-64 bg-slate-900 text-white min-h-screen hidden md:flex flex-col">
        <div class="p-6 border-b border-slate-800">
            <h1 class="text-xl font-black text-blue-500">MaBagnole Admin</h1>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="dashboard.php" class="flex items-center space-x-3 p-3 bg-blue-600 rounded-xl transition">
                <i class="fas fa-chart-pie w-5"></i>
                <span class="font-bold">Dashboard</span>
            </a>
            <a href="vehicule.php"
                class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                <i class="fas fa-car w-5"></i>
                <span>Vehicles</span>
            </a>
            <a href="reservation.php"
                class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                <i class="fas fa-calendar-check w-5"></i>
                <span>Reservations</span>
            </a>
            <a href="clients.php"
                class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                <i class="fas fa-users w-5"></i>
                <span>Clients</span>
            </a>
            <a href="reviews.php"
                class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                <i class="fas fa-star w-5"></i>
                <span>Reviews</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-6 md:p-10">
        <div class="mb-8">
            <h2 class="text-3xl font-black text-slate-800">Gestion des Réservations</h2>
            <p class="text-slate-500">Approuvez ou refusez les demandes de location des clients.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 flex items-center gap-4">
                <div class="bg-yellow-100 text-yellow-600 p-4 rounded-xl"><i class="fas fa-clock text-xl"></i></div>
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase">En Attente</p>
                    <h4 class="text-2xl font-black text-slate-800">12</h4>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 flex items-center gap-4">
                <div class="bg-green-100 text-green-600 p-4 rounded-xl"><i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase">Confirmées</p>
                    <h4 class="text-2xl font-black text-slate-800">45</h4>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 flex items-center gap-4">
                <div class="bg-blue-100 text-blue-600 p-4 rounded-xl"><i class="fas fa-car text-xl"></i></div>
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase">En Cours</p>
                    <h4 class="text-2xl font-black text-slate-800">8</h4>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-300"></i>
                    <input type="text" placeholder="Rechercher un client ou véhicule..."
                        class="w-full pl-12 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm font-bold bg-slate-100 rounded-lg text-slate-600">Tout</button>
                    <button class="px-4 py-2 text-sm font-bold text-slate-400 hover:text-blue-600">En Attente</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Véhicule</th>
                            <th class="px-6 py-4">Dates</th>
                            <th class="px-6 py-4">Prix Total</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                        SB</div>
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm">Sami Benani</p>
                                        <p class="text-[10px] text-slate-400">sami@email.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-600">Dacia Logan</td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-slate-700">Jan 10 - Jan 15</p>
                                <p class="text-[10px] text-slate-400">5 Jours</p>
                            </td>
                            <td class="px-6 py-4 font-black text-slate-800 text-sm">1,400 MAD</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-black uppercase rounded-full">En
                                    Attente</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <form action="update_status.php" method="POST" class="inline">
                                        <input type="hidden" name="res_id" value="1">
                                        <button name="action" value="approve"
                                            class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase hover:bg-green-600 transition">Approuver</button>
                                        <button name="action" value="reject"
                                            class="bg-red-50 text-red-500 px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase hover:bg-red-100 transition">Refuser</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold text-xs">
                                        MK</div>
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm">Meryem Karim</p>
                                        <p class="text-[10px] text-slate-400">mery@email.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-600">Range Rover</td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-slate-700">Jan 06 - Jan 08</p>
                                <p class="text-[10px] text-slate-400">2 Jours</p>
                            </td>
                            <td class="px-6 py-4 font-black text-slate-800 text-sm">1,700 MAD</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black uppercase rounded-full">Confirmée</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-slate-400 hover:text-blue-600"><i class="fas fa-envelope mr-1"></i>
                                    Email</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clients | MaBagnole Admin</title>
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
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-black text-slate-800">Gestion des Clients</h2>
                <p class="text-slate-500">Consultez et gérez les utilisateurs inscrits sur la plateforme.</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm">
                <span class="text-slate-400 text-sm">Total Clients:</span>
                <span class="text-xl font-black text-blue-600 ml-2">1,248</span>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-2xl mb-6 border border-slate-200 shadow-sm flex flex-col md:flex-row gap-4 items-center">
            <div class="relative flex-1 w-full">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" placeholder="Rechercher par nom ou email..."
                    class="w-full pl-12 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <select
                    class="flex-1 md:flex-none bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium outline-none">
                    <option>Tous les statuts</option>
                    <option>Actif</option>
                    <option>Banni</option>
                </select>
                <button class="bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-slate-800 transition">
                    Filtrer
                </button>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Utilisateur</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Inscrit le</th>
                            <th class="px-6 py-4">Réservations</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-blue-300 text-white flex items-center justify-center font-bold text-sm shadow-inner">
                                        JD
                                    </div>
                                    <span class="font-bold text-slate-700">John Doe</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">john.doe@example.com</td>
                            <td class="px-6 py-4 text-sm text-slate-500">12 Oct 2025</td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-bold">5
                                    Locations</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-green-600 text-[10px] font-black uppercase">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Actif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button title="Voir Profil"
                                        class="p-2 text-slate-400 hover:text-blue-600 transition"><i
                                            class="fas fa-eye"></i></button>
                                    <button title="Bannir" class="p-2 text-slate-400 hover:text-red-500 transition"><i
                                            class="fas fa-user-slash"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold text-sm">
                                        YK
                                    </div>
                                    <span class="font-bold text-slate-700">Yasmine Karim</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">yasmine@service.ma</td>
                            <td class="px-6 py-4 text-sm text-slate-500">05 Jan 2026</td>
                            <td class="px-6 py-4">
                                <span class="bg-slate-100 text-slate-400 px-3 py-1 rounded-lg text-xs font-bold">0
                                    Location</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-slate-400 text-[10px] font-black uppercase">
                                    <span class="w-1.5 h-1.5 bg-slate-300 rounded-full"></span> En Attente
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-slate-400 hover:text-blue-600 transition"><i
                                            class="fas fa-eye"></i></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition"><i
                                            class="fas fa-user-slash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-slate-50 border-t border-slate-100 flex justify-between items-center">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Page 1 de 10</span>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-bold text-slate-400 cursor-not-allowed">Précédent</button>
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-bold text-blue-600 hover:border-blue-600 transition">Suivant</button>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
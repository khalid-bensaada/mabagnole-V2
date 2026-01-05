<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews | MaBagnole Admin</title>
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
            <a href="#"
                class="flex items-center space-x-3 p-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition">
                <i class="fas fa-star w-5"></i>
                <span>Reviews</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-6 md:p-10">
        <div class="mb-8">
            <h2 class="text-3xl font-black text-slate-800">Modération des Avis</h2>
            <p class="text-slate-500">Gérez les évaluations des véhicules et les commentaires du blog.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Note Moyenne</p>
                    <h4 class="text-3xl font-black text-slate-800">4.8 <span class="text-sm text-yellow-400"><i
                                class="fas fa-star"></i></span></h4>
                </div>
                <div class="h-12 w-12 bg-yellow-50 text-yellow-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-star-half-alt text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Avis Totaux</p>
                    <h4 class="text-3xl font-black text-slate-800">856</h4>
                </div>
                <div class="h-12 w-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-comment-dots text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Signalés</p>
                    <h4 class="text-3xl font-black text-red-600">3</h4>
                </div>
                <div class="h-12 w-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 italic">Derniers Avis Clients</h3>
                <div class="flex gap-2">
                    <button
                        class="bg-slate-100 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold">Véhicules</button>
                    <button
                        class="text-slate-400 px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-50">Blog</button>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                <div class="p-6 flex flex-col md:flex-row gap-6 hover:bg-slate-50/50 transition">
                    <div class="md:w-1/4">
                        <div class="flex items-center gap-3 mb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-[10px]">
                                JD</div>
                            <p class="font-bold text-slate-800 text-sm">Jean Dupont</p>
                        </div>
                        <p class="text-[10px] text-slate-400 uppercase font-black">Véhicule:</p>
                        <p class="text-sm font-medium text-blue-600">Dacia Logan</p>
                    </div>

                    <div class="md:w-2/4">
                        <div class="flex text-yellow-400 text-xs mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">"Expérience incroyable ! La voiture était très
                            propre et le processus de récupération à l'aéroport était rapide."</p>
                        <p class="text-[10px] text-slate-300 mt-2 italic">Posté le 05 Janvier, 2026</p>
                    </div>

                    <div class="md:w-1/4 flex md:justify-end items-center gap-3">
                        <form action="delete_review.php" method="POST"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cet avis ?');">
                            <input type="hidden" name="review_id" value="101">
                            <button type="submit"
                                class="bg-red-50 text-red-500 px-4 py-2 rounded-xl text-xs font-bold hover:bg-red-100 transition flex items-center gap-2">
                                <i class="fas fa-trash-alt"></i> Soft Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div
                    class="p-6 flex flex-col md:flex-row gap-6 hover:bg-slate-50/50 transition border-l-4 border-red-500 bg-red-50/30">
                    <div class="md:w-1/4">
                        <div class="flex items-center gap-3 mb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-400 text-white flex items-center justify-center font-bold text-[10px]">
                                MK</div>
                            <p class="font-bold text-slate-800 text-sm">Marc Karim</p>
                        </div>
                        <p class="text-[10px] text-slate-400 uppercase font-black">Véhicule:</p>
                        <p class="text-sm font-medium text-blue-600">Range Rover</p>
                    </div>

                    <div class="md:w-2/4">
                        <div class="flex text-yellow-400 text-xs mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star text-slate-200"></i><i class="fas fa-star text-slate-200"></i><i
                                class="fas fa-star text-slate-200"></i>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">"Le GPS ne fonctionnait pas correctement
                            pendant mon voyage."</p>
                        <p class="text-[10px] text-red-400 mt-2 font-bold uppercase tracking-tighter"><i
                                class="fas fa-flag mr-1"></i> Signalé par le système</p>
                    </div>

                    <div class="md:w-1/4 flex md:justify-end items-center gap-3">
                        <button
                            class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-100 transition">Ignorer</button>
                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-red-600 transition">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
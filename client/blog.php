<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole Blog | Road Insights</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50">

    <header class="max-w-7xl mx-auto px-6 pt-20 pb-12">
        <div class="text-center space-y-4">
            <span class="text-blue-600 font-black text-xs uppercase tracking-[0.4em]">Le Journal de Bord</span>
            <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-slate-900">Explorer. <span class="text-blue-600">Rouler.</span> Partager.</h1>
            <p class="text-slate-500 max-w-xl mx-auto font-medium">Découvrez les meilleures astuces, destinations et actualités automobiles sélectionnées par notre communauté.</p>
        </div>

        <div class="flex flex-wrap justify-center gap-3 mt-12">
            <form>
                <button class="px-6 py-2.5 rounded-full bg-slate-900 text-white font-bold text-sm shadow-xl shadow-slate-200">Tous les articles</button>
                
                    <button class="px-6 py-2.5 rounded-full bg-white border border-slate-100 text-slate-500 font-bold text-sm hover:border-blue-200 hover:text-blue-600 transition" value="</button>"></button>
                
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
                <article class="blog-card group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50">

                    <div class="p-8">
                        <div class="flex items-center gap-2 text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-4">
                            <i class="far fa-calendar"></i> <?= $article["created_at"] ?> <i class="far fa-clock"></i>
                        </div>
                        <h2 class="text-xl font-black mb-4 leading-tight group-hover:text-blue-600 transition">
                            <a href="blog-article.php?id="></a>
                        </h2>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3"></p>
                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-[10px]">ML</div>
                                <span class="text-xs font-bold text-slate-700"></span>
                            </div>
                            <i class="fas fa-arrow-right text-slate-300 group-hover:text-blue-600 group-hover:translate-x-1 transition-all"></i>
                        </div>
                    </div>
                </article>
            


        </div>

        <div class="mt-20 flex justify-center items-center gap-4">
            <button class="w-12 h-12 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-white hover:border-blue-600 hover:text-blue-600 transition shadow-sm">
                <i class="fas fa-chevron-left"></i>
            </button>
            <span class="font-black text-slate-900">Page 1 <span class="text-slate-300 mx-2">sur</span> 12</span>
            <button class="w-12 h-12 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-white hover:border-blue-600 hover:text-blue-600 transition shadow-sm">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-100 py-12 text-center">
        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">© 2024 MaBagnole Mag — Tous droits réservés</p>
    </footer>

</body>

</html>
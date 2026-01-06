<?php
session_start();
require_once '../classes/Database.php';
require_once '../classes/Vehicule.php';
require_once '../classes/Categori.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'] ?? '';
    $category_id = $_POST['categorie_id'] ;
    $price = $_POST['price'] ;

    
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/vehicules/'; 
        if (!is_dir($uploadDir))
            mkdir($uploadDir, 0777, true);

        $tmpName = $_FILES['image']['tmp_name'];
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newName = uniqid('vehicule_') . '.' . $ext;
        $destination = $uploadDir . $newName;

        if (move_uploaded_file($tmpName, $destination)) {
            $imagePath = 'uploads/vehicules/' . $newName;
        }
    }

    
    $vehicule = new Vehicule(0, $model, $category_id, $price, 1, $imagePath, '');
    $vehicule->create();

    header('Location: vehicule.php');
    exit;
}


$vehiculeObj = new Vehicule(0, '', 0, 0, 1, null, '', );
$vehicules = $vehiculeObj->selectAll();

$categorieObj = new Categorie(0, '', '');
$categories = $categorieObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vehicles | MaBagnole Admin</title>
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
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-black text-slate-800">Gestion de Flotte</h2>
                <p class="text-slate-500">Ajouter, modifier ou supprimer des véhicules.</p>
            </div>
            <button onclick="toggleModal()"
                class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold hover:bg-blue-700 transition flex items-center shadow-lg shadow-blue-200">
                <i class="fas fa-plus mr-2"></i> Ajouter un Véhicule
            </button>
        </div>

        <div class="bg-white p-4 rounded-2xl mb-6 border border-slate-200 shadow-sm flex flex-wrap gap-4 items-center">
            <div class="relative flex-1 min-w-[250px]">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" placeholder="Rechercher par modèle..."
                    class="w-full pl-12 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <select class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm outline-none">
                <option>Toutes les catégories</option>
                <?php foreach ($categories as $cat): ?>
                    <option><?= htmlspecialchars($cat['name_c']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase font-black tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Véhicule</th>
                        <th class="px-6 py-4">Catégorie</th>
                        <th class="px-6 py-4">Prix/Jour</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($vehicules as $v): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 flex items-center gap-4">
                                <img src="<?= htmlspecialchars($v['image'] ?? 'https://images.unsplash.com/photo-1542362567-b07e54358753') ?>"
                                    class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-bold text-slate-800"><?= htmlspecialchars($v['modele']) ?></p>
                                    <p class="text-xs text-slate-400 font-medium">—</p>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span
                                    class="text-sm font-medium text-slate-600"><?= htmlspecialchars($v['categorie']) ?></span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800"><?= htmlspecialchars($v['prix']) ?> MAD</td>
                            <td class="px-6 py-4">
                                <?php if ($v['disponibilite']): ?>
                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black uppercase rounded-full">Disponible</span>
                                <?php else: ?>
                                    <span
                                        class="px-3 py-1 bg-red-100 text-red-700 text-[10px] font-black uppercase rounded-full">Indisponible</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <a href="edit_vehicle.php?id=<?= $v['id_v'] ?>"
                                        class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="delete_vehicle.php?id=<?= $v['id_v'] ?>"
                                        class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition"><i
                                            class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal Ajouter Véhicule -->
    <div id="addModal"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-[100] p-4">
        <div
            class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-800">Nouveau Véhicule</h3>
                <button onclick="toggleModal()" class="text-slate-400 hover:text-slate-600 text-2xl">&times;</button>
            </div>
            <form method="POST" enctype="multipart/form-data" class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Modèle du véhicule</label>
                    <input type="text" name="model" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Catégorie</label>
                    <select name="categorie_id" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id_c'] ?>"><?= htmlspecialchars($cat['name_c']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Prix par jour (MAD)</label>
                    <input type="number" name="price" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Image du véhicule</label>
                    <input type="file" name="image"
                        class="w-full p-2 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="md:col-span-2 pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 transition">Enregistrer
                        le véhicule</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('addModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>

</body>

</html>
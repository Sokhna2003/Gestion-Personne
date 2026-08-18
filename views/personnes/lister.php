<?php

require_once __DIR__ . "/../../controllers/PersonneController.php";

$controller = new PersonneController();

$personnes = $controller->lister();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des personnes</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>

</head>

<body class="min-h-screen bg-gray-100">

    <div class="mx-auto max-w-6xl px-4 py-10">

        <!-- En-tête -->
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Liste des personnes
                </h1>

                <p class="mt-2 text-gray-500">
                    Retrouvez toutes les personnes enregistrées.
                </p>
            </div>

            <a
                href="ajouter.php"
                class="inline-flex items-center justify-center rounded-lg
                       bg-blue-600 px-5 py-3 font-semibold text-white
                       transition hover:bg-blue-700"
            >
                + Ajouter une personne
            </a>

        </div>

        <?php if (empty($personnes)): ?>

            <!-- Aucun résultat -->
            <div class="rounded-2xl bg-white p-10 text-center shadow">

                <p class="text-gray-500">
                    Aucune personne n'a encore été enregistrée.
                </p>

            </div>

        <?php else: ?>

            <!-- Liste -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($personnes as $personne): ?>

                    <div
                        class="overflow-hidden rounded-2xl bg-white shadow
                               transition duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <!-- Photo -->
                        <div class="h-64 w-full bg-gray-200">

                            <?php if (!empty($personne["photo"])): ?>

                                <img
                                    src="data:<?= htmlspecialchars($personne["photo_type"]) ?>;base64,<?= base64_encode($personne["photo"]) ?>"
                                    alt="<?= htmlspecialchars($personne["prenom"] . " " . $personne["nom"]) ?>"
                                    class="h-full w-full object-cover"
                                >

                            <?php else: ?>

                                <div class="flex h-full items-center justify-center">

                                    <span class="text-gray-400">
                                        Aucune photo
                                    </span>

                                </div>

                            <?php endif; ?>

                        </div>

                        <!-- Informations -->
                        <div class="p-5">

                            <h2 class="text-xl font-bold text-gray-800">
                                <?= htmlspecialchars($personne["prenom"]) ?>
                                <?= htmlspecialchars($personne["nom"]) ?>
                            </h2>

                            <p class="mt-2 text-sm text-gray-500">
                                ID : <?= htmlspecialchars($personne["id"]) ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>


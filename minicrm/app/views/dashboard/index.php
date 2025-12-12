<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard miniCRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
<div class="min-h-screen p-8">

    <h1 class="text-3xl font-bold mb-6">Dashboard miniCRM</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Total clients</p>
            <p class="text-2xl font-bold"><?php echo $totalClients; ?></p>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Nouveaux clients ce mois</p>
            <p class="text-2xl font-bold"><?php echo $newClientsMonth; ?></p>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Total rendez-vous</p>
            <p class="text-2xl font-bold"><?php echo $totalRdv; ?></p>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Rendez-vous du mois</p>
            <p class="text-2xl font-bold"><?php echo $rdvMonth; ?></p>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Total notes</p>
            <p class="text-2xl font-bold"><?php echo $totalNotes; ?></p>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-slate-500 text-sm">Événements enregistrés ce mois</p>
            <p class="text-2xl font-bold"><?php echo $eventsThisMonth; ?></p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-xl font-semibold mb-4">Derniers événements du CRM</h2>
        <table class="min-w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Type</th>
                    <th class="text-left py-2">Ref ID</th>
                    <th class="text-left py-2">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lastEvents as $event): ?>
                <tr class="border-b">
                    <td class="py-2"><?php echo htmlspecialchars($event['type']); ?></td>
                    <td class="py-2"><?php echo htmlspecialchars($event['ref_id']); ?></td>
                    <td class="py-2"><?php echo htmlspecialchars($event['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

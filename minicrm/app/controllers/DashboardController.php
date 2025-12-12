<?php

namespace App\controllers;

use App\models\StatsEvent;

class DashboardController
{
    public function index()
    {
        $stats = new StatsEvent();

        $totalClients    = $stats->countAllClients();
        $newClientsMonth = $stats->countNewClientsThisMonth();
        $totalRdv        = $stats->countAllRdv();
        $rdvMonth        = $stats->countRdvThisMonth();
        $totalNotes      = $stats->countAllNotes();
        $eventsThisMonth = $stats->countEventsThisMonth();
        $lastEvents      = $stats->lastEvents(10);

        require __DIR__ . '/../views/dashboard/index.php';
    }
}

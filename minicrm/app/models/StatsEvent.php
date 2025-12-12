<?php

namespace App\models;

use App\Core\Database;

class StatsEvent extends Database
{
    public function log(string $type, ?int $refId = null): void
    {
        $sql = "INSERT INTO stats_events (type, ref_id, created_at)
                VALUES (:type, :ref_id, NOW())";

        $this->query($sql, [
            ':type'   => $type,
            ':ref_id' => $refId
        ]);
    }

    public function countAllClients(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM clients";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function countNewClientsThisMonth(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM clients
                WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
                  AND YEAR(created_at) = YEAR(CURRENT_DATE())";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function countAllRdv(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM rdvs";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function countRdvThisMonth(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM rdvs
                WHERE MONTH(date_rdv) = MONTH(CURRENT_DATE())
                  AND YEAR(date_rdv) = YEAR(CURRENT_DATE())";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function countAllNotes(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM notes";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function countEventsThisMonth(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM stats_events
                WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
                  AND YEAR(created_at) = YEAR(CURRENT_DATE())";
        $stmt = $this->query($sql);
        $row  = $stmt->fetch();
        return (int) $row['total'];
    }

    public function lastEvents(int $limit = 10): array
    {
        $sql = "SELECT *
                FROM stats_events
                ORDER BY created_at DESC
                LIMIT :limit";
        $stmt = $this->db()->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

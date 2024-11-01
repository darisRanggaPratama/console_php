<?php
require_once 'config.php';

class Members {
    private $conn;
    private $table_name = "members";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT id, title, image, release_at, summary FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                (title, image, release_at, summary) 
                VALUES (:title, :image, :release_at, :summary)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':title' => $data['title'],
            ':image' => $data['image'],
            ':release_at' => $data['release_at'],
            ':summary' => $data['summary']
        ]);
    }

    public function update($data) {
        $query = "UPDATE " . $this->table_name . " 
                SET title = :title, 
                    image = :image, 
                    release_at = :release_at, 
                    summary = :summary 
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':id' => $data['id'],
            ':title' => $data['title'],
            ':image' => $data['image'],
            ':release_at' => $data['release_at'],
            ':summary' => $data['summary']
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function exportCSV() {
        $query = "SELECT id, title, image, release_at, summary FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $filename = "members_export_" . date('Y-m-d_His') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Title', 'Image', 'Release Date', 'Summary'], ';');

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row, ';');
        }

        fclose($output);
    }

    public function downloadTemplate() {
        $filename = "members_template.csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // Write header
        fputcsv($output, ['ID', 'Title', 'Image', 'Release Date', 'Summary'], ';');

        // Write example data
        fputcsv($output, [
            '',
            'The Avengers',
            'https://example.com/avengers.jpg',
            date('Y-m-d'),
            'Earth\'s mightiest heroes must come together to fight an unexpected enemy'
        ], ';');

        fclose($output);
    }

    public function importCSV($file) {
        if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
            // Skip header row
            fgetcsv($handle, 1000, ";");

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $query = "INSERT INTO " . $this->table_name . " 
                        (title, image, release_at, summary) 
                        VALUES (:title, :image, :release_at, :summary)";

                $stmt = $this->conn->prepare($query);
                $stmt->execute([
                    ':title' => $data[1],
                    ':image' => $data[2],
                    ':release_at' => $data[3],
                    ':summary' => $data[4]
                ]);
            }
            fclose($handle);
            return true;
        }
        return false;
    }
}
?>

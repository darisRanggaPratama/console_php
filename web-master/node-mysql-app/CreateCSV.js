// Import modul yang diperlukan
const mysql = require('mysql');
const csvWriter = require('csv-writer').createObjectCsvWriter;

// Buat koneksi ke database
const connect = mysql.createConnection({
    host: 'localhost',     // Alamat host database
    user: 'rangga',          // Username MySQL
    password: 'rangga',  // Password MySQL
    database: 'java_database'     // Nama database yang akan dihubungkan
});

// Cek koneksi ke database
connect.connect((error) => {
    if (error) {
        console.error('Error connecting to the database:', error.stack);
        return;
    }
    console.log('Connected to the database as id', connect.threadId);

    // Jalankan query dan tulis hasil ke file CSV
    const sql = 'SELECT * FROM customer'; // Ubah query sesuai kebutuhan Anda
    connect.query(sql, (error, results, fields) => {
        if (error) {
            console.error('Error executing query:', err.stack);
            connect.end();
            return;
        }

        // Tulis hasil query ke file CSV dengan pemisah semi colon (;)
        const writeCsv = csvWriter({
            path: 'output.csv',
            header: fields.map(field => ({
                id: field.name,
                title: field.name })),
            fieldDelimiter: ';'
        });

        writeCsv.writeRecords(results)
            .then(() => {
                console.log('The CSV file was written successfully');
            })
            .catch((err) => {
                console.error('Error writing CSV file:', err);
            })
            .finally(() => {
                // Tutup koneksi
                connect.end();
            });
    });
});

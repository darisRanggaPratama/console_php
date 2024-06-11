// Import modul yang diperlukan
const mysql = require('mysql');
const excelJS = require('exceljs');

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

    // Jalankan query dan tulis hasil ke file Excel
    const sql = 'SELECT * FROM customer'; // Ubah query sesuai kebutuhan Anda
    connect.query(sql, (error, results, fields) => {
        if (error) {
            console.error('Error executing query:', error.stack);
            connect.end();
            return;
        }

        // Buat workbook dan worksheet
        const book = new excelJS.Workbook();
        const sheet = book.addWorksheet('Email');

        // Tambahkan header
        sheet.columns = fields.map(field => ({
            header: field.name,
            key: field.name}));

        // Tambahkan baris data
        results.forEach(row => {
            sheet.addRow(row);
        });

        // Tulis file Excel
        book.xlsx.writeFile('output.xlsx')
            .then(() => {
                console.log('The Excel file was written successfully');
            })
            .catch((err) => {
                console.error('Error writing Excel file:', err);
            })
            .finally(() => {
                // Tutup koneksi
                connect.end();
            });
    });
});

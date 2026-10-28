<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa XI RPL — Buku Induk</title>

    <!-- Tipografi: Newsreader (Serif Editorial), IBM Plex Sans (Isi), IBM Plex Mono (Angka/NIS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600&family=Newsreader:ital,opsz,wght@0,6..72,500;0,6..72,600;1,6..72,400&display=swap" rel="stylesheet">

    <style>
        /* === PALET WARNA & VARIABEL SISTEM LEDGER === */
        :root {
            --color-bg-page: #F2EEE3;          /* Krem kertas latar */
            --color-bg-panel: #FBF9F3;         /* Panel ledger */
            --color-border-panel: #D9D2BF;     /* Border pembatas kertas */
            --color-text-main: #1D1B16;        /* Tinta utama gelap */
            --color-text-secondary: #6B6657;   /* Tinta sekunder/keterangan */
            --color-accent-primary: #B5381E;   /* Merah bata administratif */
            --color-accent-secondary: #23483A; /* Hijau tua arsip (khusus Tambah) */
            --color-row-alt: #F5F1E6;          /* Baris selang-seling */
            --color-row-hover: #EDE6D2;        /* Hover baris */

            --font-serif: 'Newsreader', 'Source Serif 4', Georgia, serif;
            --font-sans: 'IBM Plex Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-mono: 'IBM Plex Mono', monospace;

            --transition-speed: 130ms;
        }

        /* === RESET & DASAR === */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--color-bg-page);
            color: var(--color-text-main);
            font-family: var(--font-sans);
            font-size: 14px;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        /* Fokus keyboard terarah */
        a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible {
            outline: 2px solid var(--color-accent-primary);
            outline-offset: 2px;
        }

        /* === NAVBAR ATAS === */
        .site-header {
            background-color: var(--color-accent-primary);
            height: 56px;
            width: 100%;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);
        }

        .header-container {
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
            padding: 0 24px;
        }

        .site-title {
            color: #FFFFFF;
            font-family: var(--font-serif);
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        /* === TATA LETAK UTAMA === */
        .main-layout {
            max-width: 1100px;
            margin: 32px auto 48px auto;
            padding: 0 24px;
        }

        /* === PANEL UTAMA (LEDGER PANEL) === */
        .ledger-panel {
            background-color: var(--color-bg-panel);
            border: 1px solid var(--color-border-panel);
            border-radius: 2px;
            padding: 24px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--color-border-panel);
            margin-bottom: 16px;
        }

        .panel-title {
            font-family: var(--font-serif);
            font-size: 22px;
            font-weight: 600;
            color: var(--color-accent-primary);
            letter-spacing: 0.01em;
        }

        /* === KONTROL PENGURUTAN (SEGMENTED CONTROL A-Z / Z-A) === */
        .segmented-sort {
            display: inline-flex;
            border: 1px solid var(--color-border-panel);
            border-radius: 2px;
            background-color: transparent;
        }

        .sort-btn {
            background: transparent;
            border: none;
            padding: 6px 12px;
            font-family: var(--font-mono);
            font-size: 11px;
            font-weight: 500;
            color: var(--color-text-main);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .sort-btn:first-child {
            border-right: 1px solid var(--color-border-panel);
        }

        .sort-btn svg {
            width: 10px;
            height: 10px;
            stroke-width: 2;
            stroke: currentColor;
            fill: none;
        }

        .sort-btn.active {
            background-color: var(--color-text-main);
            color: var(--color-bg-panel);
        }

        /* === TABEL BUKU BESAR === */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .ledger-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .ledger-table th {
            font-family: var(--font-sans);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--color-text-secondary);
            padding: 12px 16px;
            border-bottom: 2px solid var(--color-text-main);
            white-space: nowrap;
        }

        .ledger-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--color-border-panel);
            color: var(--color-text-main);
            vertical-align: middle;
        }

        .col-num {
            font-family: var(--font-mono);
            font-size: 12px;
            width: 48px;
            color: var(--color-text-secondary);
        }

        .col-nis {
            font-family: var(--font-mono);
            font-size: 13px;
            width: 110px;
        }

        .col-name {
            font-weight: 500;
        }

        .col-class {
            width: 150px;
            color: var(--color-text-secondary);
            font-weight: 500;
        }

        .col-action {
            width: 220px;
            text-align: right;
        }

        .ledger-table tbody tr:nth-child(even) {
            background-color: var(--color-row-alt);
        }

        .ledger-table tbody tr:hover {
            background-color: var(--color-row-hover);
        }

        /* === TOMBOL AKSI DENGAN GARIS BAWAH === */
        .action-group {
            display: inline-flex;
            gap: 16px;
            align-items: center;
            justify-content: flex-end;
        }

        .action-link {
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: var(--font-sans);
            font-size: 13px;
            padding: 2px 4px;
            text-decoration: underline;
            text-underline-offset: 3px;
            border-radius: 2px;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .action-add {
            color: var(--color-accent-secondary);
            font-weight: 500;
        }
        .action-add:hover {
            background-color: rgba(35, 72, 58, 0.12);
        }

        .action-edit {
            color: var(--color-text-main);
        }
        .action-edit:hover {
            background-color: rgba(29, 27, 22, 0.08);
        }

        .action-delete {
            color: var(--color-accent-primary);
        }
        .action-delete:hover {
            background-color: rgba(181, 56, 30, 0.12);
        }

        /* === FOOTER PANEL & PAGINATION === */
        .panel-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid var(--color-border-panel);
        }

        .info-text {
            font-family: var(--font-mono);
            font-size: 12px;
            color: var(--color-text-secondary);
        }

        .pagination-list {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .page-link-btn {
            background: transparent;
            border: none;
            font-family: var(--font-mono);
            font-size: 13px;
            color: var(--color-text-secondary);
            padding: 4px 8px;
            cursor: pointer;
            border-radius: 0;
            transition: color var(--transition-speed) ease;
        }

        .page-link-btn:hover:not(:disabled) {
            color: var(--color-text-main);
        }

        .page-link-btn.active {
            color: var(--color-accent-primary);
            font-weight: 600;
            border-bottom: 2px solid var(--color-accent-primary);
        }

        .page-link-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        /* === MODAL DIALOG BERGAYA DOKUMEN === */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background-color: rgba(29, 27, 22, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity var(--transition-speed) ease, visibility var(--transition-speed) ease;
        }

        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-card {
            background-color: var(--color-bg-panel);
            border: 1px solid var(--color-border-panel);
            border-radius: 2px;
            max-width: 440px;
            width: 100%;
            padding: 24px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--color-border-panel);
            margin-bottom: 16px;
        }

        .modal-title {
            font-family: var(--font-serif);
            font-size: 19px;
            font-weight: 600;
            color: var(--color-text-main);
        }

        .modal-close-btn {
            background: transparent;
            border: none;
            font-size: 16px;
            color: var(--color-text-secondary);
            cursor: pointer;
            padding: 2px 6px;
            line-height: 1;
        }
        .modal-close-btn:hover {
            color: var(--color-text-main);
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--color-text-secondary);
            margin-bottom: 6px;
        }

        .form-input, .form-select {
            width: 100%;
            background-color: #FFFFFF;
            border: 1px solid var(--color-border-panel);
            border-radius: 2px;
            padding: 8px 12px;
            font-family: var(--font-sans);
            font-size: 14px;
            color: var(--color-text-main);
            transition: border-color var(--transition-speed) ease;
        }

        .form-input:focus, .form-select:focus {
            border-color: var(--color-accent-primary);
        }

        .form-input.font-mono {
            font-family: var(--font-mono);
        }

        .form-select {
            cursor: pointer;
        }

        .form-select optgroup {
            font-family: var(--font-sans);
            font-weight: 600;
            color: var(--color-text-secondary);
            background-color: var(--color-bg-panel);
        }

        .form-select option {
            font-family: var(--font-sans);
            font-weight: 400;
            color: var(--color-text-main);
            background-color: #FFFFFF;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid var(--color-border-panel);
        }

        .btn-ledger {
            padding: 7px 16px;
            font-family: var(--font-sans);
            font-size: 13px;
            font-weight: 500;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--color-border-panel);
            color: var(--color-text-secondary);
        }
        .btn-secondary:hover {
            background-color: rgba(29, 27, 22, 0.05);
            color: var(--color-text-main);
        }

        .btn-primary-action {
            background-color: var(--color-text-main);
            border: 1px solid var(--color-text-main);
            color: var(--color-bg-panel);
        }
        .btn-primary-action:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>

    <!-- NAVBAR ATAS BERWARNA MERAH BATA SOLID -->
    <header class="site-header">
        <div class="header-container">
            <h1 class="site-title">Data Siswa XI RPL</h1>
        </div>
    </header>

    <!-- KONTEN BUKU INDUK UTAMA -->
    <main class="main-layout">
        <section class="ledger-panel">
            
            <!-- HEADER PANEL DENGAN SORT A-Z / Z-A -->
            <div class="panel-header">
                <h2 class="panel-title">Daftar Siswa Terdaftar</h2>
                
                <div class="segmented-sort" role="group" aria-label="Urutkan data siswa">
                    <button type="button" class="sort-btn active" id="sortAscBtn" onclick="setSortDirection('asc')" title="Urutkan berdasarkan nama A ke Z">
                        <svg viewBox="0 0 24 24"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        A-Z
                    </button>
                    <button type="button" class="sort-btn" id="sortDescBtn" onclick="setSortDirection('desc')" title="Urutkan berdasarkan nama Z ke A">
                        <svg viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                        Z-A
                    </button>
                </div>
            </div>

            <!-- TABEL DOKUMEN ADMINISTRASI -->
            <div class="table-wrap">
                <table class="ledger-table">
                    <thead>
                        <tr>
                            <th class="col-num">No</th>
                            <th class="col-nis">NIS</th>
                            <th class="col-name">Nama</th>
                            <th class="col-class">Kelas</th>
                            <th class="col-action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <!-- Baris siswa diisi secara dinamis oleh JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- FOOTER PANEL: INFO JUMLAH DATA & PAGINATION MONOSPACE -->
            <footer class="panel-footer">
                <div class="info-text" id="paginationInfo">
                    Menampilkan data 1-4 dari total 21 siswa (Halaman 1 dari 6)
                </div>
                
                <nav aria-label="Navigasi halaman">
                    <ul class="pagination-list" id="paginationControls">
                        <!-- Tombol halaman di-render dinamis oleh JavaScript -->
                    </ul>
                </nav>
            </footer>

        </section>
    </main>

    <!-- MODAL FORM UNTUK TAMBAH / EDIT SISWA -->
    <div class="modal-overlay" id="studentModal" aria-hidden="true" role="dialog">
        <div class="modal-card">
            <div class="modal-header">
                <h3 class="modal-title" id="modalHeading">Tambah Siswa</h3>
                <button type="button" class="modal-close-btn" onclick="closeStudentModal()" aria-label="Tutup form">&times;</button>
            </div>
            
            <form id="studentForm" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="studentIdInput">
                
                <div class="form-group">
                    <label class="form-label" for="nisInput">NIS</label>
                    <input type="text" id="nisInput" class="form-input font-mono" placeholder="Contoh: 1001" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nameInput">Nama Lengkap</label>
                    <input type="text" id="nameInput" class="form-input" placeholder="Nama siswa" required>
                </div>

                <!-- DROPDOWN PILIHAN KELAS -->
                <div class="form-group">
                    <label class="form-label" for="classInput">Kelas</label>
                    <select id="classInput" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        <optgroup label="Rekayasa Perangkat Lunak (RPL)">
                            <option value="X RPL">X RPL</option>
                            <option value="XI RPL">XI RPL</option>
                            <option value="XII RPL">XII RPL</option>
                        </optgroup>
                        <optgroup label="Broadcasting (BC)">
                            <option value="X BC">X BC</option>
                            <option value="XI BC">XI BC</option>
                            <option value="XII BC">XII BC</option>
                        </optgroup>
                        <optgroup label="Animasi">
                            <option value="X Animasi">X Animasi</option>
                            <option value="XI Animasi">XI Animasi</option>
                            <option value="XII Animasi">XII Animasi</option>
                        </optgroup>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-ledger btn-secondary" onclick="closeStudentModal()">Batal</button>
                    <button type="submit" class="btn-ledger btn-primary-action" id="modalSubmitBtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- === LOGIKA DATA & INTERAKSI (VANILLA JS) === -->
    <script>
        // 1. Data Dummy Siswa (21 siswa dengan variasi jurusan RPL, BC, dan Animasi)
        let students = [
            { id: 1,  nis: "1001", nama: "Ahmad Pratama",   kelas: "XI RPL" },
            { id: 2,  nis: "1002", nama: "Siti Rahmawati",   kelas: "XI RPL" },
            { id: 3,  nis: "1003", nama: "Budi Santoso",     kelas: "X RPL" },
            { id: 4,  nis: "1004", nama: "Dewi Lestari",     kelas: "XII RPL" },
            { id: 5,  nis: "1005", nama: "Eko Prasetyo",     kelas: "X BC" },
            { id: 6,  nis: "1006", nama: "Fani Anggraini",   kelas: "XI BC" },
            { id: 7,  nis: "1007", nama: "Gilang Ramadhan",  kelas: "XII BC" },
            { id: 8,  nis: "1008", nama: "Hani Safitri",     kelas: "X Animasi" },
            { id: 9,  nis: "1009", nama: "Indra Setiawan",   kelas: "XI Animasi" },
            { id: 10, nis: "1010", nama: "Joko Widodo",      kelas: "XII Animasi" },
            { id: 11, nis: "1011", nama: "Kartika Putri",    kelas: "XI RPL" },
            { id: 12, nis: "1012", nama: "Lukman Hakim",     kelas: "X RPL" },
            { id: 13, nis: "1013", nama: "Maya Indah",       kelas: "XII RPL" },
            { id: 14, nis: "1014", nama: "Naufal Pratama",   kelas: "X BC" },
            { id: 15, nis: "1015", nama: "Olivia Zahrani",   kelas: "XI BC" },
            { id: 16, nis: "1016", nama: "Putra Bagus",      kelas: "XII BC" },
            { id: 17, nis: "1017", nama: "Qori Amelia",      kelas: "X Animasi" },
            { id: 18, nis: "1018", nama: "Rian Hidayat",     kelas: "XI Animasi" },
            { id: 19, nis: "1019", nama: "Salsa Bella",      kelas: "XII Animasi" },
            { id: 20, nis: "1020", nama: "Taufik Hidayat",   kelas: "XI RPL" },
            { id: 21, nis: "1021", nama: "Umar Faruq",       kelas: "XII RPL" }
        ];

        // 2. Status Keadaan Halaman
        const rowsPerPage = 4;
        let currentPage = 1;
        let currentSort = 'asc';

        // 3. Fungsi Pengurutan Berdasarkan Nama
        function sortStudents() {
            students.sort((a, b) => {
                const res = a.nama.localeCompare(b.nama, 'id', { sensitivity: 'base' });
                return currentSort === 'asc' ? res : -res;
            });
        }

        function setSortDirection(dir) {
            currentSort = dir;
            document.getElementById('sortAscBtn').classList.toggle('active', dir === 'asc');
            document.getElementById('sortDescBtn').classList.toggle('active', dir === 'desc');
            currentPage = 1;
            renderView();
        }

        // 4. Render Tabel dan Navigasi Pagination
        function renderView() {
            sortStudents();

            const totalStudents = students.length;
            const totalPages = Math.max(1, Math.ceil(totalStudents / rowsPerPage));

            if (currentPage > totalPages) {
                currentPage = totalPages;
            }

            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = Math.min(startIndex + rowsPerPage, totalStudents);
            const pageStudents = students.slice(startIndex, endIndex);

            // Render baris tabel
            const tbody = document.getElementById('studentTableBody');
            if (pageStudents.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" style="text-align: center; color: var(--color-text-secondary); padding: 24px;">Belum ada data siswa terdaftar.</td></tr>`;
            } else {
                tbody.innerHTML = pageStudents.map((item, idx) => {
                    const rowNumber = startIndex + idx + 1;
                    return `
                        <tr>
                            <td class="col-num">${rowNumber}</td>
                            <td class="col-nis">${escapeHtml(item.nis)}</td>
                            <td class="col-name">${escapeHtml(item.nama)}</td>
                            <td class="col-class">${escapeHtml(item.kelas)}</td>
                            <td class="col-action">
                                <div class="action-group">
                                    <button type="button" class="action-link action-add" onclick="openAddModal()">Tambah</button>
                                    <button type="button" class="action-link action-edit" onclick="openEditModal(${item.id})">Edit</button>
                                    <button type="button" class="action-link action-delete" onclick="handleDelete(${item.id})">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
            }

            // Render info teks
            const startDisplay = totalStudents === 0 ? 0 : startIndex + 1;
            document.getElementById('paginationInfo').innerText = 
                `Menampilkan data ${startDisplay}-${endIndex} dari total ${totalStudents} siswa (Halaman ${currentPage} dari ${totalPages})`;

            // Render kontrol pagination
            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            const list = document.getElementById('paginationControls');
            let html = '';

            // Tombol Back
            const isPrevDisabled = currentPage <= 1 ? 'disabled' : '';
            html += `<li><button class="page-link-btn" onclick="goToPage(${currentPage - 1})" ${isPrevDisabled}>Back</button></li>`;

            // Deretan nomor halaman
            for (let p = 1; p <= totalPages; p++) {
                const isActive = p === currentPage ? 'active' : '';
                html += `<li><button class="page-link-btn ${isActive}" onclick="goToPage(${p})">${p}</button></li>`;
            }

            // Tombol Next
            const isNextDisabled = currentPage >= totalPages ? 'disabled' : '';
            html += `<li><button class="page-link-btn" onclick="goToPage(${currentPage + 1})" ${isNextDisabled}>Next</button></li>`;

            list.innerHTML = html;
        }

        function goToPage(targetPage) {
            const totalPages = Math.ceil(students.length / rowsPerPage);
            if (targetPage >= 1 && targetPage <= totalPages) {
                currentPage = targetPage;
                renderView();
            }
        }

        // 5. Penanganan Modal Form
        const modal = document.getElementById('studentModal');
        const modalHeading = document.getElementById('modalHeading');
        const studentIdInput = document.getElementById('studentIdInput');
        const nisInput = document.getElementById('nisInput');
        const nameInput = document.getElementById('nameInput');
        const classInput = document.getElementById('classInput');

        function openAddModal() {
            modalHeading.innerText = 'Tambah Data Siswa';
            studentIdInput.value = '';
            nisInput.value = '';
            nameInput.value = '';
            classInput.value = ''; // Reset dropdown ke pilihan default
            modal.classList.add('open');
            nisInput.focus();
        }

        function openEditModal(id) {
            const student = students.find(s => s.id === id);
            if (!student) return;

            modalHeading.innerText = 'Edit Data Siswa';
            studentIdInput.value = student.id;
            nisInput.value = student.nis;
            nameInput.value = student.nama;
            classInput.value = student.kelas; // Otomatis memilih kelas yang sesuai di dropdown
            modal.classList.add('open');
            nameInput.focus();
        }

        function closeStudentModal() {
            modal.classList.remove('open');
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeStudentModal();
            }
        });

        function handleFormSubmit(e) {
            e.preventDefault();
            const idVal = studentIdInput.value;
            const nis = nisInput.value.trim();
            const nama = nameInput.value.trim();
            const kelas = classInput.value;

            if (!nis || !nama || !kelas) return;

            if (idVal) {
                // Proses Edit
                const student = students.find(s => s.id === parseInt(idVal, 10));
                if (student) {
                    student.nis = nis;
                    student.nama = nama;
                    student.kelas = kelas;
                }
            } else {
                // Proses Tambah Baru
                const nextId = students.length > 0 ? Math.max(...students.map(s => s.id)) + 1 : 1;
                students.push({
                    id: nextId,
                    nis: nis,
                    nama: nama,
                    kelas: kelas
                });
            }

            closeStudentModal();
            renderView();
        }

        // 6. Penanganan Hapus Siswa
        function handleDelete(id) {
            const student = students.find(s => s.id === id);
            if (!student) return;

            const confirmed = window.confirm(`Apakah Anda yakin ingin menghapus catatan siswa:\n"${student.nama}" (NIS: ${student.nis})?`);
            if (confirmed) {
                students = students.filter(s => s.id !== id);
                renderView();
            }
        }

        function escapeHtml(str) {
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderView();
        });
    </script>
</body>
</html>
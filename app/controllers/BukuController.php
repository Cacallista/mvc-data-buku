<?php
class BukuController
{
    private const LIST_URL = 'index.php?page=buku';

    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku = $this->model->getAll();
        require __DIR__ . '/../views/buku/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/buku/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST);
        if ($data === null) {
            $this->redirect(self::LIST_URL . '&action=create');
        }

        try {
            $this->model->insert($data);
            $this->flash('success', 'Data buku berhasil ditambahkan.');
            $this->redirect(self::LIST_URL);
        } catch (PDOException $e) {
            $this->flash('error', $this->errorMessage($e));
        }
        $this->redirect(self::LIST_URL . '&action=create');
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);

        if (!$buku) {
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        require __DIR__ . '/../views/buku/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);
        if ($data === null) {
            $this->redirect(self::LIST_URL . '&action=edit&id=' . $id);
        }

        try {
            $this->model->update($id, $data);
            $this->flash('success', 'Data buku berhasil diperbarui.');
            $this->redirect(self::LIST_URL);
        } catch (PDOException $e) {
            $this->flash('error', $this->errorMessage($e));
        }
        $this->redirect(self::LIST_URL . '&action=edit&id=' . $id);
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->flash('success', 'Data buku berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Gagal menghapus data buku.');
        }
        $this->redirect(self::LIST_URL);
    }

    private function validateInput(array $input): ?array
    {
        $data = [
            'kode_buku'    => trim($input['kode_buku'] ?? ''),
            'judul'        => trim($input['judul'] ?? ''),
            'penulis'      => trim($input['penulis'] ?? ''),
            'penerbit'     => trim($input['penerbit'] ?? ''),
            'tahun_terbit' => trim($input['tahun_terbit'] ?? '')
        ];

        foreach ($data as $value) {
            if ($value === '') {
                $this->flash('error', 'Kode buku, judul, penulis, penerbit, dan tahun terbit wajib diisi.');
                return null;
            }
        }

        $tahun = filter_var($data['tahun_terbit'], FILTER_VALIDATE_INT);
        if ($tahun === false || $tahun < 1000 || $tahun > (int) date('Y') + 1) {
            $this->flash('error', 'Tahun terbit tidak valid.');
            return null;
        }

        $data['tahun_terbit'] = $tahun;
        return $data;
    }

    private function errorMessage(PDOException $e): string
    {
        // Kode 23000 = pelanggaran constraint (misalnya kode_buku UNIQUE sudah dipakai)
        return $e->getCode() === '23000'
            ? 'Kode buku sudah digunakan. Gunakan kode lain.'
            : 'Terjadi kesalahan saat menyimpan data buku.';
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
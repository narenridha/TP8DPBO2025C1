# TP8DPBO2025C1

Berikut adalah penjelasan alur program untuk tugas desain pemrograman berbasis objek dengan pola **MVC (Model-View-Controller)** yang kamu gunakan di proyek GitHub, berdasarkan database `student_management` dan sistem CRUD, di mana proses **update** hanya mengubah status pada entitas tertentu.

---

### **Struktur MVC**

1. **Model**
   Berisi representasi data dari masing-masing tabel (`Students`, `Courses`, `Enrollments`). Setiap model memiliki fungsi CRUD untuk mengakses database.

2. **View**
   Berisi tampilan (form, tabel, dan notifikasi) yang ditampilkan kepada pengguna. View hanya menerima data dari Controller.

3. **Controller**
   Mengatur alur logika aplikasi, menangani input dari user, memanggil method pada Model, lalu mengirim hasilnya ke View.

---

### **Penjelasan Alur MVC untuk Masing-masing Entitas**

#### **1. Students**

* **Tugas Update:** Mengubah `status` dari `active` menjadi `lulus`.
* **Alur:**

  * **View:** Form atau tombol "Luluskan Mahasiswa".
  * **Controller (StudentController):**

    * Method `graduate($id)` dipanggil ketika user memilih untuk meluluskan mahasiswa.
    * Memanggil `StudentModel::updateStatus($id, 'lulus')`.
  * **Model (StudentModel):**

    * Fungsi `updateStatus($id, $status)` akan mengeksekusi query:

      ```sql
      UPDATE students SET status = 'lulus' WHERE id = $id;
      ```

#### **2. Courses**

* **Tugas Update:** Mengubah `is_open` dari `open` menjadi `closed`.
* **Alur:**

  * **View:** Tombol "Tutup Kelas".
  * **Controller (CourseController):**

    * Method `closeCourse($id)` dipanggil saat user ingin menutup kelas.
    * Memanggil `CourseModel::updateStatus($id, 'closed')`.
  * **Model (CourseModel):**

    * Fungsi `updateStatus($id, $status)` akan menjalankan:

      ```sql
      UPDATE courses SET is_open = 'closed' WHERE id = $id;
      ```

#### **3. Enrollments**

* **Tugas Update:** Mengubah `status` dari `on_going` menjadi `finished`.
* **Alur:**

  * **View:** Tombol "Selesaikan Kursus".
  * **Controller (EnrollmentController):**

    * Method `finishEnrollment($id)` dipanggil ketika user ingin menyelesaikan enrolment.
    * Memanggil `EnrollmentModel::updateStatus($id, 'finished')`.
  * **Model (EnrollmentModel):**

    * Fungsi `updateStatus($id, $status)` mengeksekusi:

      ```sql
      UPDATE enrollments SET status = 'finished' WHERE id = $id;
      ```

---

### **4. Dokum**

https://github.com/user-attachments/assets/1dd6c389-0257-4e50-928a-aba357362129


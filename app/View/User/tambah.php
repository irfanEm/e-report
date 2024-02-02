<div class="container mt-3">
  <h3 class="display3 mb-3">Tambah data User</h3>
  <form action="" method="post">
    <div class="form-floating mb-3">
      <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukan nama lengkap" required>
      <label for="floatingInput">Nama lengkap</label>
    </div>
    <select name="jabatan" class="form-select mb-3 py-3" aria-label="Default select example" required>
      <option selected>Jabatan
      <option value="1">Owner</option>
      <option value="2">Direktur</option>
      <option value="3">SPV</option>
      <option value="4">HRD</option>
      <option value="5">Karyawan</option>
    </select>
    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="Email" required>
      <label for="floatingPassword">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <select name="level" class="form-select mb-3 py-3" aria-label="Default select example" required>
      <option selected>Level
      <option value="0">Superadmin</option>
      <option value="1">Admin</option>
      <option value="2">User</option>
      <option value="3">Tamu</option>
    </select>
  </form>
</div>
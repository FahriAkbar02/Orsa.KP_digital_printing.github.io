function showSection() {
  const selectedProduct = document.getElementById('item_name').value;
  const additionalSection = document.getElementById('additionalSection');

  let sectionContent = '';
  switch (selectedProduct) {
    case 'Banner':
      sectionContent = `
                <h5>Detail Banner</h5>
                <p>Jenis Banner: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="Masukkan ukuran Banner"></p>
                <p>Jumlah: <input type="number" class="form-control" id="quantity" name="quantity" oninput="calculateTotal()"></p>`;

      break;
    case 'Spanduk':
      sectionContent = `
                <h5>Detail Spanduk</h5>
                <p>Jenis Spanduk: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="Masukkan ukuran Spanduk"></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="Jumlah"></p>`;

      break;
    // Tambahkan case lain untuk produk yang berbeda
    case 'Baliho':
      sectionContent = `
                <h5>Detail Baliho</h5>
                <p>Jenis Baliho: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p >Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="..."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="...."></p>`;

      break;
    case 'Sablon':
      sectionContent = `
                <h5>Detail Sablon</h5>
                <p>Jenis Sablon: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="..."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="..."></p>`;

      break;
    case 'Stiker':
      sectionContent = `
                <h5>Detail Stiker</h5>
                <p>Jenis Stiker: 
                <input name="jenis_item" id="jenis_item"type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="...."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="..."></p>`;

      break;
    case 'Undangan':
      sectionContent = `
                <h5>Detail Undangan</h5>
                <p>Jenis Undangan: 
                <input  name="jenis_item" id="jenis_item"type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="....."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="..."></p>`;

      break;
    case 'Nota':
      sectionContent = `
                <h5>Detail Nota</h5>
                <p>Jenis Nota: <input  name="jenis_item" id="jenis_item"type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="...."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="...."></p>`;

      break;
    case 'Stempel':
      sectionContent = `
                <h5>Detail Stempel</h5>
                <p>Jenis Stempel: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="....."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="....."></p>`;

      break;
    case 'Papan Nama':
      sectionContent = `
                <h5>Detail Papan Nama</h5>
                <p>Jenis Papan Nama: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="....."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="....."></p>`;

      break;
    case 'ID Card':
      sectionContent = `
                <h5>Detail ID Card</h5>
                <p>Jenis ID Card: 
                <input  name="jenis_item" id="jenis_item" type="text" class="form-control" placeholder="...."></p>
                <p>Ukuran / Size: <input  name="size" id="size" type="text" class="form-control" placeholder="...."></p>
                <p>Jumlah: <input  name="quantity" id="quantity" type="number" class="form-control" placeholder="...."></p>`;

      break;
    // Lanjutkan dengan kasus lainnya
    // ...

    default:
      sectionContent = '';
      break;
  }

  if (sectionContent) {
    additionalSection.innerHTML = sectionContent;
    additionalSection.classList.remove('hidden');
  } else {
    additionalSection.classList.add('hidden');
  }
}

document.getElementById('orderForm').addEventListener('submit', function (e) {
  e.preventDefault();

  // Proses pengumpulan data form
});
function calculateTotal() {
  var hargaSatuan = document.getElementById('harga_satuan').value;
  var jumlah = document.getElementById('jumlah').value;
  var total = hargaSatuan * jumlah;

  document.getElementById('total').value = total.toFixed(2);
}

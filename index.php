<?php include 'header.php'; ?>
<h1>Suhu dan Kelembaban Ruangan</h1>
<div id="data-box">
  <p><strong>Suhu:</strong> <span id="suhu">Memuat...</span> °C</p>
  <p><strong>Kelembaban:</strong> <span id="kelembapan">Memuat...</span> %</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
<script src="supabase.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", async () => {
    const data = await getLatestData();
    if (data) {
      document.getElementById("suhu").textContent = data.suhu;
      document.getElementById("kelembapan").textContent = data.kelembapan;
    } else {
      document.getElementById("suhu").textContent = "Gagal";
      document.getElementById("kelembapan").textContent = "Gagal";
    }
  });
</script>
<?php include 'footer.php'; ?>

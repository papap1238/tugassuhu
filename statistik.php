<?php include 'header.php'; ?>
<h1>Statistik Suhu dan Kelembaban</h1>
<canvas id="chart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
<script src="supabase.js"></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
  const { data, error } = await supabase
    .from(TABLE_NAME)
    .select("*")
    .order("id", { ascending: false })
    .limit(20);

  const suhu = data.map(d => d.suhu).reverse();
  const kelembapan = data.map(d => d.kelembapan).reverse();
  const waktu = data.map(d => d.waktu).reverse();

  new Chart(document.getElementById("chart"), {
    type: "line",
    data: {
      labels: waktu,
      datasets: [
        { label: "Suhu (°C)", data: suhu, borderColor: "red", fill: false },
        { label: "Kelembaban (%)", data: kelembapan, borderColor: "blue", fill: false }
      ]
    }
  });
});
</script>
<?php include 'footer.php'; ?>

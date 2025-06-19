<?php include 'header.php'; ?>
<h1>Riwayat Data</h1>
<table border="1" cellpadding="10" cellspacing="0" id="data-table">
  <thead>
    <tr><th>ID</th><th>Suhu</th><th>Kelembaban</th><th>Waktu</th></tr>
  </thead>
  <tbody></tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
<script src="supabase.js"></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
  const { data, error } = await supabase
    .from(TABLE_NAME)
    .select("*")
    .order("id", { ascending: false });

  const tbody = document.querySelector("#data-table tbody");
  data.forEach(row => {
    const tr = document.createElement("tr");
    tr.innerHTML = `<td>${row.id}</td><td>${row.suhu}</td><td>${row.kelembapan}</td><td>${row.waktu}</td>`;
    tbody.appendChild(tr);
  });
});
</script>
<?php include 'footer.php'; ?>

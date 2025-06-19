const SUPABASE_URL = "https://upjzvpdeegonoducgogf.supabase.co";
const SUPABASE_KEY = "sb_publishable_ZORbu_1pVADTkmRyncKcAg_6SgFxy2c";
const TABLE_NAME = "tabelayam2";

const { createClient } = supabase;
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

async function getLatestData() {
  const { data, error } = await supabase
    .from(TABLE_NAME)
    .select("*")
    .order("id", { ascending: false })
    .limit(1);

  if (error) {
    console.error("Error:", error.message);
    return null;
  }
  return data[0];
}

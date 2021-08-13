const s_data = { one: 7878, tr: 555 };
const getData = async () => {
  const res = await fetch("post.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(s_data),
  });
  const data = await res.json();
  console.log(data);
};
getData();

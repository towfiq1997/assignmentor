const myForm = document.querySelectorAll(".comment_form");
const p_toogle = document.querySelectorAll("#commment_toggle");
const digit_validation = document.querySelectorAll("#digit_validation");
digit_validation.forEach((single) => {
  single.addEventListener("keyup", (e) => {
    const value = e.target.value;
    if (
      value.includes(0) ||
      value.includes(1) ||
      value.includes(2) ||
      value.includes(3) ||
      value.includes(4) ||
      value.includes(5) ||
      value.includes(6) ||
      value.includes(7) ||
      value.includes(8) ||
      value.includes(9)
    ) {
      alert("Digit is not allowed");
    }
  });
});
p_toogle.forEach((p_single) => {
  p_single.addEventListener("click", (e) => {
    const x = e.target.parentNode;
    const y = x.querySelector("#toogle_comment");
    if (y.classList.contains("d_none")) {
      console.log(y.classList);
      y.classList.remove("d_none");
    } else {
      console.log(y.classList);
      y.classList.add("d_none");
    }
  });
});

myForm.forEach((s) => {
  s.addEventListener("submit", (e) => {
    e.preventDefault();
    if (e.target[0].value == "") {
      alert("Comment Box Empty");
    } else {
      const comments_data = {
        pushComment: 1,
        assignmentId: Number(e.target[0].dataset.id),
        commentar: e.target[0].dataset.name,
        comment: e.target[0].value,
      };

      const sendComment = async () => {
        const res = await fetch("post.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(comments_data),
        });
        const data = await res.json();
        console.log(data);
        location.reload();
        return false;
      };
      sendComment();
    }
  });
});

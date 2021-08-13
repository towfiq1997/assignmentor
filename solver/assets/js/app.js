const myForm = document.querySelectorAll(".comment_form");
const p_toogle = document.querySelectorAll("#commment_toggle");
const applybtn = document.querySelectorAll("#applyBtn");

applybtn.forEach((s_btn) => {
  s_btn.addEventListener("click", (e) => {
    const loading = '<div class="loading-spinner"></div>';
    e.target.innerHTML = loading;
    const assid = Number(e.target.dataset.assid);
    const solverId = Number(e.target.dataset.solverId);
    const applyData = {
      applyReq: 1,
      assignmentid: assid,
      solver: solverId,
    };
    const pushApply = async () => {
      const res = await fetch("post.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(applyData),
      });
      const data = await res.json();
      if (data.response == "success") {
        e.target.innerHTML = "Taken";
        e.target.setAttribute("disabled", "disabled");
        e.target.style.cursor = "not-allowed";
        e.target.style.opacity = "0.5";
        const card = e.target.parentNode.parentNode;
        card.classList.replace("nontaken_green", "taken_red");
        console.log(data);
        console.log(card);
      } else if (data.response == "taken") {
        alert("Already taken");
        e.target.innerHTML = "Taken";
      } else if (data.response == "not_found") {
        alert("Not Found");
        e.target.innerHTML = "Taken";
      } else {
        alert("Server Error");
        e.target.innerHTML = "Taken";
      }
    };
    pushApply();
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

document.addEventListener('DOMContentLoaded', (event) => {
    //the event occurred
    //elemSlideInLeft()
  })

function elemSlideInLeft() {
    let elem = document.getElementById("logo-slide-left");
    console.log(elem)
    let pos = -51;
    let id = setInterval(frame, 10);
    function frame() {
      if (pos == -25) {
        clearInterval(id);
      } else {
        pos++;
        elem.style.right = pos + '%';
      }
    }
  }


  
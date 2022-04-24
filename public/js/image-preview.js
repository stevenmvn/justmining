const imgInput = document.getElementById('picture');
const imgContainer = document.querySelector('.js-product-img');

imgInput.onchange = e => {
    const [file] = imgInput.files
    if (file) {
      let img = imgContainer.querySelector('.js-preview-img');
      if (img) {
        img.setAttribute("src", URL.createObjectURL(file)); 
      } else {
        img = document.createElement("img");
        img.setAttribute("src", URL.createObjectURL(file)); 
        img.classList.add("js-preview-img");
        imgContainer.prepend(img);
      }
    }
}
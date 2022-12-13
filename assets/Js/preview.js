imgInp.onchange = (evt) => {
  preview(imgInp, blah);
};



const preview = (element, img) => {
  const [file] = element.files;
  if (file) {
    img.src = URL.createObjectURL(file);
  }
};

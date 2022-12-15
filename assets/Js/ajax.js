const $ = (element) => {
  var elements=  document.querySelectorAll(element);
  return elements.length == 1 ? elements[0] : elements;
}

function updateStatus(params) {

    let value = document.getElementById('status-' + params).value;
    let xhr = new XMLHttpRequest;
    xhr.open('GET' , './ajax.php?url=update-status-product&id=' + params + '&value=' + value    , false);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            let data = xhr.response;
            if(data == 'success'){
                alert('Update success');
            }else{
                alert('Update error !!!');
            }
        }
    }
    xhr.send();
}
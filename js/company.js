let company = document.getElementById("company-modal");

let btn = document.getElementById("company-modal-btn");

let span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  company.style.display = "block";
}

span.onclick = function() {
  company.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == company) {
    company.style.display = "none";
  }
}



document.addEventListener("DOMContentLoaded", function() {
  let updateButtons = document.querySelectorAll('.updateButton');
  let saveButtons = document.querySelectorAll('.saveButton')
  let deleteButtons = document.querySelectorAll('.deleteButton');
  
  
  updateButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
      let row = this.parentNode.parentNode;
      let cells = row.querySelectorAll('td');
      
      cells.forEach(function(cell,index) {
        if (index === cells.length - 3) {
          let text = cell.innerText;
        cell.innerHTML = '<input type="text" value="' + text + '">';
        }
        
      });
      


      // 編集ボタンを非表示にし、保存ボタンを表示する
      this.style.display = 'none';
      saveButtons[index].style.display = 'inline-block';
    });
  });
  
  saveButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
      let row = this.parentNode.parentNode;
      let cells = row.querySelectorAll('td');
      
      cells.forEach(function(cell, cellIndex) {
        if (cellIndex === cells.length - 3) { // 右から3つ目のセルのみを保存する
          let input = cell.querySelector('input');
          let newValue = input.value;
          cell.innerHTML = newValue;
        }
      });
      
      // 保存ボタンを非表示にし、編集ボタンを表示する
      this.style.display = 'none';
      updateButtons[index].style.display = 'inline-block';

      deleteButtons.forEach(function(button, index) { // 追加
        button.addEventListener('click', function() {
          let row = this.parentNode.parentNode;
          row.remove();
        })
        });
    });
  });
})
  




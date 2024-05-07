let company = document.getElementById("company-modal");

// Get the button that opens the modal
let btn = document.getElementById("company-modal-btn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  company.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  company.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
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
  




$(document).ready(function(){
  var storedSelectedType = localStorage.getItem("selectedType");
  if (storedSelectedType) {
      $(".dessert_tab li[data-type='" + storedSelectedType + "']").addClass("dessert_tab_active");
  }
  $("#index-zone-choice").click(function(){
    $(".style-choice-dropdown").removeClass("style-choice-dropdown-active");
    $(".zone-choice-dropdown").toggleClass("zone-choice-dropdown-active");
  });

  $("#index-style-choice").click(function(){
    $(".zone-choice-dropdown").removeClass("zone-choice-dropdown-active");
    $(".style-choice-dropdown").toggleClass("style-choice-dropdown-active");
  });

  $("#no-visited-input").click(function(){
    $("#no-visited-label").toggleClass("no-visited-active");
  })

  $("#four-star-input").click(function(){
    $("#four-star-label").toggleClass("four-star-active");
  })

  $(".dessert_tab li").click(function(){
    $(this).siblings().removeClass("dessert_tab_active");
    $(this).addClass("dessert_tab_active");
    var selectedType = $(this).data('type');
    $("#selectedType").val(selectedType);
    localStorage.setItem("selectedType", selectedType);
    $("#typeForm").submit();
  })
  
});

/*opentime switch*/
// 获取开关和显示状态的元素
const toggles = document.querySelectorAll('.toggle');

// 遍歷 NodeList，為每個開關設置事件監聽器
toggles.forEach(function(toggle) {
  const day = toggle.id.split('-')[0];
  const status = document.querySelector('#' + day + '-open-status');

  // 設置事件監聽器
  toggle.addEventListener('change', function() {
    // 根據開關的狀態更新相應的 <span> 元素的內容
    if (toggle.checked) {
      status.textContent = '今日有營業';
    } else {
      status.textContent = '未營業';
    }
  });
});


function openCommentForm() {
  document.getElementById('commentFormOverlay').style.display = 'flex';
}

function closeCommentForm() {
  document.getElementById('commentFormOverlay').style.display = 'none';
}

function editCommentForm(){
  document.getElementById('commentEditFormOverlay').style.display = 'flex';
}

function closeEditCommentForm() {
  document.getElementById('commentEditFormOverlay').style.display = 'none';
}
document.querySelector('.comment-submit').addEventListener('click', function (event) {
  // Check if a rating is selected
  if (document.getElementById('selectedRating').value === '') {
      document.querySelector('.validation-message').style.display = 'block';
      event.preventDefault(); // Prevent form submission
  } else {
      document.querySelector('.validation-message').style.display = 'none';
  }
});

var ratingNumbers = document.querySelectorAll('.rating-number');
ratingNumbers.forEach(function (ratingNumber) {
  // Add click event listener to each element
  ratingNumber.addEventListener('click', function () {
    // Remove 'active' class from all elements
    ratingNumbers.forEach(function (element) {
      element.classList.remove('active');
    });

    // Toggle 'active' class for the clicked element
    ratingNumber.classList.add('active');
  });
});

function setRating(rating) {
  const ratingIcon = document.querySelector(`.rating-number[onclick="setRating(${rating})"]`);
  const selectedRatingInput = document.querySelector(`input[name="selected_rating"]`);
  selectedRatingInput.value = rating;
}

function setEditRating(rating) {
  const ratingIcon = document.querySelector(`.rating-number[onclick="setEditRating(${rating})"]`);
  const selectedRatingInput = document.querySelector(`input[name="selected_edit_rating"]`);
  selectedRatingInput.value = rating;
}

function submitForm(){
  document.querySelector(".comment-search>form").submit();
}


function deletionAlert(shopID){
  if (confirm("確定要刪除評論嗎？")) {
    window.location.href = "delete_comment.php?shop_id=" + shopID;
  } else {
    window.location.href = "shop_info.php?shop_id=" + shopID;
  }
}

function deletionFavorite(shopID){
  if (confirm("確定要取消收藏嗎？")) {
    window.location.href = "deleteFavorite.php?id=" + shopID;
  }
}

function deletionUser(userID){
  console.log('hi');
  if (confirm("確定要刪除帳號嗎？")) {
    window.location.href = "delete_userinfo.php?user_id=" + userID;
  } else {
    window.location.href = "user_info.php?user_id=" + userID;
  }
}

function deletionShop(shopID){
  console.log('hi');
  if (confirm('確定要刪除此店家嗎？')) {
    window.location.href = 'delete_shop.php?id=' + shopID;
  } else {
    window.location.href = 'manager_index.php';
  }
}

function deletionDess(shopID,dessID){
  console.log('hi');
  if (confirm('確定要刪除此甜點嗎？')) {
    window.location.href = 'delete_dess.php?shop_id=' + shopID + '&dess_id=' + dessID;
  } else {
    window.location.href = 'manager_dessert_index.php?shop_id=' + shopID;
  }
}

function setIndexZone(){
  var selected_zone=document.querySelectorAll('.zone-choice-dropdown>li')
  var indexSelectedZone=document.getElementById(indexSelectedZone);
  indexSelectedZone.value=selected_zone;
  console.log(indexSelectedZone);
  
}

function modifyRow(shopID, dessID) {
  var rowElement = document.getElementById('row_' + shopID + '_' + dessID);
  var textElements = rowElement.querySelectorAll('.text-element');
  // var textElements_2 = textElements;

  // 創建一個取消按鈕
  var cancelButton = document.createElement('button');
  cancelButton.className = 'search-button cancel-button';
  cancelButton.innerHTML = '取消';
  //按下'取消'按鈕
  cancelButton.onclick = function() {
    var rowElement_2 = document.getElementById('row_' + shopID + '_' + dessID);
    var textElements_2 = rowElement_2.querySelectorAll('.text-element');
    
    textElements_2.forEach(function(textElement,index) {
      var originalTextElement = document.createElement('td');
      originalTextElement.className = 'text-element';
      console.log(textElement.innerText);
      originalTextElement.innerText = ori[index]; // 內容保持不變
      textElement.parentNode.replaceChild(originalTextElement, textElement);

    });

   
    // 還原 "送出" 按鈕為 "修改" 按鈕
    modifyButton.innerHTML = '修改';
    modifyButton.onclick = function() {
      modifyRow(shopID, dessID);
    };

    // 移除取消按鈕
    cancelButton.parentNode.removeChild(cancelButton);
  };

  // 插入取消按鈕
  rowElement.appendChild(cancelButton);

  // 創建一個輸入框元素的陣列
  var inputElements = [];
  var ori=[];

  // 對每個 text element 創建一個輸入框元素
  textElements.forEach(function(textElement) {
    var inputElement = document.createElement('input');
    inputElement.type = 'text';
    inputElement.value = textElement.innerText;
    inputElements.push(inputElement);
    ori.push(inputElement.value);

    // 創建一個獨立的 <td>，並將輸入框加入其中
    var tdElement = document.createElement('td');
    tdElement.className = 'text-element';
    tdElement.appendChild(inputElement);

    // 替換原本的文字元素
    textElement.parentNode.replaceChild(tdElement, textElement);
  });

  // 將 "修改" 按鈕變成 "送出" 按鈕
  var modifyButton = rowElement.querySelector('.modify-button');
  modifyButton.innerHTML = '送出';
  // 按下送出按鈕後
  modifyButton.onclick = function() {

      // 在這裡執行送出的相應邏輯，例如使用 AJAX 發送到後端
      var newValues = inputElements.map(function(inputElement) {
        return inputElement.value;
      });

    // 使用 AJAX 發送 POST 請求到後端
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'adjust_dess.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // 在這裡處理後端返回的任何數據或確認消息
        // console.log(xhr.responseText);
        console.log('test');
      }
    }

    var data = 'shopID=' + encodeURIComponent(shopID) +
               '&dessID=' + encodeURIComponent(dessID) +
               '&newValues=' + encodeURIComponent(JSON.stringify(newValues));
    xhr.send(data);
    
    
    var rowElement_3 = document.getElementById('row_' + shopID + '_' + dessID);
    var textElements_3 = rowElement_3.querySelectorAll('.text-element');
    textElements_3.forEach(function(textElement,index) {
      var originalTextElement = document.createElement('td');
      originalTextElement.className = 'text-element';
      console.log(textElement.innerText);
      originalTextElement.innerText = inputElements[index].value; // 內容保持不變
      textElement.parentNode.replaceChild(originalTextElement, textElement);

    });


    // 還原 "送出" 按鈕為 "修改" 按鈕
    modifyButton.innerHTML = '修改';
    modifyButton.onclick = function() {
      modifyRow(shopID, dessID);
    };

    // 移除取消按鈕
    cancelButton.parentNode.removeChild(cancelButton);
  };
}
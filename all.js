
$(document).ready(function() {
    $(".favorite-link").click(function(){
      var shopID = $(this).data('shopid');
      var isFavorited = localStorage.getItem('favorited-' + shopID) === 'true';
      isFavorited = !isFavorited;
      localStorage.setItem('favorited-' + shopID, isFavorited);
      updateFavoriteButton(shopID, isFavorited);
    });

    function updateFavoriteButton(isFavorited) {
      // 根據收藏狀態更新按鈕的外觀
      var heartIcon = $(".favorite-link i");
      heartIcon.toggleClass("fa-solid", isFavorited);
      heartIcon.toggleClass("fa-regular", !isFavorited);
    }
    $(".collect-link").click(function(){
      $(".collect-link i").toggleClass("fa fa-plus fa-solid fa-check");
    });
});
function openCommentForm() {
  document.getElementById('commentFormOverlay').style.display = 'block';
}

function closeCommentForm() {
  document.getElementById('commentFormOverlay').style.display = 'none';
}

function editCommentForm(){
  document.getElementById('commentEditFormOverlay').style.display = 'block';
}

function closeEditCommentForm() {
  document.getElementById('commentEditFormOverlay').style.display = 'none';
}

/*
//添加編輯評論評分樣式
// 在页面加载时设置初始的评分图标样式
document.addEventListener('DOMContentLoaded', function() {
    var selectedRating = document.getElementById('selectedRating').value;
    setRating(selectedRating);
});

// 更新评分值和图标样式
function setRating(rating) {
    // 设置隐藏字段的值
    document.getElementById('selectedRating').value = rating;

    // 移除所有评分图标的活动样式
    var ratingNumbers = document.querySelectorAll('.rating-number');
    ratingNumbers.forEach(function(number) {
        number.classList.remove('active');
    });

    // 添加活动样式到指定的评分图标
    var selectedNumber = document.querySelector('.rating-number[data-rating="' + rating + '"]');
    if (selectedNumber) {
        selectedNumber.classList.add('active');
    }
}

// 处理用户点击评分图标事件
document.addEventListener('DOMContentLoaded', function() {
    var ratingNumbers = document.querySelectorAll('.rating-number');
    ratingNumbers.forEach(function(number) {
        number.addEventListener('click', function() {
            setRating(number.getAttribute('data-rating'));
        });
    });
});
*/


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
  console.log(rating);
}

function submitForm(){
  document.querySelector(".comment-search form").submit();
}


function toggleHeart() {
  if (confirm("確定取消收藏嗎") == true) {
    document.querySelector(".favorite-shop-content form").submit();
  }
}


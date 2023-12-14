
$(document).ready(function(){
  $("#index-zone-choice").click(function(){
    $(".style-choice-dropdown").removeClass("style-choice-dropdown-active");
    $(".zone-choice-dropdown").toggleClass("zone-choice-dropdown-active");
  });

  $("#index-style-choice").click(function(){
    $(".zone-choice-dropdown").removeClass("zone-choice-dropdown-active");
    $(".style-choice-dropdown").toggleClass("style-choice-dropdown-active");
  });

  $(".dessert_tab li").click(function(){
    $(this).siblings().removeClass("dessert_tab_active");
    $(this).addClass("dessert_tab_active");
    var selectedType = $(this).data('type');
    $("#selectedType").val(selectedType);
    $("#typeForm").submit();
  })
  
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

function setIndexZone(){
  var selected_zone=document.querySelectorAll('.zone-choice-dropdown>li')
  var indexSelectedZone=document.getElementById(indexSelectedZone);
  indexSelectedZone.value=selected_zone;
  console.log(indexSelectedZone);
  
}
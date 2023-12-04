
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
  document.querySelector(".comment-search form").submit();
}


function toggleHeart() {
  if (confirm("確定取消收藏嗎") == true) {
    document.querySelector(".favorite-shop-content form").submit();
  }
}

function deletionAlert(){
  if(confirm("確定刪除評論嗎")==true){
    document.querySelector(".Editoverlay form").submit();
  }
}

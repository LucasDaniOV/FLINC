$(document).ready(function() {
  //----------------------------------------------------------------------------------------overlay
  $('.menu').click(function() { //if the menu button is clicked
      if($(this).hasClass('menu')) { //if the element has the class menu
          $('.overlay').css({'display': 'grid'}); //display the overlay
          $('body').css({'overflow': 'hidden'}); //hide the scrollbar
          $(this).html('close'); //change the menu icon to close
          $(this).toggleClass('menu close'); //change the class to close

      } else if($(this).hasClass('close')) { //if the element has the class close
          $('.overlay').css({'display': 'none'}); //hide the overlay
          $('body').css({'overflow': 'auto'}); //show the scrollbar
          $(this).html('menu'); //change the menu icon to menu
          $(this).toggleClass('menu close'); //change the class to menu
      }
  });
  //-----------------------------------------------------------------------------------------overlay

  //-----------------------------------------------------------------------------------------carousel
  const slider = document.querySelector('.slider-container');
  const slides = Array.from(document.querySelectorAll('.slide'));
  const DOTS = document.querySelector('.dots');
  const next = document.querySelector('.next');
  const prev = document.querySelector('.prev');

  let isDragging = false;
  let startPos = 0;
  let currentTranslate = 0;
  let prevTranslate = 0;
  let animationID = 0;
  let currentIndex = 0;

  slides.forEach((slide, index) => {
    const slideImage = slide.querySelector('img');
    slideImage.addEventListener('dragstart', (e) => e.preventDefault());
    // Touch events
    slide.addEventListener('touchstart', touchStart(index));
    slide.addEventListener('touchend', touchEnd);
    slide.addEventListener('touchmove', touchMove);
    // Mouse events
    slide.addEventListener('mousedown', touchStart(index));
    slide.addEventListener('mouseup', touchEnd);
    slide.addEventListener('mouseleave', touchEnd);
    slide.addEventListener('mousemove', touchMove);
  });
  function touchStart(index) {
    return function (event) {
      currentIndex = index;
      startPos = getPositionX(event);
      isDragging = true;
      animationID = requestAnimationFrame(animation);
      slider.classList.add('grabbing');
    }
  }
  function touchEnd() {
    isDragging = false;
    cancelAnimationFrame(animationID);
    const movedBy = currentTranslate - prevTranslate;
    if (movedBy < -100){
      if(currentIndex < slides.length - 1){
        currentIndex += 1;}
      // } else if(currentIndex === slides.length - 1){
      //   currentIndex = 0;
      // }
    }
    if (movedBy > 100){
      if(currentIndex > 0){
        currentIndex -= 1;}
      // } else if(currentIndex === 0){
      //   currentIndex = slides.length - 1;
      // }
    }
    setPositionByIndex();
    slider.classList.remove('grabbing');
    document.querySelector('.controls .selected').classList.remove('selected');
    DOTS.children[currentIndex].classList.add('selected');
  }
  function touchMove(event) {
    if (isDragging) {
      const currentPosition = getPositionX(event);
      currentTranslate = prevTranslate + currentPosition - startPos;
    }
  }
  function getPositionX(event) {
    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
  }
  function animation() {
    setSliderPosition();
    if (isDragging) requestAnimationFrame(animation);
  }
  function setSliderPosition() {
    slider.style.transform = `translateX(${currentTranslate}px)`;
  }
  function setPositionByIndex() {
    if (window.innerWidth >= 1200) {
      currentTranslate = currentIndex * (0.90 * -window.innerWidth);
    } else if (window.innerWidth < 1200 && window.innerWidth >= 768) {
      currentTranslate = currentIndex * (0.80 * -window.innerWidth);
    } else {
      currentTranslate = currentIndex * -window.innerWidth;
    }
    prevTranslate = currentTranslate;
    if(currentIndex === 0){
      prev.classList.add('disabled');
    }
    if(currentIndex === slides.length - 1){
      next.classList.add('disabled');
    }
    if(currentIndex !== 0){
      prev.classList.remove('disabled');
    }
    if(currentIndex !== slides.length - 1){
      next.classList.remove('disabled');
    }
    setSliderPosition();
  }
  document.querySelectorAll('.controls li').forEach(function(item, index) {
    item.addEventListener('click', function() {
      document.querySelector('.controls .selected').classList.remove('selected');
      item.classList.add('selected');
      currentIndex = index;
      setPositionByIndex();
    });
  });

  next.addEventListener('click', function() {
    prev.classList.remove('disabled');
    if(currentIndex === slides.length - 2){
      next.classList.add('disabled');
    }
    if(currentIndex < slides.length - 1){
      currentIndex += 1;
    }
    setPositionByIndex();
    document.querySelector('.controls .selected').classList.remove('selected');
    DOTS.children[currentIndex].classList.add('selected');
  });
  prev.addEventListener('click', function() {
    next.classList.remove('disabled');
    if(currentIndex === 1){
      prev.classList.add('disabled');
    }
    if(currentIndex > 0){
      currentIndex -= 1;
    }
    setPositionByIndex();
    document.querySelector('.controls .selected').classList.remove('selected');
    DOTS.children[currentIndex].classList.add('selected');
  });

  let width = $(document).width();
  let imgWidth = $('.slide img').width();

  if(width > 768){
    if(width > 1200){
      $('.prev').css({
        'left': width / 2 - 0.1 * width - imgWidth / 2 + 'px'
      });
      $('.next').css({
        'right': width / 2 - 0.1 * width - imgWidth / 2 + 'px'
      });
    } else {
      $('.prev').css({
        'left': width / 2 - 0.2 * width - imgWidth / 2 + 'px'
      });
      $('.next').css({
        'right': width / 2 - 0.2 * width - imgWidth / 2 + 'px'
      });
    }
  }
  //-----------------------------------------------------------------------------------------carousel

  //-----------------------------------------------------------------------------------------section-1
  const imgContainers = Array.from(document.querySelectorAll('.img-container'));

  imgContainers.forEach(function(imgContainer, index) {
    const imgContainerImage = imgContainer.querySelector('img');
    imgContainerImage.addEventListener('dragstart', (e) => e.preventDefault());
    // Touch events
    imgContainer.addEventListener('touchstart', grabStart());
    imgContainer.addEventListener('touchend', grabEnd());
    // Mouse events
    imgContainer.addEventListener('mousedown', grabStart());
    imgContainer.addEventListener('mouseup', grabEnd());
    imgContainer.addEventListener('mouseleave', grabEnd()); 
    
    function grabStart() {
      return function (event) {
        imgContainer.classList.add('grabbing');
      }
    }
    function grabEnd() {
      return function (event) {
        imgContainer.classList.remove('grabbing');
      }
    }
  });

  const imgContainers2 = Array.from(document.querySelectorAll('.big-section-article-container-item'));

  imgContainers2.forEach(function(imgContainer2, index) {
    const imgContainerImage2 = imgContainer2.querySelector('img');
    imgContainerImage2.addEventListener('dragstart', (e) => e.preventDefault());
  });

  $('.big-section-article-container-item a').hover(
    function() {
      $(this).parent().children('img').css({'transform': 'scale(0.9)', 'opacity': '1', 'border': '2px solid #fff', 'border-radius': '5rem'});
      $(this).css({'color': '#fff', 'background-color': 'var(--logo-blue)'});
    },
    function() {
      $(this).parent().children('img').css({'transform': 'scale(1)', 'opacity': '0.5', 'border': 'none', 'border-radius': '0'});
      $(this).css({'color': '#000', 'background-color': '#fff'});
    }
  );
  $('.dit-is-flinc').hover(
    function() {
      $('.cont4-img').css({'transform': 'scale(0.97)', 'border-radius': '1rem'});
    },
    function() {
      $('.cont4-img').css({'transform': 'scale(1)', 'border-radius': '0', 'border-top-right-radius': '1rem', 'border-bottom-right-radius': '1rem'});
    }
  );
  //-----------------------------------------------------------------------------------------section-1
});
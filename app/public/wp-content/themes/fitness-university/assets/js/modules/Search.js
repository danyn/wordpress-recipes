import $ from 'jquery';

class Search {
  constructor() {
    this.searchHTML();
    this.searchTrigger = $('.js-search-trigger');
    this.closeTrigger = $('.search-overlay__close');
    this.overlay = $('.search-overlay');
    this.inputArea = $('#search-term');
    this.resultArea = $('.search-overlay__results');
    this.isOpen = false;
    this.isSpinning= false;
    this.timer;
    this.wait = 750;
    this.previousVal;
    this.events();
  }

  // events
  events(){
    this.searchTrigger.on('click', this.open.bind(this));
    this.closeTrigger.on('click', this.close.bind(this));
    $(document).on("keydown", this.keyToggle.bind(this));
    this.inputArea.on('keyup', this.handleInput.bind(this));
  }

  //methods

  handleInput(){

    if(this.inputArea.val() != this.previousVal){
      if(this.inputArea.val()){
        if(!this.isSpinning) this.resultArea.html('<div class="spinner-loader"></div>');
        this.isSpinning = true;
        clearTimeout(this.timer);
        this.timer = setTimeout( this.getResults.bind(this), this.wait);
        this.previousVal = this.inputArea.val();
      }else{
        this.resultArea.html('');
        this.isSpinning = false; 
      }
    }
  }

  getResults(){
    // the anonymous function creates a new scope for this you can pass this as it is 
    // before the the functions by creating a simple reference : let thisObject = this;
    //which is then available inside the anymous function
    //or you can use an arrow function these do not alter the scope of this.

    $.when(
      $.getJSON(`${wpData.siteUrl}/${wpData.wpApi}/posts?search=${this.inputArea.val()}`),
      $.getJSON(`${wpData.siteUrl}/${wpData.wpApi}/pages?search=${this.inputArea.val()}`),
      $.getJSON(`${wpData.siteUrl}/${wpData.wpApi}/campus?search=${this.inputArea.val()}`)
      )
      .then( (posts, pages, campuses) => {
        let s="";
        if(posts[0].length || pages[0].length ){
        
          if(posts[0].length){
          s += '<h3>In Posts:</h3>';
          posts[0].forEach(post => {
            s += `<li><a href="${post.link}">${post.title.rendered}</a></li>`;
          });
        }

        if(pages[0].length){
          s += '<h3>In Pages:</h3>'
          pages[0].forEach(post => {
            s += `<li><a href="${post.link}">${post.title.rendered}</a></li>`;
          });
         }

         if(campuses[0].length){
          s += '<h3>In Campuses:</h3>'
          campuses[0].forEach(post => {
            s += `<li><a href="${post.link}">${post.title.rendered}</a></li>`;
          });
         }

        }else{
          s="No Results";
        }
        this.resultArea.html(s);
      }, ()=> this.resultArea.html('<p>Unexpected Error We are Resolving this currently</p>'));//then



  //  $.getJSON(`${wpData.siteUrl}/${wpData.wpApi}/posts?search=${this.inputArea.val()}`, data => {

  //   let r = '<h2>POSTS: </h2>';
  //   r += data.length ? '<ul class="link-list min-list">' : '<p>No Results</p>'; 

  //   data.forEach(element => {
  //     console.log(element);
  //     r += `<li><a href="${element.link}">${element.title.rendered}</a></li>`;
  //   });

  //   r += data.length ? '</ul>' : ''; 
  //   // this.resultArea.html(r);
  //   this.JSONposts.html(r);
  //   this.isSpinning = false;
  //  });
   
  }

  open(){
    this.overlay.addClass('search-overlay--active');
    $("body").addClass('body-no-scroll');
    this.inputArea.val('');
    setTimeout( ()=>this.inputArea.focus(), 301 );
  }

  keyToggle(e){
    // console.log(e.keyCode);
    //s
    if (e.keyCode == 83 && !this.isOpen && !$("input, textarea").is(':focus')){
      this.open();
      this.isOpen = true;
    }
    //esc
    if (e.keyCode == 27 && this.isOpen){
      this.close();
      this.isOpen = false;
    }
  }

  close(){
    this.overlay.removeClass('search-overlay--active');
    $("body").removeClass('body-no-scroll');
  }

  searchHTML(){
    $('body').append(`
    <div class="search-overlay">
      <div class="search-overlay__top">
        <div class="container">
          <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
          <input type="text" class="search-term"  id="search-term" placeholder="What Are You Looking For">
          <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
        </div>
      </div>
      <div class="container">  
        <div class="search-overlay__results"></div>
      </div>
    </div>
    `);
  }
}

export default Search;
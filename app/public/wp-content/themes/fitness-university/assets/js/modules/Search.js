import $ from 'jquery';

class Search {
  constructor() {
     this.searchTrigger = $('.js-search-trigger');
     this.closeTrigger = $('.search-overlay__close');
     this.overlay = $('.search-overlay');
     this.inputArea = $('#search-term');
     this.resultArea = $('.search-overlay__results');
     this.isOpen = false;
     this.isSpinning= false;
     this.timer;
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
        this.timer = setTimeout( this.getResults.bind(this), 2000);
        this.previousVal = this.inputArea.val();
      }else{
        this.resultArea.html('');
        this.isSpinning = false; 
      }
    }
  }

  getResults(){
    let thisObject = this;

   $.getJSON(`http://fitnessuniversity.local//wp-json/wp/v2/posts?search=${this.inputArea.val()}`, function(data){
    // console.log(data);
    data.forEach(element => {
        console.log(element.title);
        thisObject.resultArea.html(`<div>${element.title.rendered}</div>`);
      });
   });
    // this.resultArea.html('<h2>Results...Oh!</h2>');
    // this.isSpinning = false;
  }



  open(){
    this.overlay.addClass('search-overlay--active');
    $("body").addClass('body-no-scroll');
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
}

export default Search;
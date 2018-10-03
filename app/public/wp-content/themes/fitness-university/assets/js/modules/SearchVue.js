import Vue from 'vue';
import SearchHTML from './SearchHTML.vue';



var vm = new Vue({
  el: '#appSearch',
  components: {SearchHTML},
  template: `<p> <SearchHTML></SearchHTML> </p>`,
  mounted: function () {
    this.$nextTick(function(){
      var searchBox = document.querySelector('.js-search-trigger');
      searchBox.addEventListener('click', function(){
      vm.$children[0]._data.isActive = true;
    });
    
    });
  }
});









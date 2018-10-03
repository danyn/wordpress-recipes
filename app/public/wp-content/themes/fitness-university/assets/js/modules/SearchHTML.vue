<template>
  <div class="search-overlay"  :class="{'search-overlay--active': isActive}">
    <div class="search-overlay__top">
      <div class="container">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true" ></i>
        <input  v-model="search" lazy type="text" class="search-term"  id="search-term" placeholder="What Are You Looking For">
        <i class="fa fa-window-close search-overlay__close" aria-hidden="true" @click="isActive = false"></i>
        <button style="border:1px solid pink" @click="queryWP">Search</button>
      </div>
    </div>
    <div class="container">  
      <h3>General Results</h3>
     
        <div v-for="(response, postType) in wpResponsesFor" v-if="response.length">
          
          <h3>{{postType}}</h3>
          <ul>
            <li v-for="result in response">
              <a :href="result.link">{{result.title.rendered}}</a>
              <span v-if="result.type == 'post'"> by {{result.authorName}}</span>
            </li>
          </ul>
          <hr>
        </div>
      
  </div>
  </div>
</template>

<script>
  import axios from 'axios';
  module.exports = {
    data: function () {
      return {
        isActive: false,
        search: null,
        wpResults: null,
        wpResponsesFor: {
          pages: [],
          posts: [],
          campuses: []
        },
        errors: null,
      }
    },
    computed: {
      wpData: function(){
        return window.wpData;
      },
      wpEndpoint: function(){
        return `${window.wpData.siteUrl}/${window.wpData.wpApi}`;
      }
    },
    methods: {
      queryPosts: function() {
        return   axios.get(`${this.wpEndpoint}/posts?search=${this.search}`)
      },
      queryPages: function() {
        return   axios.get(`${this.wpEndpoint}/pages?search=${this.search}`)
      },
      queryCampus: function() {
        return   axios.get(`${this.wpEndpoint}/campus?search=${this.search}`)
      },
      queryWP : function (e){
        let thisVue = this;
        axios.all([this.queryPosts(), this.queryPages(), this.queryCampus()])
        .then(axios.spread(function(posts, pages, campuses){
          // concatenate the arrays that are in .data of the response
          // thisVue.wpResults =  posts.data.concat(pages.data, campuses.data);
          // set data for each type of post 
          thisVue.wpResponsesFor.posts = posts.data;
          thisVue.wpResponsesFor.pages = pages.data;
          thisVue.wpResponsesFor.campuses = campuses.data;
          console.log(posts.data);

        }))
        .catch(e => this.errors = e);
      }
    }
  }
</script>


<style scoped>
  span{
    color: red;
  }
</style>